<?php 
$pageTitle = "مصادر تعلم HTML5";
include __DIR__ . '/../assets/layout/header.php'; 

// بيانات تجريبية للمصادر
$resources = [
    ['id' => 1, 'title' => 'دورة HTML5 كاملة - أكاديمية حسوب', 'type' => 'فيديو', 'provider' => 'Hsoub', 'link' => '#', 'rating' => 4.8],
    ['id' => 2, 'title' => 'دليل HTML الشامل - MDN Web Docs', 'type' => 'مقالة', 'provider' => 'Mozilla', 'link' => '#', 'rating' => 5.0],
    ['id' => 3, 'title' => 'تعلم HTML في ساعة واحدة', 'type' => 'فيديو', 'provider' => 'YouTube', 'link' => '#', 'rating' => 4.5],
    ['id' => 4, 'title' => 'تحديات HTML5 التفاعلية', 'type' => 'تطبيق عملي', 'provider' => 'FreeCodeCamp', 'link' => '#', 'rating' => 4.9],
];
?>

<div class="container">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="/specializations/">تطوير الواجهات الأمامية</a></li>
            <li class="breadcrumb-item active" aria-current="page">HTML5</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-4">
            <div class="card p-3">
                <h5 class="fw-bold mb-3">تصفية المصادر</h5>
                <div class="mb-3">
                    <label class="form-label fw-bold small">نوع المصدر</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="video" checked>
                        <label class="form-check-label small" for="video">فيديو</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="article" checked>
                        <label class="form-check-label small" for="article">مقالات</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="practice" checked>
                        <label class="form-check-label small" for="practice">تطبيق عملي</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">اللغة</label>
                    <select class="form-select form-select-sm">
                        <option selected>الكل</option>
                        <option>العربية</option>
                        <option>الإنجليزية</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-sm w-100">تطبيق التصفية</button>
            </div>
        </div>

        <!-- Resources List -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold mb-0">مصادر تعلم HTML5</h2>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        ترتيب حسب: الأحدث
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">الأحدث</a></li>
                        <li><a class="dropdown-item" href="#">الأعلى تقييماً</a></li>
                    </ul>
                </div>
            </div>

            <div class="row g-3">
                <?php foreach ($resources as $res): ?>
                <div class="col-12">
                    <div class="card resource-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-light p-3 rounded text-primary">
                                    <?php if($res['type'] == 'فيديو'): ?>
                                        <i class="fas fa-play-circle fa-2x"></i>
                                    <?php elseif($res['type'] == 'مقالة'): ?>
                                        <i class="fas fa-file-alt fa-2x"></i>
                                    <?php else: ?>
                                        <i class="fas fa-laptop-code fa-2x"></i>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <h5 class="mb-1 fw-bold"><?php echo $res['title']; ?></h5>
                                    <span class="text-warning small"><i class="fas fa-star me-1"></i> <?php echo $res['rating']; ?></span>
                                </div>
                                <p class="text-muted small mb-0">بواسطة: <span class="text-dark fw-medium"><?php echo $res['provider']; ?></span> | النوع: <?php echo $res['type']; ?></p>
                            </div>
                            <div class="ms-3">
                                <a href="<?php echo $res['link']; ?>" target="_blank" class="btn btn-outline-primary btn-sm">انتقل للمصدر</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Share Section -->
            <!-- <div class="mt-5 text-center">
                <p class="text-muted mb-3">هل أعجبتك هذه المصادر؟ شاركها مع أصدقائك</p>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-sm btn-outline-info"><i class="fab fa-twitter me-1"></i> تويتر</button>
                    <button class="btn btn-sm btn-outline-primary"><i class="fab fa-facebook me-1"></i> فيسبوك</button>
                    <button class="btn btn-sm btn-outline-success"><i class="fab fa-whatsapp me-1"></i> واتساب</button>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php include __DIR__ . '/../assets/layout/footer.php'; ?>
