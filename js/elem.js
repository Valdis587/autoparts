jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/slider.default', function ($scope, $) {
    "use strict";
    // Content slider
    $('#home-slider').each(function () {
        var $slider = $(this),
            $panels = $slider.children('div'),
            data = $slider.data();
        // Remove unwanted br's
        //$slider.children(':not(.yt-content-slide)').remove();
        // Apply Owl Carousel

        $slider.owlCarousel2({
            responsiveClass: true,
            mouseDrag: true,
            video: true,
            lazyLoad: (data.lazyload == 'yes') ? true : false,
            autoplay: (data.autoplay == 'yes') ? true : false,
            autoHeight: (data.autoheight == 'yes') ? true : false,
            autoplayTimeout: data.delay * 1000,
            smartSpeed: data.speed * 1000,
            autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
            center: (data.center == 'yes') ? true : false,
            loop: (data.loop == 'yes') ? true : false,
            dots: (data.pagination == 'yes') ? true : false,
            nav: (data.arrows == 'yes') ? true : false,
            dotClass: "owl2-dot",
            dotsClass: "owl2-dots",
            margin: data.margin,
            navText: ['',''],

            responsive: {
                0: {
                    items: data.items_column4
                },
                480: {
                    items: data.items_column3
                },
                768: {
                    items: data.items_column2
                },
                992: {
                    items: data.items_column1
                },
                1200: {
                    items: data.items_column0
                },
                1650: {
                    items: data.items_column00
                }
            }
        });

    });
    });
});


jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/prodcatslider.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#prodcat').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});


jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/newprod.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#newprod').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/hitprod.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#hitprod').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/saleprod.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#saleprod').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/ratingprod.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#ratingprod').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/featured.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#featured').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/catcarusel.default', function ($scope, $) {
        var slidercate = $(".slider-cates .cat-wrap");
        slidercate.owlCarousel2({
            margin:30,
            nav:true,
            loop:false,
            dots: false,
            navText: ['',''],
            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:2
                },
                768:{
                    items:4
                },
                992:{
                    items:4
                },
                1200:{
                    items:5
                },
            },
        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/testi.default', function ($scope, $) {
        $('.client-main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            //rtl: true,
            prevArrow: '<div class="slick-prev" aria-label="Previous"><span>Previous</span></div>',
            nextArrow: '<div class="slick-next" aria-label="Next"><span>Next</span></div>',
            asNavFor: '.client-image'
        });

        $('.client-image').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.client-main',
            dots: false,
            arrows: false,
            //rtl: true,
            centerMode: true,
            centerPadding: 0,
            focusOnSelect: true,

            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 560,
                    settings: {
                        slidesToShow: 3,
                    }
                }
            ]
        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/news.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#news').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/logo.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#logo').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});

jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/action.default', function ($scope, $) {
        "use strict";
        // Content slider
        $('#action').each(function () {
            var $slider = $(this),
                $panels = $slider.children('div'),
                data = $slider.data();
            // Remove unwanted br's
            //$slider.children(':not(.yt-content-slide)').remove();
            // Apply Owl Carousel

            $slider.owlCarousel2({
                responsiveClass: true,
                mouseDrag: true,
                video: true,
                lazyLoad: (data.lazyload == 'yes') ? true : false,
                autoplay: (data.autoplay == 'yes') ? true : false,
                autoHeight: (data.autoheight == 'yes') ? true : false,
                autoplayTimeout: data.delay * 1000,
                smartSpeed: data.speed * 1000,
                autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                center: (data.center == 'yes') ? true : false,
                loop: (data.loop == 'yes') ? true : false,
                dots: (data.pagination == 'yes') ? true : false,
                nav: (data.arrows == 'yes') ? true : false,
                dotClass: "owl2-dot",
                dotsClass: "owl2-dots",
                margin: data.margin,
                navText: ['',''],

                responsive: {
                    0: {
                        items: data.items_column4
                    },
                    480: {
                        items: data.items_column3
                    },
                    768: {
                        items: data.items_column2
                    },
                    992: {
                        items: data.items_column1
                    },
                    1200: {
                        items: data.items_column0
                    },
                    1650: {
                        items: data.items_column00
                    }
                }
            });

        });
    });
});


jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/faq.default', function ($scope, $) {
        $("ul.yt-accordion li").each(function() {
            if($(this).index() > 0) {
                $(this).children(".accordion-inner").css('display', 'none');
            }
            else {
                $(this).find(".accordion-heading").addClass('active');
            }

            var ua = navigator.userAgent,
                event = (ua.match(/iPad/i)) ? "touchstart" : "click";
            $(this).children(".accordion-heading").bind(event, function() {
                $(this).addClass(function() {
                    if($(this).hasClass("active")) return "";
                    return "active";
                });

                $(this).siblings(".accordion-inner").slideDown(350);
                $(this).parent().siblings("li").children(".accordion-inner").slideUp(350);
                $(this).parent().siblings("li").find(".active").removeClass("active");
            });
        });
    });
});


jQuery(window).on('elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction('frontend/element_ready/sliderrev.default', function ($scope, $) {
        $(function() {
            // Slider Revolution
            jQuery('#slider-rev').revolution({
                delay:8000,
                startwidth:1140,
                startheight:600,
                onHoverStop:"true",
                hideThumbs:250,
                navigationHAlign:"center",
                navigationVAlign:"bottom",
                navigationHOffset:0,
                navigationVOffset:20,
                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:0,
                soloArrowLeftVOffset:0,
                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:0,
                soloArrowRightVOffset:0,
                touchenabled:"on",
                stopAtSlide:-1,
                stopAfterLoops:-1,
                dottedOverlay:"none",
                fullWidth:"on",
                spinned:"spinner5",
                shadow:0,
                hideTimerBar: "on",
                // navigationStyle:"preview4"
            });

        });
    });
});