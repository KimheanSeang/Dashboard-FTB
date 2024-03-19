$(function () {
    function addActiveClass() {
        var currentUrl = window.location.href;
        $('.nav-item, .nav-link').removeClass('active');

        $('.nav-link').each(function () {
            var linkHref = $(this).attr('href');

            if (currentUrl === linkHref) {
                $(this).addClass('active');
                $(this).closest('.nav-item').addClass('active');
                $(this).closest('.nav-item').parents('.nav-item').addClass('active');
                $(this).parents('.collapse').addClass('show');
                return false;
            }
        });
    }
    addActiveClass();

});

