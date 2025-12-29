$(document).ready(function() {
    // تفعيل التلميحات (Tooltips) من Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // تأثيرات التمرير السلس
    $('a.nav-link').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 70
            }, 800);
        }
    });

    // مثال لطلب AJAX (يمكن استخدامه لاحقاً في تصفية المصادر)
    function loadResources(skillId) {
        $.ajax({
            url: '/api/resources.php',
            type: 'GET',
            data: { skill_id: skillId },
            beforeSend: function() {
                $('#resources-container').html('<div class="text-center"><div class="spinner-border text-primary" role="status"></div></div>');
            },
            success: function(response) {
                $('#resources-container').html(response);
            },
            error: function() {
                alert('حدث خطأ أثناء تحميل المصادر');
            }
        });
    }

    // تنبيهات مخصصة
    window.showAlert = function(message, type = 'success') {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3" role="alert" style="z-index: 1050;">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        $('body').append(alertHtml);
        setTimeout(() => {
            $('.alert').alert('close');
        }, 3000);
    };
});
