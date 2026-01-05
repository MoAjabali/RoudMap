<?php 
$pageTitle = "الملف الشخصي";
include_once __DIR__ . '/../assets/layout/header.php'; 
?>

<div class="container">
    <div class="row">
        <!-- User Info Sidebar -->
        <div class="col-lg-4 mb-4">
            <div class="card text-center p-4">
                <div class="mb-3">
                    <img src="https://ui-avatars.com/api/?name=محمد+أحمد&background=3498db&color=fff&size=128" alt="User Avatar" class="rounded-circle shadow-sm">
                </div>
                <h4 class="fw-bold mb-1">محمد أحمد</h4>
                <p class="text-muted small mb-3">مطور واجهات أمامية طموح</p>
                <div class="d-flex justify-content-center gap-2 mb-4">
                    <span class="badge bg-light text-primary border">مستوى 5</span>
                    <span class="badge bg-light text-success border">1200 نقطة</span>
                </div>
                <hr>
                <div class="text-start">
                    <h6 class="fw-bold mb-3">معلومات التواصل</h6>
                    <p class="small mb-2"><i class="fas fa-envelope me-2 text-muted"></i> m.ahmed@example.com</p>
                    <p class="small mb-0"><i class="fas fa-calendar-alt me-2 text-muted"></i> انضم في: يناير 2024</p>
                </div>
                <button class="btn btn-outline-primary btn-sm w-100 mt-4">تعديل الملف الشخصي</button>
            </div>
        </div>

        <!-- Progress Dashboard -->
        <div class="col-lg-8">
            <h3 class="fw-bold mb-4">لوحة تتبع التقدم</h3>
            
            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card p-3 bg-primary text-white">
                        <h6 class="small mb-1">المسارات المكتملة</h6>
                        <h3 class="fw-bold mb-0">2</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 bg-success text-white">
                        <h6 class="small mb-1">المهارات المتقنة</h6>
                        <h3 class="fw-bold mb-0">15</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 bg-info text-white">
                        <h6 class="small mb-1">المصادر المحفوظة</h6>
                        <h3 class="fw-bold mb-0">24</h3>
                    </div>
                </div>
            </div>

            <!-- Current Learning Path -->
            <div class="card mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">المسار الحالي: تطوير الواجهات الأمامية</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="small fw-bold">نسبة الإنجاز</span>
                        <span class="small fw-bold">65%</span>
                    </div>
                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 65%"></div>
                    </div>
                    
                    <h6 class="fw-bold mb-3">المهارات القادمة:</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-circle text-muted me-2 small"></i> React Hooks</span>
                            <a href="#" class="btn btn-sm btn-light border">ابدأ الآن</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-circle text-muted me-2 small"></i> State Management (Redux)</span>
                            <span class="badge bg-light text-muted border">مغلق</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">آخر النشاطات</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">أكملت مهارة: CSS Grid</h6>
                                <small class="text-muted">منذ ساعتين</small>
                            </div>
                            <p class="mb-1 small text-muted">لقد حصلت على 50 نقطة إضافية!</p>
                        </div>
                        <div class="list-group-item py-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 fw-bold">أضفت مصدراً للمفضلة: MDN Docs</h6>
                                <small class="text-muted">أمس</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../assets/layout/footer.php'; ?>
