// homehome page main carousel
var owl = $('.slide-carousel');
owl.owlCarousel({
    items: 1,
    nav: true,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true
});

// homehome page baner carousel
var owl = $('.home-main-carousel');
owl.owlCarousel({
    items: 2,
    nav: true,
    loop: true,
    margin: 5,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true
});

$('.play').on('click', function () {
    owl.trigger('play.owl.autoplay', [5000])
})
$('.stop').on('click', function () {
    owl.trigger('stop.owl.autoplay')
})

// homehome page product carousel

var owl_product = $('.product-carousel');
owl_product.owlCarousel({
    items: 6,
    nav: false,
    loop: true,
    dote: false,
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,
            nav: true
        },
        400: {
            items: 2,
            nav: false
        },
        575: {
            items: 3,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        767: {
            items: 4,
            nav: false
        },
        991: {
            items: 4,
            nav: false
        },
        1000: {
            items: 5,
            nav: true,
            loop: false
        }
    }
});

// Category page subcategory image slider

var owl_product = $('.categoryImage-slider');
owl_product.owlCarousel({
    items: 10,
    nav: true,
    loop: true,
    dote: false,
    autoplay: true,
    margin: 5,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 3,
            nav: true
        },
        400: {
            items: 3,
            nav: false
        },
        575: {
            items: 3,
            nav: false
        },
        600: {
            items: 4,
            nav: false
        },
        767: {
            items: 5,
            nav: false
        },
        991: {
            items: 5,
            nav: false
        },
        1000: {
            items: 8,
            nav: true,
            loop: false
        },
        1200: {
            items: 10,
            nav: true,
            loop: false
        }
    }
});

var owl_product = $('.product-cashon-delevary');
owl_product.owlCarousel({
    items: 8,
    nav: true,
    loop: true,
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 3,
            nav: true
        },
        400: {
            items: 3,
            nav: false
        },
        575: {
            items: 3,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        767: {
            items: 4,
            nav: false
        },
        991: {
            items: 5,
            nav: false
        },
        1000: {
            items: 8,
            nav: true,
            loop: false
        }
    }
});

var owl_product = $('.product-hot-deals');
owl_product.owlCarousel({
    items: 8,
    nav: true,
    loop: true,
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        400: {
            items: 1,
            nav: false
        },
        575: {
            items: 2,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        767: {
            items: 4,
            nav: false
        },
        991: {
            items: 5,
            nav: false
        },
        1000: {
            items: 4,
            nav: true,
            loop: false
        }
    }
});

var owl_product = $('.related-product-carousel');
owl_product.owlCarousel({
    items: 6,
    nav: true,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        400: {
            items: 2,
            nav: false
        },
        575: {
            items: 3,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        767: {
            items: 3,
            nav: false
        },
        991: {
            items: 6,
            nav: false
        },
        1000: {
            items: 6,
            nav: true,
            loop: false
        }
    }
});
// homehome page category carousel
var owl_home_category = $('.home-category-carousel');
owl_home_category.owlCarousel({
    items: 8,
    nav: true,
    loop: true,
    margin: 5,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 2,
            nav: true
        },
        400: {
            items: 3,
            nav: false
        },
        575: {
            items: 4,
            nav: false
        },
        600: {
            items: 5,
            nav: false
        },
        767: {
            items: 6,
            nav: false
        },
        991: {
            items: 7,
            nav: false
        },
        1000: {
            items: 8,
            nav: true,
            loop: false
        }
    }
});

var owl_product = $('.compaign_slider');
owl_product.owlCarousel({
    items: 1,
    nav: true,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true
});
var owl_product = $('.baner_carosel');
owl_product.owlCarousel({
    items: 2,
    nav: true,
    loop: true,
    margin: 0,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true
});
$('.play').on('click', function () {
    owl.trigger('play.owl.autoplay', [5000])
})
$('.stop').on('click', function () {
    owl.trigger('stop.owl.autoplay')
})

document.addEventListener("livewire:load", function (event) {

    // cart item query 
    $(document).ready(function () {
        $(".cart_items_event").click(function () {
            $("#cart_widgate").removeClass("visibility-hidden");
            $("#cart_wraper_visible").addClass("cart_wraper_visible");
        });

    });

    $("#dimisable_cart_widgate").click(function () {
        $("#cart_wraper_visible").removeClass("cart_wraper_visible");
        $("#cart_widgate").addClass("visibility-hidden");
    });
    $(".content_opacity").click(function () {
        $("#cart_wraper_visible").removeClass("cart_wraper_visible");
        $("#cart_widgate").addClass("visibility-hidden");
    });


    // user info query 
    $(document).ready(function () {
        $(".userInfo_event").click(function () {
            $("#user_info_widgate").removeClass("visibility-hidden").animate({ transition: '.8s', });
            $("#user_info_wraper_visible").addClass("cart_wraper_visible").animate({ transition: '.8s', });
        });

    });

    $("#dimisable_cart_widgate").click(function () {
        $("#user_info_widgate").addClass("visibility-hidden");
        $("#user_info_wraper_visible").removeClass("cart_wraper_visible").animate({ transition: '.8s', });
    });

    $(".content_opacity").click(function () {
        $("#user_info_widgate").addClass("visibility-hidden");
        $("#user_info_wraper_visible").removeClass("cart_wraper_visible").animate({ transition: '.8s', });
    });
    $("#dimisable_user_info_widgate").click(function () {
        $("#user_info_widgate").addClass("visibility-hidden");
        $("#user_info_wraper_visible").removeClass("cart_wraper_visible").animate({ transition: '.8s', });
    });
});
