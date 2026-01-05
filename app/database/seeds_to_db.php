<?php
require_once __DIR__ . "/connection.php";

echo "🌱 Start Seeding Database...\n";
$config = getConnection();
try {
    $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Clear existing data (Optional, but good for a fresh seed)
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
    $pdo->exec("TRUNCATE TABLE resources");
    $pdo->exec("TRUNCATE TABLE skills");
    $pdo->exec("TRUNCATE TABLE specializations");
    $pdo->exec("TRUNCATE TABLE users");
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1");
    echo "🧹 Cleared existing data.\n";

    // 2. Seed Users
    $users = [
        [
            'username' => 'admin',
            'email' => 'admin@almasader.com',
            'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin'
        ],
        [
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password_hash' => password_hash('user123', PASSWORD_DEFAULT),
            'role' => 'user'
        ]
    ];

    $userStmt = $pdo->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)");
    foreach ($users as $user) {
        $userStmt->execute($user);
    }
    echo "✅ Seeded Users (Admin & User).\n";
    
    // 3. Seed Specializations
    $specializations = [
        [
            'name' => 'تطوير الواجهات الأمامية', 
            'icon' => 'fa-code', 
            'description' => 'تعلم بناء واجهات المواقع باستخدام HTML, CSS, JS و React.'
        ],
        [
            'name' => 'تطوير الواجهات الخلفية', 
            'icon' => 'fa-server', 
            'description' => 'اتقن بناء قواعد البيانات والمنطق البرمجي باستخدام PHP, Node.js.'
        ],
        [
            'name' => 'تطوير تطبيقات الموبايل', 
            'icon' => 'fa-mobile-alt', 
            'description' => 'ابنِ تطبيقات Android و iOS باستخدام Flutter أو React Native.'
        ],
        [
            'name' => 'الذكاء الاصطناعي', 
            'icon' => 'fa-brain', 
            'description' => 'قم بتصميم نماذج ذكاء اصطناعي توليدية'
        ],
    ];

    $specStmt = $pdo->prepare("INSERT INTO specializations (name, icon, description) VALUES (:name, :icon, :description)");
    foreach ($specializations as $spec) {
        $specStmt->execute($spec);
    }
    echo "✅ Seeded Specializations.\n";

    // 4. Seed Skills (mostly for Frontend - ID 1)
    $skills = [
        // Frontend (Spec 1)
        ['specialization_id' => 1, 'name' => 'HTML5', 'level' => 'مبتدئ', 'estimated_hours' => 10, 'description' => 'لغة هيكلة صفحات الويب'],
        ['specialization_id' => 1, 'name' => 'CSS3 & Flexbox', 'level' => 'مبتدئ', 'estimated_hours' => 20, 'description' => 'تنسيق وتصميم الصفحات'],
        ['specialization_id' => 1, 'name' => 'JavaScript Basics', 'level' => 'متوسط', 'estimated_hours' => 40, 'description' => 'أساسيات البرمجة التفاعلية'],
        ['specialization_id' => 1, 'name' => 'Bootstrap 5', 'level' => 'مبتدئ', 'estimated_hours' => 15, 'description' => 'إطار عمل لتصميم سريع'],
        ['specialization_id' => 1, 'name' => 'React.js', 'level' => 'متقدم', 'estimated_hours' => 60, 'description' => 'مكتبة بناء واجهات المستخدم'],
        ['specialization_id' => 1, 'name' => 'Git & GitHub', 'level' => 'متوسط', 'estimated_hours' => 10, 'description' => 'إدارة النسخ والتعاون'],
        // Backend (Spec 2)
        ['specialization_id' => 2, 'name' => 'PHP Native', 'level' => 'مبتدئ', 'estimated_hours' => 30, 'description' => 'أساسيات لغة PHP والتعامل مع السيرفر.'],
        ['specialization_id' => 2, 'name' => 'MySQL & PDO', 'level' => 'متوسط', 'estimated_hours' => 20, 'description' => 'إدارة قواعد البيانات والاتصال الآمن.'],
        ['specialization_id' => 2, 'name' => 'Laravel Framework', 'level' => 'متقدم', 'estimated_hours' => 60, 'description' => 'بناء تطبيقات ويب متكاملة واحترافية.'],
        
        // Mobile (Spec 3)
        ['specialization_id' => 3, 'name' => 'Dart & Flutter', 'level' => 'متوسط', 'estimated_hours' => 50, 'description' => 'بناء تطبيقات موبايل متعددة المنصات.'],
        
        // AI (Spec 4)
        ['specialization_id' => 4, 'name' => 'Python for Data Science', 'level' => 'مبتدئ', 'estimated_hours' => 40, 'description' => 'أساسيات لغة بايثون لتحليل البيانات.'],
    ];

    $skillStmt = $pdo->prepare("INSERT INTO skills (specialization_id, name, level, estimated_hours, description) VALUES ( :specialization_id, :name, :level, :estimated_hours, :description)");
    foreach ($skills as $skill) {
        $skillStmt->execute($skill);
    }
    echo "✅ Seeded Skills.\n";

    // 5. Seed Resources
    $resources = [
        // HTML5
        [
            'skill_id' => 1, 
            'title' => 'دورة HTML5 كاملة - أكاديمية حسوب', 
            'type' => 'فيديو', 
            'source_platform' => 'Hsoub', 
            'url' => 'https://academy.hsoub.com', 
            'rating' => 4.8,
            'language' => 'عربي',
            'is_free' => 1,
            'difficulty' => 'مبتدئ',
            'duration_minutes' => 300
        ],
        [
            'skill_id' => 1, 
            'title' => 'دليل HTML الشامل - MDN Web Docs', 
            'type' => 'مقال', 
            'source_platform' => 'Mozilla', 
            'url' => 'https://developer.mozilla.org', 
            'rating' => 5.0,
            'language' => 'إنجليزي',
            'is_free' => 1,
            'difficulty' => 'مبتدئ',
            'duration_minutes' => 60
        ],
        [
            'skill_id' => 1, 
            'title' => 'تعلم HTML في ساعة واحدة', 
            'type' => 'فيديو', 
            'source_platform' => 'YouTube', 
            'url' => 'https://youtube.com', 
            'rating' => 4.5,
            'language' => 'عربي',
            'is_free' => 1,
            'difficulty' => 'مبتدئ',
            'duration_minutes' => 60
        ],
        [
            'skill_id' => 1, 
            'title' => 'تحديات HTML5 التفاعلية', 
            'type' => 'كورس', 
            'source_platform' => 'FreeCodeCamp', 
            'url' => 'https://freecodecamp.org', 
            'rating' => 4.9,
            'language' => 'إنجليزي',
            'is_free' => 1,
            'difficulty' => 'متوسط',
            'duration_minutes' => 180
        ],
        // CSS & Tailwind
        [
            'skill_id' => 2, 
            'title' => 'Tailwind CSS Crash Course', 
            'type' => 'فيديو', 
            'language' => 'إنجليزي', 
            'is_free' => 1, 
            'difficulty' => 'متوسط', 
            'duration_minutes' => 120, 
            'source_platform' => 'YouTube', 
            'url' => 'https://youtube.com', 
            'rating' => 4.7
        ],
        
        // PHP
        [
            'skill_id' => 4, 
            'title' => 'تعلم PHP من الصفر - الزيرو', 
            'type' => 'فيديو', 
            'language' => 'عربي', 
            'is_free' => 1, 
            'difficulty' => 'مبتدئ', 
            'duration_minutes' => 600, 
            'source_platform' => 'Elzero Web School', 
            'url' => 'https://elzero.org', 
            'rating' => 4.9
        ],
        
        // Laravel
        [
            'skill_id' => 6, 
            'title' => 'Laravel Documentation', 
            'type' => 'وثائق', 
            'language' => 'إنجليزي', 
            'is_free' => 1, 
            'difficulty' => 'متقدم', 
            'duration_minutes' => 0, 
            'source_platform' => 'Laravel.com', 
            'url' => 'https://laravel.com/docs', 
            'rating' => 5.0
        ],
        [
            'skill_id' => 6, 
            'title' => 'بناء متجر إلكتروني بـ Laravel', 
            'type' => 'كورس', 
            'language' => 'عربي', 
            'is_free' => 0, 
            'difficulty' => 'متقدم', 
            'duration_minutes' => 1200, 
            'source_platform' => 'Udemy', 
            'url' => 'https://udemy.com', 
            'rating' => 4.6
        ],

        // Flutter
        [
            'skill_id' => 7, 
            'title' => 'Flutter & Dart - The Complete Guide', 
            'type' => 'كورس', 
            'language' => 'إنجليزي', 
            'is_free' => 0, 
            'difficulty' => 'متوسط', 
            'duration_minutes' => 2400, 
            'source_platform' => 'Udemy', 
            'url' => 'https://udemy.com', 
            'rating' => 4.8
        ],

        // Python AI
        [
            'skill_id' => 8, 
            'title' => 'Python for Everybody', 
            'type' => 'كتاب', 
            'language' => 'إنجليزي', 
            'is_free' => 1, 
            'difficulty' => 'مبتدئ', 
            'duration_minutes' => 0, 
            'source_platform' => 'PY4E', 
            'url' => 'https://py4e.com', 
            'rating' => 4.9
        ],
    ];

    $resStmt = $pdo->prepare("INSERT INTO resources (skill_id, title, type, source_platform, url, rating, language, is_free, difficulty, duration_minutes) VALUES (:skill_id, :title, :type, :source_platform, :url, :rating, :language, :is_free, :difficulty, :duration_minutes)");
    foreach ($resources as $res) {
        $resStmt->execute($res);
    }
    echo "✅ Seeded Resources.\n";

    echo "🎉 Database Seeding Completed Successfully!\n";

} catch (PDOException $e) {
    echo "❌ **Seeding Error:** " . $e->getMessage() . "\n";
    exit(1);
}
