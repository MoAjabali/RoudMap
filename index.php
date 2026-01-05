<?php 
$pageTitle = "الرئيسية";
$pageType = "home";
include_once  __DIR__ . '/assets/layout/header.php'; 

// بيانات تجريبية للتخصصات
$specializations = [
    ['id' => 1, 'title' => 'تطوير الواجهات الأمامية', 'icon' => 'fa-code', 'desc' => 'تعلم بناء واجهات المواقع باستخدام HTML, CSS, JS و React.', 'skills_count' => 12, 'resources_count' => 45],
    ['id' => 2, 'title' => 'تطوير الواجهات الخلفية', 'icon' => 'fa-server', 'desc' => 'اتقن بناء قواعد البيانات والمنطق البرمجي باستخدام PHP, Node.js.', 'skills_count' => 15, 'resources_count' => 60],
    ['id' => 3, 'title' => 'تطوير تطبيقات الموبايل', 'icon' => 'fa-mobile-alt', 'desc' => 'ابنِ تطبيقات Android و iOS باستخدام Flutter أو React Native.', 'skills_count' => 10, 'resources_count' => 38],
    ['id' => 4, 'title' => 'الذكاء الاصطناعي', 'icon' => 'fa-chart-bar', 'desc' => 'قم بتصميم نماذج ذاماء اصطناعي توليدية', 'skills_count' => 8, 'resources_count' => 25],
];
?>

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">ارسم مسارك المهني في <span class="text-primary">عالم التقنية</span></h1>
                <p class="lead text-muted mb-5">اكتشف خرائط تعلم شاملة، مهارات محددة، وأفضل المصادر التعليمية المنسقة بعناية لتبدأ رحلتك البرمجية بثقة.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#specializations" class="btn btn-primary btn-lg">ابدأ التعلم الآن</a>
                    <a href="/about" class="btn btn-outline-primary btn-lg">من نحن؟</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Specializations Section -->
<section id="specializations" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">التخصصات المتاحة</h2>
            <p class="text-muted">اختر التخصص الذي ترغب في احترافه وابدأ رحلتك</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($specializations as $spec): ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center p-4">
                        <div class="card-body">
                            <div class="icon-box mb-4 text-primary">
                                <i class="fas <?php echo $spec['icon']; ?> fa-3x"></i>
                            </div>
                            <h5 class="card-title mb-3"><?php echo $spec['title']; ?></h5>
                            <p class="card-text text-muted small mb-4"><?php echo $spec['desc']; ?></p>
                            <div class="d-flex justify-content-between text-muted small mb-4">
                                <span><div><i class="fas fa-list-ul me-1"></i> <?php echo $spec['skills_count']; ?></div> مهارة</span>
                                <span><div><i class="fas fa-book me-1"></i> <?php echo $spec['resources_count']; ?></div> مصدر</span>
                            </div>
                            <a href="specialization?specializations_id=<?php echo $spec['id']; ?>" class="btn btn-outline-primary w-100">عرض الخريطة</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <h2 class="fw-bold">10+</h2>
                <p class="mb-0">تخصص تقني</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h2 class="fw-bold">150+</h2>
                <p class="mb-0">مهارة محددة</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h2 class="fw-bold">500+</h2>
                <p class="mb-0">مصدر تعليمي</p>
            </div>
            <div class="col-md-3">
                <h2 class="fw-bold">5000+</h2>
                <p class="mb-0">متعلم نشط</p>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/assets/layout/footer.php'; ?>
