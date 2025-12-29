<?php 
$pageTitle = "إنشاء حساب جديد";
include __DIR__ . '/../assets/layout/header.php'; 
?>

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">انضم إلينا</h3>
                    <p class="text-muted">أنشئ حسابك وابدأ رحلتك التعليمية</p>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">الاسم الكامل</label>
                        <input type="text" class="form-control" id="fullname" placeholder="أحمد محمد" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" dir="ltr" id="password" placeholder="********" required>
                        <small class="text-muted">يجب أن تحتوي على 8 أحرف على الأقل</small>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" dir="ltr" id="confirm_password" placeholder="********" required>
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

<?php include __DIR__ . '/../assets/layout/footer.php'; ?>
