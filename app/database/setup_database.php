<?php
require_once __DIR__ . "/connection.php";

echo "🚀 Start Creating DataBase\n";

try {
    $dsn = "{$config['driver']}:host={$config['host']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT SCHEMA_NAME 
                         FROM INFORMATION_SCHEMA.SCHEMATA 
                         WHERE SCHEMA_NAME = '{$config['database']}'");
    
    if ($stmt->rowCount() == 0) {
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$config['database']}` 
                    CHARACTER SET utf8mb4 
                    COLLATE utf8mb4_unicode_ci");
        echo "✅ Database created successfully.\n";
    } else {
        echo "⚠️ Database already exists. Continuing...\n";
    }
    
    $pdo->exec("USE `{$config['database']}`");
    
    $tables = [
        'specializations' => "
            CREATE TABLE IF NOT EXISTS `specializations` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(100) NOT NULL,
                `description` TEXT,
                `icon` VARCHAR(50),
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ",
        
        'skills' => "
            CREATE TABLE IF NOT EXISTS `skills` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `specialization_id` INT UNSIGNED NOT NULL,
                `name` VARCHAR(150) NOT NULL,
                `description` TEXT,
                `level` ENUM('مبتدئ', 'متوسط', 'متقدم') DEFAULT 'مبتدئ',
                `important` TINYINT(1) DEFAULT 1 COMMENT '1=مهم, 0=اختياري',
                `estimated_hours` INT DEFAULT 0,
                `is_active` TINYINT(1) DEFAULT 1,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (`specialization_id`) REFERENCES `specializations`(`id`) ON DELETE CASCADE,
                INDEX `idx_specialization_id` (`specialization_id`),
                INDEX `idx_level` (`level`),
                INDEX `idx_is_active` (`is_active`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ",
        
        'resources' => "
            CREATE TABLE IF NOT EXISTS `resources` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `skill_id` INT UNSIGNED NOT NULL,
                `title` VARCHAR(200) NOT NULL,
                `url` VARCHAR(500),
                `type` ENUM('مقال', 'فيديو', 'كتاب', 'كورس', 'وثائق', 'بودكاست') DEFAULT 'مقال',
                `language` ENUM('عربي', 'إنجليزي') DEFAULT 'عربي',
                `is_free` TINYINT(1) DEFAULT 1,
                `difficulty` ENUM('مبتدئ', 'متوسط', 'متقدم') DEFAULT 'مبتدئ',
                `duration_minutes` INT,
                `source_platform` VARCHAR(100),
                `rating` DECIMAL(3,2) DEFAULT 0,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (`skill_id`) REFERENCES `skills`(`id`) ON DELETE CASCADE,
                INDEX `idx_skill_id` (`skill_id`),
                INDEX `idx_type` (`type`),
                INDEX `idx_language` (`language`),
                INDEX `idx_is_free` (`is_free`),
                INDEX `idx_difficulty` (`difficulty`),
                INDEX `idx_rating` (`rating`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ",
        
        'users' => "
            CREATE TABLE IF NOT EXISTS `users` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `username` VARCHAR(50) UNIQUE NOT NULL,
                `email` VARCHAR(100) UNIQUE NOT NULL,
                `password_hash` VARCHAR(255) NOT NULL,
                `role` ENUM('user', 'admin') DEFAULT 'user',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `last_login` TIMESTAMP NULL,
                `token` VARCHAR(255) NULL,
                `expire_token` TIMESTAMP NULL,
                INDEX `idx_email` (`email`),
                INDEX `idx_role` (`role`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        "
    ];
    
    foreach ($tables as $tableName => $sql) {
        try {
            $pdo->exec($sql);
            echo "✅ Table '{$tableName}' created successfully.\n";
        } catch (PDOException $e) {
            echo "❌ Error creating table '{$tableName}': " . $e->getMessage() . "\n";
        }
    }
    
    echo "🎉 Finish Creating Database.\n";
    
} catch (PDOException $e) {
    echo "❌ **Database Error:**\n";
    echo "   Error message: " . $e->getMessage() . "\n";
    echo "   Error Code: " . $e->getCode() . "\n";
    
    if ($e->getCode() == 1045) {
        echo "   ⚠️ Check username and password\n";
    } elseif ($e->getCode() == 2002) {
        echo "   ⚠️ Could not connect to MySQL server\n";
    }
    exit(1);
} catch (Exception $e) {
    echo "❌ **General Error:**\n";
    echo "   Error message: " . $e->getMessage() . "\n";
    echo "   Error Code: " . $e->getCode() . "\n";
    exit(1);
} finally {
    if (isset($pdo)) {
        $pdo = null;
        echo "🔌 Database connection closed.\n";
    }
}