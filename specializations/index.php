<?php 
$pageTitle = "التخصصات المتاحة";
$pageType = "specialization";
include_once __DIR__ . '/../assets/layout/header.php'; 
include_once __DIR__ . '/../app/controllers/SpecializationsController.php';
include_once __DIR__ . '/../app/helpers/toast.php';

try{
    $specializations = indexSpecializations()['data'];
} catch (\Throwable $th) {
    error_log("getSpecializations error: " . $th->getMessage());
    showToast($th->getMessage(), 'error', 'حدث خطأ: ');
    $specializations = [];
}
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
                    <h5 class="card-title mb-3"><?php echo $spec['name']; ?></h5>
                    <p class="card-text text-muted small mb-4"><?php echo $spec['description']; ?></p>
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

<?php include_once __DIR__ . '/../assets/layout/footer.php'; ?>
