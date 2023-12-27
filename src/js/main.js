$(document).ready(function () {
    $('.header__menu-category-link').click(function() {
        $('.header__menu-primary').removeClass('open-primary');
        $('.header__menu-category').toggleClass('open-category');
    });

    $('.header__menu-button').click(function() {
        $('.header__menu-category').removeClass('open-category');
        $('.header__menu-primary').addClass('open-primary');
    });

    $('.header__category-close').click(function() {
        $('.header__menu-category').removeClass('open-category');
    });

    $('.header__primary-close').click(function() {
        $('.header__menu-primary').removeClass('open-primary');

    });

     	/* ---------------------------------------------------
		Back to Top
	-------------------------------------------------- */
    $(".footer__back").addClass("hidden-top");
    $(window).scroll(function () {
    if ($(this).scrollTop() === 0) {
        $(".footer__back").addClass("hidden-top")
    } else {
        $(".footer__back").removeClass("hidden-top")
    }
});

$('.footer__back').on("click", function () {
    $('body,html').animate({scrollTop:0}, 1200);
    return false;
});

$('.sidebar__sub-category a').click(function() {
    $('.sidebar__sub-menu').toggleClass('open-sidebar-category');

});

$('.header__minicart-link').click(function() {
    $('.woocommerce-mini-cart').toggleClass('open-minicart');

});

 });

