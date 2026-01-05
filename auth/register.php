<?php 
include_once __DIR__ . '/../app/controllers/UserController.php';
include_once  __DIR__ . '/../app/helpers/toast.php';

$registerSuccess = false;
$errorMsg = '';

if ($_POST) {
    try {
        if ($_POST['password'] !== $_POST['confirm_password']) {
            throw new Exception("كلمتي المرور غير متطابقتين", 400);
        }

        if (register($_POST['username'], $_POST['email'], $_POST['password'])) {
            $registerSuccess = true;
            $disableRedirect = true; // Prevent header.php from redirecting immediately
        }
    } catch (\Throwable $th) {
        $errorMsg = $th->getMessage();
    }
}

$pageTitle = "إنشاء حساب جديد";
include_once __DIR__ . '/../assets/layout/header.php'; 
?>

<?php
if ($registerSuccess) {
    showToast("تم إنشاء الحساب بنجاح! سيتم توجيهك الآن.", "success");
    echo "<script>setTimeout(() => { window.location.href = '/index.php'; }, 2000);</script>";
}
if ($errorMsg) {
    showToast($errorMsg, 'error', 'حدث خطأ');
}
?>

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">انضم إلينا</h3>
                    <p class="text-muted">أنشئ حسابك وابدأ رحلتك التعليمية</p>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">اسم المستخدم</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" dir="ltr" id="password" name="password" placeholder="********" required>
                        <small class="text-muted">يجب أن تحتوي على 6 أحرف على الأقل</small>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" dir="ltr" id="confirm_password" name="confirm_password" placeholder="********" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label small" for="terms">
                            أوافق على <a href="/privacy-policy" class="text-decoration-none">سياسة الخصوصية</a> وشروط الاستخدام
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">إنشاء الحساب</button>
                    <div class="text-center">
                        <p class="small text-muted">لديك حساب بالفعل؟ <a href="login.php" class="text-decoration-none">سجل دخولك</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../assets/layout/footer.php'; ?>
