<?php 
$pageTitle = "تسجيل الدخول";
include __DIR__ . '/../assets/layout/header.php'; 
?>

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-5">
            <div class="card p-4 shadow-sm">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">مرحباً بك مجدداً</h3>
                    <p class="text-muted">سجل دخولك لمتابعة تقدمك في خرائط التعلم</p>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" dir="ltr" id="password" placeholder="********" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label small" for="remember">تذكرني</label>
                        </div>
                        <a href="#" class="small text-decoration-none">نسيت كلمة المرور؟</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">تسجيل الدخول</button>
                    <div class="text-center">
                        <p class="small text-muted">ليس لديك حساب؟ <a href="register.php" class="text-decoration-none">أنشئ حساباً جديداً</a></p>
                    </div>
                </form>
                <!-- <hr class="my-4">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-dark btn-sm"><i class="fab fa-google me-2"></i> الدخول بواسطة جوجل</button>
                    <button class="btn btn-outline-dark btn-sm"><i class="fab fa-github me-2"></i> الدخول بواسطة جيت هاب</button>
                </div> -->
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../assets/layout/footer.php'; ?>
