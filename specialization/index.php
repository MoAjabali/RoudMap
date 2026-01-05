<?php 
$pageTitle = "خريطة تعلم الواجهات الأمامية";
$pageType = "specialization";
include_once __DIR__ . '/../assets/layout/header.php'; 
include_once __DIR__ . '/../app/controllers/SpecializationsController.php';
include_once __DIR__ . '/../app/helpers/toast.php';
include_once __DIR__ . '/../app/helpers/redirect.php';

try{
    if($_GET){
        $specialization = showSpecialization($_GET['specializations_id'])['data'];
    } else {
        redirect("/specializations/");
    }
} catch (\Throwable $th) {
    error_log("getSpecializations error: " . $th->getMessage());
    showToast($th->getMessage(), 'error', 'حدث خطأ: ');
    echo "<script>setTimeout(() => { window.location.href = '/index.php'; }, 2000);</script>";
    $specializations = [];
}
?>

<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.php">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="/specializations">التخصصات</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $specialization['name']; ?></li>
        </ol>
    </nav>

    <!-- Specialization Header -->
    <div class="row align-items-center mb-5">
        <div class="col-md-8">
            <h1 class="fw-bold mb-3"><?=$specialization['name']?></h1>
            <p class="text-muted lead"><?=$specialization['description']?></p>
            <div class="d-flex gap-3 mt-4">
                <span class="badge-tech"><i class="fas fa-clock me-1"></i> الوقت المقدر: <?=$specialization['total_estimated_hours']?> ساعة</span>
                <span class="badge-tech"><i class="fas fa-layer-group me-1"></i> <?=$specialization['skills_count']?> مهارة</span>
                <!-- <span class="badge-tech"><i class="fas fa-star me-1"></i> مستوى: مبتدئ إلى محترف</span> -->
            </div>
        </div>
    </div>

    <!-- Skills Grid -->
    <h3 class="mb-4 fw-bold">المهارات المطلوبة</h3>
    <div class="row g-4">
        <?php foreach ($specialization['skills'] as $skill): ?>
        <div class="col-md-6 col-lg-4">
            <div class="<?php echo $skill['important'] ? "card h-100 border-start border-primary border-4" : "card h-100 border-start border-secondary border-4"?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title mb-0"><?php echo $skill['name']; ?></h5>
                        <span class="badge bg-light text-primary border"><?php echo $skill['level']; ?></span>
                    </div>
                    <p class="text-muted small mb-4"><?php echo $skill['description']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="small text-muted">
                            <span><i class="fas fa-hourglass-half me-1"></i> <?php echo $skill['estimated_hours']; ?></span>
                        </div>
                        <a href="/skills/?skills_id=<?php echo $skill['id']; ?>" class="<?php echo $skill['important'] ? "btn btn-sm btn-primary" : "btn btn-sm btn-secondary"?>">عرض المصادر</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Progress Tracker (Placeholder) -->
    <!-- <div class="mt-5 p-4 bg-white rounded shadow-sm border">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-2">تتبع تقدمك في هذا المسار</h5>
                <p class="text-muted mb-0">سجل دخولك لتتمكن من تحديد المهارات التي أتقنتها ومتابعة رحلتك التعليمية.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="/auth/login.php" class="btn btn-primary">سجل دخولك الآن</a>
            </div>
        </div>
    </div> -->
</div>

<?php include_once __DIR__ . '/../assets/layout/footer.php'; ?>
