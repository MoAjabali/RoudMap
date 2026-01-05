<?php 
$pageTitle = "من نحن";
$pageType = "about";
include_once __DIR__ . '/../assets/layout/header.php'; 
?>

<div class="container py-5">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.php">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">من نحن</li>
        </ol>
    </nav>

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">من نحن</h1>
        <p class="text-muted lead">منصة عربية لرسم طريق النجاح في عالم التقنية</p>
    </div>

    <!-- Vision & Mission -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 p-4 border-0 shadow-sm">
                <div class="text-center mb-3">
                    <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                    <h3 class="fw-bold">رؤيتنا</h3>
                </div>
                <p class="text-muted">أن نكون المنصة العربية الأولى التي توفر خرائط تعليمية واضحة ومنظمة للمبرمجين والتقنيين، مما يسهل عليهم رحلة التعلم ويختصر الطريق نحو الاحتراف.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 p-4 border-0 shadow-sm">
                <div class="text-center mb-3">
                    <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                    <h3 class="fw-bold">مهمتنا</h3>
                </div>
                <p class="text-muted">تقديم مسارات تعليمية شاملة ومنظمة، مع توفير أفضل المصادر التعليمية المنسقة بعناية، لمساعدة المتعلمين العرب على بناء مهاراتهم التقنية بثقة وكفاءة.</p>
            </div>
        </div>
    </div>

    <!-- About Content -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4">
            <h2 class="fw-bold mb-4">قصتنا</h2>
            <p class="text-muted mb-3">بدأت فكرة "خرائط التعلم" من إحباط المتعلمين العرب في عالم البرمجة والتقنية. كثيرون يتساءلون: من أين أبدأ؟ ما المهارات المطلوبة؟ ما أفضل المصادر؟</p>
            <p class="text-muted mb-3">أنشأنا هذه المنصة لنكون الدليل الشامل الذي يرسم الطريق بوضوح، ويوفر خرائط تعليمية مفصلة لكل تخصص تقني، مع قائمة منسقة من أفضل المصادر التعليمية المجانية والمدفوعة.</p>
            <p class="text-muted">هدفنا هو تمكين كل متعلم عربي من بناء مستقبل مهني ناجح في عالم التقنية.</p>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-5 bg-light rounded text-center">
                <i class="fas fa-map-marked-alt fa-5x text-primary mb-3"></i>
                <h4 class="fw-bold">رحلتك تبدأ من هنا</h4>
            </div>
        </div>
    </div>

    <!-- Values -->
    <div class="mb-5">
        <h2 class="fw-bold text-center mb-4">قيمنا</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <i class="fas fa-star fa-2x text-primary mb-3"></i>
                    <h5 class="fw-bold mb-3">الجودة</h5>
                    <p class="text-muted small">نختار المصادر بعناية لضمان أفضل تجربة تعليمية</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <i class="fas fa-lightbulb fa-2x text-primary mb-3"></i>
                    <h5 class="fw-bold mb-3">الوضوح</h5>
                    <p class="text-muted small">خرائط واضحة ومنظمة لتسهيل رحلة التعلم</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <i class="fas fa-users fa-2x text-primary mb-3"></i>
                    <h5 class="fw-bold mb-3">المجتمع</h5>
                    <p class="text-muted small">بناء مجتمع داعم من المتعلمين والمحترفين</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="bg-primary text-white p-5 rounded text-center">
        <h3 class="fw-bold mb-4">إنجازاتنا حتى الآن</h3>
        <div class="row">
            <div class="col-md-3 mb-3">
                <h2 class="fw-bold">10+</h2>
                <p>تخصص تقني</p>
            </div>
            <div class="col-md-3 mb-3">
                <h2 class="fw-bold">150+</h2>
                <p>مهارة محددة</p>
            </div>
            <div class="col-md-3 mb-3">
                <h2 class="fw-bold">500+</h2>
                <p>مصدر تعليمي</p>
            </div>
            <div class="col-md-3 mb-3">
                <h2 class="fw-bold">5000+</h2>
                <p>متعلم نشط</p>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../assets/layout/footer.php'; ?>
