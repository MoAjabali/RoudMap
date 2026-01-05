<?php
require_once __DIR__ . "/../models/UserModel.php";

function login($email, $password) {
  try {
    if (empty($email) || empty($password))
      throw new Exception("يجب إدخال البريد الالكتروني وكلمة المرور.", 400);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      throw new Exception("البريد الالكتروني غير صحيح.", 400);
    
    $result = authLogin($email, $password);
    
    if($result['success']){
      $expire_timestamp = strtotime($result['data']['expire_token']);
      setcookie('token', $result['data']['token'], $expire_timestamp, "/", "", false, true);
      setcookie('id', $result['data']['id'], $expire_timestamp, "/", "", false, false);
      return true;
    }
    
    return false;
  } catch (\Throwable $th) {
    error_log("Login error: " . $th->getMessage());
    throw new Exception($th->getMessage(), $th->getCode() ?: 400);
  }
}

function register($username, $email, $password) {
  try {
    if (empty($username) || empty($email) || empty($password))
      throw new Exception("جميع الحقول مطلوبة.", 400);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      throw new Exception("البريد الالكتروني غير صحيح.", 400);
    if(strlen($password) < 6)
      throw new Exception("كلمة المرور يجب أن تكون 6 أحرف على الأقل.", 400);
      
    $result = authRegister($username, $email, $password);
    
    if($result['success']){
      $expire_timestamp = strtotime($result['data']['expire_token']);
      setcookie('token', $result['data']['token'], $expire_timestamp, "/", "", false, true);
      setcookie('id', $result['data']['id'], $expire_timestamp, "/", "", false, false);
      return true;
    }
    
    return false;
  } catch (\Throwable $th) {
    error_log("Register error: " . $th->getMessage());
    throw new Exception($th->getMessage(), $th->getCode() ?: 400);
  }
}

function isAuth() {
    if (isset($_COOKIE['id']) && isset($_COOKIE['token'])) {
        return checkToken((int)$_COOKIE['id'], $_COOKIE['token']);
    }
    return false;
}

function logout() {
    if (isset($_COOKIE['id'])) {
        unsetToken((int)$_COOKIE['id']);
    }
    setcookie('token', '', time() - 3600, "/");
    setcookie('id', '', time() - 3600, "/");
}
?>