<?php 
include_once __DIR__ . '/../app/controllers/UserController.php';
include_once  __DIR__ . '/../app/helpers/toast.php';

$loginSuccess = false;
$errorMsg = '';

if ($_POST) {
    try {
        if (login($_POST['email'], $_POST['password'])) {
            $loginSuccess = true;
            $disableRedirect = true; // Prevent header.php from redirecting immediately
        }
    } catch (\Throwable $th) {
        $errorMsg = $th->getMessage();
    }
}

$pageTitle = "تسجيل الدخول";
include_once __DIR__ . '/../assets/layout/header.php'; 
?>

<?php
if ($loginSuccess) {
    showToast("تم تسجيل دخولك بنجاح, سيتم توجيهك الان.", "success");
    echo "<script>setTimeout(() => { window.location.href = '/index.php'; }, 2000);</script>";
}
if ($errorMsg) {
    showToast($errorMsg, 'error', 'حدث خطأ');
}
?>

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-5">
            <div class="card p-4 shadow-sm">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">مرحباً بك مجدداً</h3>
                    <p class="text-muted">سجل دخولك لمتابعة تقدمك في خرائط التعلم</p>
                </div>
                <form method="post" >
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" name='email' placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" dir="ltr" id="password" name='password' placeholder="********" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" checked>
                            <label class="form-check-label small" for="remember">تذكرني</label>
                        </div>
                        <a href="#" class="small text-decoration-none">نسيت كلمة المرور؟</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">تسجيل الدخول</button>
                    <div class="text-center">
                        <p class="small text-muted">ليس لديك حساب؟ <a href="register.php" class="text-decoration-none">أنشئ حساباً جديداً</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../assets/layout/footer.php'; ?>
