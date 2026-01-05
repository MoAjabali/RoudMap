<?php 
$pageTitle = "الأسئلة الشائعة";
$pageType = "faq";
include_once __DIR__ . '/../assets/layout/header.php'; 
?>

<div class="container py-5">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index.php">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">الأسئلة الشائعة</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">الأسئلة الشائعة</h1>
        <p class="text-muted lead">إجابات على أكثر الأسئلة شيوعاً</p>
    </div>

    <!-- FAQ Sections -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            
            <!-- General Questions -->
            <h3 class="fw-bold mb-3">عن الموقع</h3>
            <div class="accordion mb-4" id="generalAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#general1">
                            ما هو موقع خرائط التعلم؟
                        </button>
                    </h2>
                    <div id="general1" class="accordion-collapse collapse show" data-bs-parent="#generalAccordion">
                        <div class="accordion-body">
                            خرائط التعلم هي منصة عربية تهدف إلى رسم مسارات تعليمية واضحة للمبرمجين والتقنيين العرب. نوفر خرائط شاملة لكل تخصص تقني مع أفضل المصادر التعليمية المنسقة بعناية.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#general2">
                            هل الموقع مجاني؟
                        </button>
                    </h2>
                    <div id="general2" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                        <div class="accordion-body">
                            نعم، الموقع مجاني بالكامل. يمكنك الوصول إلى جميع الخرائط التعليمية والمصادر دون أي رسوم.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#general3">
                            كيف يتم اختيار المصادر التعليمية؟
                        </button>
                    </h2>
                    <div id="general3" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                        <div class="accordion-body">
                            نختار المصادر بناءً على جودتها، تقييمات المستخدمين، وتحديثها المستمر. نركز على المصادر العربية والإنجليزية ذات السمعة الجيدة.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Learning Questions -->
            <h3 class="fw-bold mb-3 mt-5">التعلم والمسارات</h3>
            <div class="accordion mb-4" id="learningAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#learning1">
                            من أين أبدأ كمبتدئ؟
                        </button>
                    </h2>
                    <div id="learning1" class="accordion-collapse collapse" data-bs-parent="#learningAccordion">
                        <div class="accordion-body">
                            ننصح بالبدء من قسم "التخصصات" واختيار المجال الذي يثير اهتمامك. كل تخصص يحتوي على مسار تعليمي واضح يبدأ من المستوى المبتدئ.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#learning2">
                            كم من الوقت أحتاج لإتقان تخصص معين؟
                        </button>
                    </h2>
                    <div id="learning2" class="accordion-collapse collapse" data-bs-parent="#learningAccordion">
                        <div class="accordion-body">
                            يختلف الوقت حسب التخصص ومستوى التزامك. كل تخصص يحتوي على تقدير للوقت المطلوب لكل مهارة. بشكل عام، معظم التخصصات تتطلب من 3-6 أشهر من التعلم المكثف.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#learning3">
                            هل يمكنني تعلم أكثر من تخصص في نفس الوقت؟
                        </button>
                    </h2>
                    <div id="learning3" class="accordion-collapse collapse" data-bs-parent="#learningAccordion">
                        <div class="accordion-body">
                            نعم، لكن ننصح بالتركيز على تخصص واحد في البداية حتى تبني أساساً قوياً. بعد ذلك يمكنك التوسع في تخصصات أخرى.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Questions -->
            <h3 class="fw-bold mb-3 mt-5">الحساب والتتبع</h3>
            <div class="accordion mb-4" id="accountAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#account1">
                            هل أحتاج لإنشاء حساب؟
                        </button>
                    </h2>
                    <div id="account1" class="accordion-collapse collapse" data-bs-parent="#accountAccordion">
                        <div class="accordion-body">
                            يمكنك تصفح المحتوى دون حساب، لكن إنشاء حساب يتيح لك تتبع تقدمك، حفظ المصادر المفضلة، والحصول على توصيات مخصصة.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#account2">
                            كيف أتتبع تقدمي؟
                        </button>
                    </h2>
                    <div id="account2" class="accordion-collapse collapse" data-bs-parent="#accountAccordion">
                        <div class="accordion-body">
                            بعد تسجيل الدخول، يمكنك وضع علامات على المهارات التي أتقنتها والمصادر التي أكملتها. سيعرض لك الموقع نسبة تقدمك في كل تخصص.
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-5 p-4 bg-light rounded">
                <h5 class="fw-bold mb-3">لم تجد إجابة لسؤالك؟</h5>
                <p class="text-muted mb-3">تواصل معنا وسنكون سعداء بمساعدتك</p>
                <a href="/contact" class="btn btn-primary">
                    <i class="fas fa-envelope me-2"></i>تواصل معنا
                </a>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../assets/layout/footer.php'; ?>
