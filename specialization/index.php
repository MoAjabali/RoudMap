<?php 
$pageTitle = "خريطة تعلم الواجهات الأمامية";
$pageType = "specialization";
include __DIR__ . '/../assets/layout/header.php'; 

// بيانات تجريبية للمهارات
$skills = [
    ['id' => 1, 'title' => 'HTML5', 'level' => 'مبتدئ', 'resources' => 5, 'time' => '10 ساعات'],
    ['id' => 2, 'title' => 'CSS3 & Flexbox', 'level' => 'مبتدئ', 'resources' => 8, 'time' => '20 ساعة'],
    ['id' => 3, 'title' => 'JavaScript Basics', 'level' => 'متوسط', 'resources' => 12, 'time' => '40 ساعة'],
    ['id' => 4, 'title' => 'Bootstrap 5', 'level' => 'مبتدئ', 'resources' => 4, 'time' => '15 ساعة'],
    ['id' => 5, 'title' => 'React.js', 'level' => 'متقدم', 'resources' => 15, 'time' => '60 ساعة'],
    ['id' => 6, 'title' => 'Git & GitHub', 'level' => 'متوسط', 'resources' => 6, 'time' => '10 ساعات'],
];
?>

<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.php">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="/specializations">التخصصات</a></li>
            <li class="breadcrumb-item active" aria-current="page">تطوير الواجهات الأمامية</li>
        </ol>
    </nav>

    <!-- Specialization Header -->
    <div class="row align-items-center mb-5">
        <div class="col-md-8">
            <h1 class="fw-bold mb-3">تطوير الواجهات الأمامية (Frontend)</h1>
            <p class="text-muted lead">هذا المسار مخصص لتعلم كيفية بناء واجهات المستخدم التفاعلية والجميلة للمواقع الإلكترونية. ستتعلم كل شيء من الأساسيات حتى الاحتراف.</p>
            <div class="d-flex gap-3 mt-4">
                <span class="badge-tech"><i class="fas fa-clock me-1"></i> الوقت المقدر: 150 ساعة</span>
                <span class="badge-tech"><i class="fas fa-layer-group me-1"></i> 12 مهارة</span>
                <span class="badge-tech"><i class="fas fa-star me-1"></i> مستوى: مبتدئ إلى محترف</span>
            </div>
        </div>
    </div>

    <!-- Skills Grid -->
    <h3 class="mb-4 fw-bold">المهارات المطلوبة</h3>
    <div class="row g-4">
        <?php foreach ($skills as $skill): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-start border-primary border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title mb-0"><?php echo $skill['title']; ?></h5>
                        <span class="badge bg-light text-primary border"><?php echo $skill['level']; ?></span>
                    </div>
                    <p class="text-muted small mb-4">تعلم أساسيات <?php echo $skill['title']; ?> وكيفية استخدامها في المشاريع الحقيقية.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="small text-muted">
                            <span class="me-3"><i class="fas fa-book-open me-1"></i> <?php echo $skill['resources']; ?> مصادر</span>
                            <span><i class="fas fa-hourglass-half me-1"></i> <?php echo $skill['time']; ?></span>
                        </div>
                        <a href="/skills/?skills_id=<?php echo $skill['id']; ?>" class="btn btn-sm btn-primary">عرض المصادر</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Progress Tracker (Placeholder) -->
    <div class="mt-5 p-4 bg-white rounded shadow-sm border">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-2">تتبع تقدمك في هذا المسار</h5>
                <p class="text-muted mb-0">سجل دخولك لتتمكن من تحديد المهارات التي أتقنتها ومتابعة رحلتك التعليمية.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="/auth/login.php" class="btn btn-primary">سجل دخولك الآن</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../assets/layout/footer.php'; ?>
