<?php 
$pageTitle = "التخصصات المتاحة";
$pageType = "specialization";
include __DIR__ . '/../assets/layout/header.php'; 

// بيانات التخصصات - نفس البيانات من index.php
$specializations = [
    ['id' => 1, 'title' => 'تطوير الواجهات الأمامية', 'icon' => 'fa-code', 'desc' => 'تعلم بناء واجهات المواقع باستخدام HTML, CSS, JS و React.', 'skills_count' => 12, 'resources_count' => 45],
    ['id' => 2, 'title' => 'تطوير الواجهات الخلفية', 'icon' => 'fa-server', 'desc' => 'اتقن بناء قواعد البيانات والمنطق البرمجي باستخدام PHP, Node.js.', 'skills_count' => 15, 'resources_count' => 60],
    ['id' => 3, 'title' => 'تطوير تطبيقات الموبايل', 'icon' => 'fa-mobile-alt', 'desc' => 'ابنِ تطبيقات Android و iOS باستخدام Flutter أو React Native.', 'skills_count' => 10, 'resources_count' => 38],
    ['id' => 4, 'title' => 'الذكاء الاصطناعي', 'icon' => 'fa-brain', 'desc' => 'قم بتصميم نماذج ذكاء اصطناعي توليدية', 'skills_count' => 8, 'resources_count' => 25],
    ['id' => 5, 'title' => 'علوم البيانات', 'icon' => 'fa-chart-bar', 'desc' => 'حلل البيانات واستخرج الأنماط باستخدام Python و SQL.', 'skills_count' => 9, 'resources_count' => 30],
    ['id' => 6, 'title' => 'الأمن السيبراني', 'icon' => 'fa-shield-alt', 'desc' => 'تعلم حماية الأنظمة والشبكات من الهجمات الإلكترونية.', 'skills_count' => 11, 'resources_count' => 35],
];
?>

<div class="container py-5">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.php">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">التخصصات</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">جميع التخصصات التقنية</h1>
        <p class="text-muted lead">اختر التخصص الذي يناسبك وابدأ رحلتك التعليمية</p>
    </div>

    <!-- Specializations Grid -->
    <div class="row g-4">
        <?php foreach ($specializations as $spec): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <div class="icon-box mb-4 text-primary">
                        <i class="fas <?php echo $spec['icon']; ?> fa-3x"></i>
                    </div>
                    <h5 class="card-title mb-3"><?php echo $spec['title']; ?></h5>
                    <p class="card-text text-muted small mb-4"><?php echo $spec['desc']; ?></p>
                    <div class="d-flex justify-content-between text-muted small mb-4">
                        <span><i class="fas fa-list-ul me-1"></i> <?php echo $spec['skills_count']; ?> مهارة</span>
                        <span><i class="fas fa-book me-1"></i> <?php echo $spec['resources_count']; ?> مصدر</span>
                    </div>
                    <a href="/specialization?specializations_id=<?php echo $spec['id']; ?>" class="btn btn-outline-primary w-100">
                        <i class="fas fa-map-marked-alt me-2"></i>عرض الخريطة
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- CTA Section -->
    <div class="mt-5 p-5 text-center bg-primary text-white rounded">
        <h3 class="fw-bold mb-3">لم تجد التخصص المناسب؟</h3>
        <p class="mb-4">نعمل باستمرار على إضافة تخصصات جديدة. تواصل معنا واقترح تخصصك المفضل!</p>
        <a href="/contact" class="btn btn-light btn-lg">
            <i class="fas fa-paper-plane me-2"></i>تواصل معنا
        </a>
    </div>
</div>

<?php include __DIR__ . '/../assets/layout/footer.php'; ?>
