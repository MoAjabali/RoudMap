<?php 
$pageTitle = "تواصل معنا";
$pageType = "contact";
include __DIR__ . '/../assets/layout/header.php'; 
?>

<div class="container py-5">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.php">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">تواصل معنا</h1>
        <p class="text-muted lead">نحن هنا للإجابة على استفساراتك ومساعدتك</p>
    </div>

    <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold mb-4">أرسل لنا رسالة</h4>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">الاسم الكامل</label>
                        <input type="text" class="form-control" id="name" placeholder="أحمد محمد" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">الموضوع</label>
                        <input type="text" class="form-control" id="subject" placeholder="استفسار عن..." required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">الرسالة</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="اكتب رسالتك هنا..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">
                        <i class="fas fa-paper-plane me-2"></i>إرسال الرسالة
                    </button>
                </form>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-md-5">
            <div class="card p-4 shadow-sm mb-4">
                <h4 class="fw-bold mb-4">معلومات الاتصال</h4>
                <div class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-envelope text-primary fa-lg me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-bold mb-1">البريد الإلكتروني</h6>
                            <p class="text-muted mb-0">info@learningmaps.com</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-clock text-primary fa-lg me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-bold mb-1">ساعات العمل</h6>
                            <p class="text-muted mb-0">السبت - الخميس: 9 صباحاً - 5 مساءً</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold mb-4">تابعنا</h4>
                <div class="d-flex gap-3">
                    <a href="" class="btn btn-outline-primary btn-lg">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="btn btn-outline-primary btn-lg">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="" class="btn btn-outline-primary btn-lg">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="btn btn-outline-primary btn-lg">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../assets/layout/footer.php'; ?>
