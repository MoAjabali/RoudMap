<?php
    $auth = false;
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | خرائط التعلم' : 'خرائط التعلم التقنية'; ?></title>
    
    <!-- Bootstrap 5 RTL -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css"> -->
    <link rel="stylesheet" href="/assets/css/bootstrap.rtl.min.css">
    
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
    <link rel="stylesheet" href="/assets/css/all.min.css">
    

    <!-- Google Fonts (Tajawal) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="/index.php">
                <i class="fas fa-map-marked-alt me-2"></i> خرائط التعلم
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class=<?= isset($pageType) && $pageType=="home" ? 'nav-link active' : 'nav-link'; ?> href="/index.php">
                            <i class="fas fa-home me-1"></i>
                            الرئيسية
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class=<?= isset($pageType) && $pageType=="specialization" ? "nav-link dropdown-toggle active" : "nav-link dropdown-toggle"?> href="#" id="specialtiesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-graduation-cap me-1"></i>
                            التخصصات
                        </a>
                        <ul class="dropdown-menu dropdown-menu-custom" aria-labelledby="specialtiesDropdown">
                            <li><a class="dropdown-item" href="/specialization?specializations_id=1"><i class="fas fa-code me-2"></i>تطوير الـfrontend</a></li>
                            <li><a class="dropdown-item" href="/specialization?specializations_id=1"><i class="fas fa-code me-2"></i>تطوير الـbackend</a></li>
                            <li><a class="dropdown-item" href="/specialization?specializations_id=1"><i class="fas fa-mobile-alt me-2"></i>تطوير التطبيقات</a></li>
                            <li><a class="dropdown-item" href="/specialization?specializations_id=1"><i class="fas fa-database me-2"></i>قواعد البيانات</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/specialization?specializations_id=1"><i class="fas fa-brain me-2"></i>الذكاء الاصطناعي</a></li>
                            <li><a class="dropdown-item" href="/specialization?specializations_id=1"><i class="fas fa-shield-alt me-2"></i>الأمن السيبراني</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class=<?= isset($pageType) && $pageType=="about" ? "nav-link active" : "nav-link"?> href="/about">
                            <i class="fas fa-info-circle me-1"></i>
                             من نحن
                        </a>
                    </li>
                </ul>

                <?php if(!$auth): ?>
                <!-- أزرار تسجيل الدخول للجوال فقط (داخل القائمة المنسدلة) -->
                <div class="d-lg-none mobile-auth-section">
                    <hr class="my-2">
                    <div class="px-3 py-2">
                        <a href="/auth/login.php" class="btn btn-outline-primary w-100 mb-2">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            تسجيل دخول
                        </a>
                        <a href="/auth/register.php" class="btn btn-primary w-100">
                            <i class="fas fa-user-plus me-2"></i>
                            إنشاء حساب جديد
                        </a>
                    </div>
                </div>
                <?php else: ?>
                <!-- قائمة المستخدم للجوال فقط (داخل القائمة المنسدلة) -->
                <div class="d-lg-none mobile-auth-section">
                    <hr class="my-2">
                    <ul class="navbar-nav px-3 py-2">
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">
                                <i class="fas fa-user me-2"></i>
                                الملف الشخصي
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/settings">
                                <i class="fas fa-cog me-2"></i>
                                الإعدادات
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="/logout">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                تسجيل خروج
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <?php if(!$auth): ?>
            <!-- أزرار تسجيل الدخول للشاشات الكبيرة فقط -->
            <div class="d-none d-lg-flex align-items-center">
                <a href="/auth/login.php" class="btn btn-outline-primary me-2">
                    <i class="fas fa-sign-in-alt me-1"></i>
                    تسجيل دخول
                </a>
                <a href="/auth/register.php" class="btn btn-primary">
                    <i class="fas fa-user-plus me-1"></i>
                    حساب جديد
                </a>
            </div>
            <?php else: ?>
            <!-- أيقونة المستخدم للشاشات الكبيرة فقط -->
            <div class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-lg text-primary p-2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/profile"><i class="fas fa-user me-2"></i>الملف الشخصي</a></li>
                    <!-- <li><a class="dropdown-item" href="/settings"><i class="fas fa-cog me-2"></i>الإعدادات</a></li> -->
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>تسجيل خروج</a></li>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    <main class="py-4">
