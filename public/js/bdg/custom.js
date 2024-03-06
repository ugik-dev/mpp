/*
 *
 *		CUSTOM.JS
 *
 */

(function ($) {
    "use strict";

    // DETECT TOUCH DEVICE //
    function is_touch_device() {
        return (
            !!("ontouchstart" in window) ||
            (!!("onmsgesturechange" in window) &&
                !!window.navigator.maxTouchPoints)
        );
    }

    // SHOW/HIDE MOBILE MENU //
    function show_hide_mobile_menu() {
        $("#mobile-menu-button").on("click", function (e) {
            e.preventDefault();

            $("#mobile-menu").slideToggle(300);
        });
    }

    // MOBILE MENU //
    function mobile_menu() {
        if ($(window).width() < 992) {
            if ($("#menu").length > 0) {
                if ($("#mobile-menu").length < 1) {
                    $("#menu")
                        .clone()
                        .attr({
                            id: "mobile-menu",
                            class: "",
                        })
                        .insertAfter("#header");

                    $("#mobile-menu .megamenu > a").on("click", function (e) {
                        e.preventDefault();

                        $(this)
                            .toggleClass("open")
                            .next("div")
                            .slideToggle(300);
                    });

                    $("#mobile-menu .dropdown > a").on("click", function (e) {
                        e.preventDefault();

                        $(this).toggleClass("open").next("ul").slideToggle(300);
                    });
                }
            }
        } else {
            $("#mobile-menu").hide();
        }
    }

    // HEADER SEARCH //
    function header_search() {
        $(".search a").on("click", function (e) {
            e.preventDefault();

            if (!$(".search a").hasClass("open")) {
                $("#search-form-container").slideDown(300).delay(500);
            } else {
                $("#search-form-container").slideUp(300);
            }

            $(window).resize(function () {
                $("#search-form-container").slideUp(300);
            });
        });

        $("#search-form").after('<a class="search-form-close" href="#">x</a>');

        $("#search-form-container a.search-form-close").on(
            "click",
            function (event) {
                event.preventDefault();
                $("#search-form-container").slideUp(300);
            }
        );

        $(window).scroll(function () {
            $("#search-form-container").slideUp(300);
        });
    }

    // STICKY //
    function sticky() {
        var sticky_point = 149;

        $("#header")
            .clone()
            .attr({
                id: "header-sticky",
                class: "",
            })
            .insertAfter("header");

        $(window).scroll(function () {
            if ($(window).scrollTop() > sticky_point) {
                $("#header-sticky").slideDown(300).addClass("header-sticky");
                $("#header .menu ul, #header .menu .megamenu-container").css({
                    visibility: "hidden",
                });
            } else {
                $("#header-sticky").slideUp(100).removeClass("header-sticky");
                $("#header .menu ul, #header .menu .megamenu-container").css({
                    visibility: "visible",
                });
            }
        });

        $("#header-sticky .search a").on("click", function (e) {
            e.preventDefault();

            if (!$("#header-sticky .search a").hasClass("open")) {
                $("#header-sticky #search-form-container")
                    .slideDown(300)
                    .delay(500);
            } else {
                $("#header-sticky #search-form-container").slideUp(300);
            }

            $(window).resize(function () {
                $("#header-sticky #search-form-container").slideUp(300);
            });
        });

        $("#header-sticky #search-form").after(
            '<a class="search-form-close" href="#">x</a>'
        );

        $("#header-sticky #search-form-container a.search-form-close").on(
            "click",
            function (event) {
                event.preventDefault();
                $("#header-sticky #search-form-container").slideUp(300);
            }
        );

        $(window).scroll(function () {
            $("#header-sticky #search-form-container").slideUp(300);
        });
    }

    // PROGRESS BARS //
    function progress_bars() {
        $(".progress .progress-bar:in-viewport").each(function () {
            if (!$(this).hasClass("animated")) {
                $(this).addClass("animated");
                $(this).animate(
                    {
                        width: $(this).attr("data-width") + "%",
                    },
                    2000
                );
            }
        });
    }

    // CHARTS //
    function pie_chart() {
        if (typeof $.fn.easyPieChart !== "undefined") {
            $(".pie-chart:in-viewport").each(function () {
                $(this).easyPieChart({
                    animate: 1500,
                    lineCap: "square",
                    lineWidth: $(this).attr("data-line-width"),
                    size: $(this).attr("data-size"),
                    barColor: $(this).attr("data-bar-color"),
                    trackColor: $(this).attr("data-track-color"),
                    scaleColor: "transparent",
                    onStep: function (from, to, percent) {
                        $(this.el)
                            .find(".pie-chart-details .value")
                            .text(Math.round(percent));
                    },
                });
            });
        }
    }

    // COUNTER //
    function counter() {
        if (typeof $.fn.jQuerySimpleCounter !== "undefined") {
            $(".counter .counter-value:in-viewport").each(function () {
                if (!$(this).hasClass("animated")) {
                    $(this).addClass("animated");
                    $(this).jQuerySimpleCounter({
                        start: 0,
                        end: $(this).attr("data-value"),
                        duration: 2000,
                    });
                }
            });
        }
    }

    // LOAD MORE PROJECTS //
    function load_more_projects() {
        var number_clicks = 0;

        $(".load-more").on("click", function (e) {
            e.preventDefault();

            if (number_clicks == 0) {
                $.ajax({
                    type: "POST",
                    url: $(".load-more").attr("href"),
                    dataType: "html",
                    cache: false,
                    msg: "",
                    success: function (msg) {
                        $(".isotope").append(msg);
                        $(".isotope").imagesLoaded(function () {
                            $(".isotope").isotope("reloadItems").isotope();
                            $(".fancybox").fancybox({
                                prevEffect: "none",
                                nextEffect: "none",
                            });
                        });
                        number_clicks++;
                        $(".load-more").html("Nothing to load");
                    },
                });
            }
        });
    }

    // SHOW/HIDE SCROLL UP //
    function show_hide_scroll_top() {
        if ($(window).scrollTop() > $(window).height() / 2) {
            $("#scroll-up").fadeIn(300);
        } else {
            $("#scroll-up").fadeOut(300);
        }
    }

    // SCROLL UP //
    function scroll_up() {
        $("#scroll-up").on("click", function () {
            $("html, body").animate(
                {
                    scrollTop: 0,
                },
                800
            );
            return false;
        });
    }

    // SOCIAL MEDIA //
    function social_media() {
        $(".social-media-toggle").on("click", function (e) {
            e.preventDefault();
            $(this)
                .toggleClass("opened")
                .next(".social-media")
                .stop()
                .slideToggle(300);
        });
    }

    // LOCATION DETAILS //
    function location_details() {
        $(".location-details").prepend(
            '<a class="close-location-details" href="#">x</a>'
        );

        $(".close-location-details").on("click", function (e) {
            e.preventDefault();
            $(".location-details").fadeOut(500);
        });
    }

    // INSTAGRAM FEED //
    function instagram_feed() {
        if ($("#instafeed").length > 0) {
            var nr = $("#instafeed").data("number"),
                userid = $("#instafeed").data("user"),
                accesstoken = $("#instafeed").data("accesstoken");

            var feed = new Instafeed({
                target: "instafeed",
                get: "user",
                userId: userid,
                accessToken: accesstoken,
                limit: nr,
                resolution: "thumbnail",
                sortBy: "most-recent",
            });

            feed.run();
        }
    }

    // DRAG SLIDER //
    function drag_slider() {
        var availHeight =
            $(".content-body").outerHeight() - $(".content-mask").outerHeight();

        // new Dragdealer("content-scroller", {
        //     horizontal: false,
        //     vertical: true,
        //     yPrecision: availHeight,
        //     animationCallback: function (x, y) {
        //         $(".content-body").css("margin-top", -y * availHeight);
        //     },
        // });
    }

    // EQUAL HEIGHT //
    function equal_height() {
        $(".text-box").each(function () {
            if ($(window).width() > 991) {
                $(".text-box").css(
                    "height",
                    $(".text-boxes-container").height() + "px"
                );
            } else {
                $(".text-box").css("height", "auto");
            }
        });
    }

    // FULL SCREEN //
    function full_screen() {
        if ($(window).width() > 767) {
            $(".full-screen").css("height", $(window).height() + "px");
        } else {
            $(".full-screen").css("height", "auto");
        }
    }

    // ANIMATIONS //
    function animations() {
        // animations = new WOW({
        //     boxClass: "wow",
        //     animateClass: "animated",
        //     offset: 100,
        //     mobile: false,
        //     live: true,
        // });
        // animations.init();
    }

    // DOCUMENT READY //
    $(document).ready(function () {
        // STICKY //
        sticky();

        // MENU //
        if (typeof $.fn.superfish !== "undefined") {
            $(".menu").superfish({
                delay: 500,
                animation: {
                    opacity: "show",
                    height: "show",
                },
                speed: "fast",
                autoArrows: true,
            });
        }

        // SHOW/HIDE MOBILE MENU //
        show_hide_mobile_menu();

        // MOBILE MENU //
        mobile_menu();

        // HEADER SEARCH //
        header_search();

        // FANCYBOX //
        if (typeof $.fn.fancybox !== "undefined") {
            $(".fancybox").fancybox({
                prevEffect: "none",
                nextEffect: "none",
            });
        }

        // REVOLUTION SLIDER //
        if (typeof $.fn.revolution !== "undefined") {
            $(".rev_slider").revolution({
                sliderType: "standard",
                sliderLayout: "auto",
                delay: 9000,
                navigation: {
                    arrows: {
                        style: "custom",
                        enable: true,
                        hide_onmobile: true,
                        hide_onleave: false,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        hide_under: 0,
                        hide_over: 9999,
                        tmp: "",
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 50,
                            v_offset: 0,
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 50,
                            v_offset: 0,
                        },
                    },
                    bullets: {
                        style: "custom",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        hide_under: 0,
                        hide_over: 9999,
                        tmp: "",
                        direction: "horizontal",
                        space: 8,
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 80,
                    },
                    touch: {
                        touchenabled: "on",
                        swipe_treshold: 75,
                        swipe_min_touches: 1,
                        drag_block_vertical: false,
                        swipe_direction: "horizontal",
                    },
                },
                parallax: {
                    type: "mouse",
                    levels: [
                        5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70,
                        75, 80, 85,
                    ],
                    origo: "enterpoint",
                    speed: 400,
                    bgparallax: "false",
                    disable_onmobile: "off",
                },
                gridwidth: 1170,
                gridheight: 715,
            });

            $(".rev_slider_parallax").revolution({
                sliderType: "standard",
                sliderLayout: "auto",
                delay: 9000,
                navigation: {
                    arrows: {
                        enable: false,
                    },
                    bullets: {
                        enable: false,
                    },
                },
                parallax: {
                    type: "mouse",
                    levels: [
                        5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70,
                        75, 80, 85,
                    ],
                    origo: "enterpoint",
                    speed: 400,
                    bgparallax: "false",
                    disable_onmobile: "off",
                },
                gridwidth: 1170,
                gridheight: 715,
            });
        }

        // OWL Carousel //
        if (typeof $.fn.owlCarousel !== "undefined") {
            /* IMAGES SLIDER */
            $(".owl-carousel.images-slider").owlCarousel({
                singleItem: true,
                slideSpeed: 200,
                autoPlay: true,
                stopOnHover: true,
                navigation: false,
                navigationText: false,
                pagination: true,
                paginationNumbers: false,
                mouseDrag: true,
                touchDrag: true,
                transitionStyle: "fade",
            });

            $(".owl-carousel.images-slider-2").owlCarousel({
                singleItem: true,
                slideSpeed: 500,
                autoPlay: true,
                stopOnHover: true,
                navigation: true,
                navigationText: false,
                pagination: false,
                paginationNumbers: false,
                mouseDrag: true,
                touchDrag: true,
                transitionStyle: false,
            });

            /* TESTIMONIALS SLIDER */
            $(".owl-carousel.testimonials-slider").owlCarousel({
                singleItem: true,
                slideSpeed: 200,
                autoPlay: true,
                stopOnHover: true,
                navigation: true,
                navigationText: false,
                pagination: false,
                paginationNumbers: false,
                mouseDrag: true,
                touchDrag: true,
                transitionStyle: "fade",
            });

            /* LOGOS SLIDER */
            $(".owl-carousel.logos-slider").owlCarousel({
                items: 5,
                itemsDesktop: [1199, 5],
                itemsDesktopSmall: [991, 4],
                itemsTablet: [767, 2],
                itemsMobile: [479, 1],
                slideSpeed: 500,
                autoPlay: true,
                stopOnHover: true,
                navigation: true,
                navigationText: false,
                pagination: false,
                paginationNumbers: false,
                mouseDrag: true,
                touchDrag: true,
                transitionStyle: false,
            });
        }

        // GOOGLE MAPS //
        if (typeof $.fn.gmap3 !== "undefined") {
            $(".map").each(function () {
                var data_zoom = 15;

                if ($(this).attr("data-zoom") !== undefined) {
                    data_zoom = parseInt($(this).attr("data-zoom"), 10);
                }

                $(this).gmap3({
                    marker: {
                        values: [
                            {
                                address: $(this).attr("data-address"),
                            },
                        ],
                        options: {
                            draggable: false,
                        },
                    },
                    map: {
                        options: {
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            zoom: data_zoom,
                            scrollwheel: false,
                        },
                    },
                });
            });
        }

        // ISOTOPE //
        if (
            typeof $.fn.imagesLoaded !== "undefined" &&
            typeof $.fn.isotope !== "undefined"
        ) {
            $(".isotope").imagesLoaded(function () {
                var container = $(".isotope");

                container.isotope({
                    itemSelector: ".isotope-item",
                    layoutMode: "masonry",
                    transitionDuration: "0.8s",
                });

                $(".filter li a").on("click", function () {
                    $(".filter li a").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    container.isotope({
                        filter: selector,
                    });

                    return false;
                });

                $(window).resize(function () {
                    container.isotope();
                });

                $(".isotope.masonry").imagesLoaded(function () {
                    var container_masonry = $(".isotope.masonry");

                    container_masonry.isotope({
                        itemSelector: ".isotope-item",
                        layoutMode: "masonry",
                        masonry: {
                            columnWidth: 1,
                            gutter: 1,
                        },
                        transitionDuration: "0.8s",
                    });

                    $(".filter li a").on("click", function () {
                        $(".filter li a").removeClass("active");
                        $(this).addClass("active");

                        var selector = $(this).attr("data-filter");
                        container_masonry.isotope({
                            filter: selector,
                        });

                        return false;
                    });

                    $(window).resize(function () {
                        container_masonry.isotope();
                    });
                });
            });
        }

        // LOAD MORE PORTFOLIO ITEMS //
        load_more_projects();

        // PLACEHOLDER //
        if (typeof $.fn.placeholder !== "undefined") {
            $("input, textarea").placeholder();
        }

        // CONTACT FORM VALIDATE & SUBMIT //
        // VALIDATE //
        if (typeof $.fn.validate !== "undefined") {
            $("#contact-form").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    subject: {
                        required: true,
                    },
                    message: {
                        required: true,
                        minlength: 10,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter your name!",
                    },
                    email: {
                        required: "Please enter your email!",
                        email: "Please enter a valid email address",
                    },
                    subject: {
                        required: "Please enter the subject!",
                    },
                    message: {
                        required: "Please enter your message!",
                    },
                },

                // SUBMIT //
                submitHandler: function (form) {
                    var result;
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "assets/php/send.php",
                        success: function (msg) {
                            if (msg == "OK") {
                                result =
                                    '<div class="alert alert-success">Your message was successfully sent!</div>';
                                $("#contact-form").clearForm();
                            } else {
                                result = msg;
                            }

                            $("#alert-area").html(result);
                        },
                        error: function () {
                            result =
                                '<div class="alert alert-danger">There was an error sending the message!</div>';
                            $("#alert-area").html(result);
                        },
                    });
                },
            });
        }

        // PARALLX //
        if (typeof $.fn.stellar !== "undefined") {
            if (!is_touch_device()) {
                $(window).stellar({
                    horizontalScrolling: false,
                    verticalScrolling: true,
                    responsive: true,
                });
            }
        }

        // SHOW/HIDE SCROLL UP
        show_hide_scroll_top();

        // SCROLL UP //
        scroll_up();

        // YOUTUBE PLAYER //
        if (typeof $.fn.mb_YTPlayer !== "undefined") {
            $(".youtube-player").mb_YTPlayer();
        }

        // SOCIAL MEDIA //
        social_media();

        // LOCATION DETAILS //
        location_details();

        // INSTAGRAM FEED //
        instagram_feed();

        // DRAG SLIDER //
        drag_slider();

        // EQUAL HEIGHT //
        equal_height();

        // FULL SCREEN //
        full_screen();

        // ANIMATIONS //
        animations();

        // COUNTDOWN //
        if (typeof $.fn.countdown !== "undefined") {
            $(".countdown").countdown("2016/05/01 07:00", function (event) {
                $(this).html(
                    event.strftime(
                        '<div><div class="counter">%-D</div> <span>Days</span></div>' +
                            '<div><div class="counter">%-H</div> <span>Hours</span></div>' +
                            '<div><div class="counter">%-M</div> <span>Minutes</span></div>' +
                            '<div><div class="counter">%S</div> <span>Seconds</span></div>'
                    )
                );
            });
        }
    });

    // WINDOW SCROLL //
    $(window).scroll(function () {
        progress_bars();
        pie_chart();
        counter();
        show_hide_scroll_top();
    });

    // WINDOW RESIZE //
    $(window).resize(function () {
        mobile_menu();
        equal_height();
        full_screen();
    });
})(window.jQuery);
