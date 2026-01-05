<?php
require_once __DIR__ . "/../database/connection.php";

function createToken(int $id) {
    $config = getConnection();
    $pdo = null;
    
    try {
        if (!isset($config['database']) || empty($config['database'])) 
          throw new Exception("قاعدة البيانات غير محددة في الإعدادات", 500);
        
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $token = bin2hex(random_bytes(32));
        $expire_token = date('Y-m-d H:i:s', strtotime('+1 year'));
        
        $stmt = $pdo->prepare("UPDATE users SET token = :token, expire_token = :expire_token WHERE id = :id");
        $stmt->execute([
            'id' => $id, 
            'token' => $token, 
            'expire_token' => $expire_token
        ]);

        return [ 
            'token' => $token, 
            'expire_token' => $expire_token
        ];
    } catch (\Throwable $th) {
        error_log("Token creation error: " . $th->getMessage());
        
        // التحقق من أن كود الخطأ رقمي
        $errorCode = $th->getCode();
        if (!is_numeric($errorCode)) {
            $errorCode = 500; // كود افتراضي إذا لم يكن رقمي
        }
        
        throw new Exception($th->getMessage(), (int)$errorCode);
    } finally {
        if ($pdo !== null) {
            $pdo = null;
        }
    }
}

function unsetToken($id) {
    $config = getConnection();
    $pdo = null;
    
    try {
        // التحقق من وجود قاعدة بيانات في الإعدادات
        if (!isset($config['database']) || empty($config['database'])) {
            throw new Exception("قاعدة البيانات غير محددة في الإعدادات", 500);
        }
        
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE users SET token = NULL, expire_token = NULL WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        return true;
    } catch (\Throwable $th) {
        error_log("Token unset error: " . $th->getMessage());
        
        // التحقق من أن كود الخطأ رقمي
        $errorCode = $th->getCode();
        if (!is_numeric($errorCode)) {
            $errorCode = 500;
        }
        
        throw new Exception($th->getMessage(), (int)$errorCode);
    } finally {
        if ($pdo !== null) {
            $pdo = null;
        }
    }
}

function authLogin(string $email, string $password) {
    $config = getConnection();
    $pdo = null;
    
    try {
        // التحقق من وجود قاعدة بيانات في الإعدادات
        if (!isset($config['database']) || empty($config['database']))
          throw new Exception("قاعدة البيانات غير محددة في الإعدادات", 500);
        
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT id, password_hash as password FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user)
            throw new Exception("البريد الإلكتروني أو كلمة المرور غير صحيحة", 401);
        if (!password_verify($password, $user['password'])) 
            throw new Exception("البريد الإلكتروني أو كلمة المرور غير صحيحة", 401);
        $token = createToken((int)$user['id']);

        return [
            'success' => true, 
            'data' => [
                'id' => $user['id'], 
                'token' => $token['token'],
                'expire_token' => $token['expire_token']
            ]
        ];
    } catch (\Throwable $th) {
        error_log("Login error: " . $th->getMessage());
        $errorCode = $th->getCode();
        if (!is_numeric($errorCode)) {
            $errorCode = 500;
        }
        throw new Exception($th->getMessage(), (int)$errorCode);
    } finally {
        if ($pdo !== null) {
            $pdo = null;
        }
    }
}

function authRegister(string $username, string $email, string $password) {
    $config = getConnection();
    $pdo = null;
    
    try {
        if (!isset($config['database']) || empty($config['database']))
          throw new Exception("قاعدة البيانات غير محددة في الإعدادات", 500);
        
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if email or username exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email OR username = :username LIMIT 1");
        $stmt->execute(['email' => $email, 'username' => $username]);
        if ($stmt->fetch()) {
            throw new Exception("البريد الإلكتروني أو اسم المستخدم مسجل مسبقاً", 409);
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password_hash, 'user')");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password_hash' => $password_hash
        ]);
        
        $userId = $pdo->lastInsertId();
        $token = createToken((int)$userId);

        return [
            'success' => true, 
            'data' => [
                'id' => $userId, 
                'token' => $token['token'],
                'expire_token' => $token['expire_token']
            ]
        ];
    } catch (\Throwable $th) {
        error_log("Register error: " . $th->getMessage());
        $errorCode = $th->getCode();
        if (!is_numeric($errorCode)) $errorCode = 500;
        throw new Exception($th->getMessage(), (int)$errorCode);
    } finally {
        if ($pdo !== null) $pdo = null;
    }
}

function checkToken(int $id, string $token) {
    $config = getConnection();
    $pdo = null;
    
    try {
        if (!isset($config['database']) || empty($config['database'])) return false;
        
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT id FROM users WHERE id = :id AND token = :token AND expire_token > NOW() LIMIT 1");
        $stmt->execute(['id' => $id, 'token' => $token]);
        
        return (bool)$stmt->fetch();
    } catch (\Throwable $th) {
        return false;
    } finally {
        if ($pdo !== null) $pdo = null;
    }
}
?>