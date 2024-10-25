(function ($) {
    "use strict";

    /*****************************
     * Commons Variables
     *****************************/
    var $window = $(window),
        $body = $('body');

    /****************************
     * Sticky Menu
     *****************************/
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
        } else {
            $(".sticky-header").addClass("sticky");
        }
    });

    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".seperate-sticky-bar").removeClass("sticky");
        } else {
            $(".seperate-sticky-bar").addClass("sticky");
        }
    });

    /************************************************
     * Modal Search 
     ***********************************************/
    $('a[href="#search"]').on('click', function (event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });

    $('#search, #search button.close').on('click', function (event) {
        if (event.target.className == 'close') {
            $(this).removeClass('open');
        }
    });

    /*****************************
     * Off Canvas Function
     *****************************/
    (function () {
        var $offCanvasToggle = $('.offcanvas-toggle'),
            $offCanvas = $('.offcanvas'),
            $offCanvasOverlay = $('.offcanvas-overlay'),
            $mobileMenuToggle = $('.mobile-menu-toggle');
        $offCanvasToggle.on('click', function (e) {
            e.preventDefault();
            var $this = $(this),
                $target = $this.attr('href');
            $body.addClass('offcanvas-open');
            $($target).addClass('offcanvas-open');
            $offCanvasOverlay.fadeIn();
            if ($this.parent().hasClass('mobile-menu-toggle')) {
                $this.addClass('close');
            }
        });
        $('.offcanvas-close, .offcanvas-overlay').on('click', function (e) {
            e.preventDefault();
            $body.removeClass('offcanvas-open');
            $offCanvas.removeClass('offcanvas-open');
            $offCanvasOverlay.fadeOut();
            $mobileMenuToggle.find('a').removeClass('close');
        });
    })();


    /**************************
     * Offcanvas: Menu Content
     **************************/
    function mobileOffCanvasMenu() {
        var $offCanvasNav = $('.offcanvas-menu'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.mobile-sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<div class="offcanvas-menu-expand"></div>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, .offcanvas-menu-expand', function (e) {
            var $this = $(this);
            if ($this.attr('href') === '#' || $this.hasClass('offcanvas-menu-expand')) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                    $this.parent('li').find('li').removeClass('active');
                    $this.parent('li').find('ul:visible').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });
    }
    mobileOffCanvasMenu();

    /************************************************
     * Nice Select
     ***********************************************/
    $('select').niceSelect();


    /*************************
     *   Hero Slider Active
     **************************/
    var heroSlider = new Swiper('.hero-slider-active.swiper-container', {
        slidesPerView: 1,
        effect: "fade",
        speed: 1500,
        watchSlidesProgress: true,
        loop: true,
        autoplay: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });


    /****************************************
     *   Product Slider Active - 4 Grid 2 Rows
     *****************************************/
    var productSlider4grid2row = new Swiper('.product-default-slider-4grid-2row.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1500,
        slidesPerColumn: 2,
        slidesPerColumnFill: 'row',

        navigation: {
            nextEl: '.product-slider-default-2rows .swiper-button-next',
            prevEl: '.product-slider-default-2rows .swiper-button-prev',
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });


    /*********************************************
     *   Product Slider Active - 4 Grid Single Rows
     **********************************************/
    var productSlider4grid1row = new Swiper('.product-default-slider-4grid-1row.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1500,

        navigation: {
            nextEl: '.product-slider-default-1row .swiper-button-next',
            prevEl: '.product-slider-default-1row .swiper-button-prev',
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });

    /*********************************************
     *   Product Slider Active - 4 Grid Single 3Rows
     **********************************************/
    var productSliderListview4grid3row = new Swiper('.product-listview-slider-4grid-3rows.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1500,
        slidesPerColumn: 3,
        slidesPerColumnFill: 'row',

        navigation: {
            nextEl: '.product-list-slider-3rows .swiper-button-next',
            prevEl: '.product-list-slider-3rows .swiper-button-prev',
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });


    /*********************************************
     *   Blog Slider Active - 3 Grid Single Rows
     **********************************************/
    var blogSlider = new Swiper('.blog-slider.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        speed: 1500,

        navigation: {
            nextEl: '.blog-default-slider .swiper-button-next',
            prevEl: '.blog-default-slider .swiper-button-prev',
        },
        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        }
    });


    /*********************************************
     *   Company Logo Slider Active - 7 Grid Single Rows
     **********************************************/
    var companyLogoSlider = new Swiper('.company-logo-slider.swiper-container', {
        slidesPerView: 7,
        speed: 1500,

        navigation: {
            nextEl: '.company-logo-slider .swiper-button-next',
            prevEl: '.company-logo-slider .swiper-button-prev',
        },
        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 7,
            },
        }
    });

    /********************************
     *  Product Gallery - Horizontal View
     **********************************/
    var galleryThumbsHorizontal = new Swiper('.product-image-thumb-horizontal.swiper-container', {
        loop: true,
        speed: 1000,
        spaceBetween: 25,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    var gallerylargeHorizonatal = new Swiper('.product-large-image-horaizontal.swiper-container', {
        slidesPerView: 1,
        speed: 1500,
        thumbs: {
            swiper: galleryThumbsHorizontal
        }
    });

    /********************************
     *  Product Gallery - Vertical View
     **********************************/
    var galleryThumbsvartical = new Swiper('.product-image-thumb-vartical.swiper-container', {
        direction: 'vertical',
        centeredSlidesBounds: true,
        slidesPerView: 4,
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        spaceBetween: 25,
        freeMode: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    var gallerylargeVartical = new Swiper('.product-large-image-vartical.swiper-container', {
        slidesPerView: 1,
        speed: 1500,
        thumbs: {
            swiper: galleryThumbsvartical
        }
    });

    /********************************
     *  Product Gallery - Single Slide View
     * *********************************/
    var singleSlide = new Swiper('.product-image-single-slide.swiper-container', {
        loop: true,
        speed: 1000,
        spaceBetween: 25,
        slidesPerView: 4,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 4,
            },
        }

    });

    /******************************************************
     * Quickview Product Gallery - Horizontal
     ******************************************************/
    var modalGalleryThumbs = new Swiper('.modal-product-image-thumb', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var modalGalleryTop = new Swiper('.modal-product-image-large', {
        thumbs: {
            swiper: modalGalleryThumbs
        }
    });

    /********************************
     * Blog List Slider - Single Slide
     * *********************************/
    var blogListSLider = new Swiper('.blog-list-slider.swiper-container', {
        loop: true,
        speed: 1000,
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    /********************************
     *  Product Gallery - Image Zoom
     **********************************/
    $('.zoom-image-hover').zoom();


    /************************************************
     * Price Slider
     ***********************************************/
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));



    /************************************************
     * Animate on Scroll
     ***********************************************/
    AOS.init({

        duration: 1000,
        once: true,
        easing: 'ease',
    });
    window.addEventListener('load', AOS.refresh);

    /************************************************
     * Video  Popup
     ***********************************************/
    $('.video-play-btn').venobox();

    /************************************************
     * Scroll Top
     ***********************************************/
    $('body').materialScrollTop();


})(jQuery);

function showColor(size) {

    jQuery('#size_id').val(size);

    jQuery('.product_color').hide();

    jQuery('.size_' + size).show();

    jQuery('.size_link').css('border', '1px solid #ddd');

    jQuery('#size_' + size).css('border', '1px solid black');
}

function change_product_color_image(img, color) {
    jQuery('#color_id').val(color);
    jQuery('.simpleLens-big-image-container').html('<a class="product-image-large-image swiper-slide zoom-image-hover img-responsive"><img src="' + img + '" ></a>');
}
function home_add_to_cart(id, size_str_id, color_str_id) {
    jQuery('#color_id').val(color_str_id);

    jQuery('#size_id').val(size_str_id);

    add_to_cart(id, size_str_id, color_str_id);


}

function add_to_cart(id, size_str_id, color_str_id) {

    jQuery('#add_to_cart_msg').html('');
    var color_id = jQuery('#color_id').val();
    var size_id = jQuery('#size_id').val();

    if (size_str_id == 0) {
        size_id = 'no';
    }
    if (color_str_id == 0) {
        color_id = 'no';
    }
    if (size_id == '' && size_id != 'no') {
        jQuery('#add_to_cart_msg').html(`
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>  Please select a size</strong> 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
    } else if (color_id == '' && color_id != 'no') {
        jQuery('#add_to_cart_msg').html(`
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>  Please select a color</strong> 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
    }
    else {
        // alert('Thaks');
        jQuery('#product_id').val(id);
        jQuery('#pqty').val(jQuery('#qty').val());
        jQuery.ajax({
            url: '/add_to_cart',
            data: jQuery('#frmAddToCart').serialize(),
            type: 'post',
            success: function (result) {
                // alert('Product' + result.msg);
                var totalPrice = 0;

                if (result.msg == 'not_avaliable') {
                    alert(result.data);
                } else {
                    alert("Product " + result.msg);
                    if (result.totalItem == 0) {
                        jQuery('.aa-cart-notify').html('0');
                        jQuery('.aa-cartbox-summary').remove();
                    } else {

                        jQuery('.aa-cart-notify').html(result.totalItem);
                        var html = '<ul>';
                        jQuery.each(result.data, function (arrKey, arrVal) {
                            totalPrice = parseInt(totalPrice) + (parseInt(arrVal.qty) * parseInt(arrVal.price));
                            html += '<li><a class="aa-cartbox-img" href="#"><img src="' + PRODUCT_IMAGE + '/' + arrVal.image + '" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">' + arrVal.name + '</a></h4><p> ' + arrVal.qty + ' * Rs  ' + arrVal.price + '</p></div></li>';
                        });

                    }
                    html += '<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">Rs ' + totalPrice + '</span></li>';
                    html += '</ul><a class="aa-cartbox-checkout aa-primary-btn" href="cart">Cart</a>';
                    console.log(html);
                    jQuery('.aa-cartbox-summary').html(html);
                }
            }
        });
    }
}

function deleteCartProduct(pid, size, color, attr_id) {
    jQuery('#color_id').val(color);
    jQuery('#size_id').val(size);
    jQuery('#qty').val(0)
    add_to_cart(pid, size, color);
    //jQuery('#total_price_'+attr_id).html('Rs '+qty*price);
    jQuery('#cart_box' + attr_id).hide();
}

function updateQty(pid, size, color, attr_id, price) {
    jQuery('#color_id').val(color);
    jQuery('#size_id').val(size);
    var qty = jQuery('#qty' + attr_id).val();
    jQuery('#qty').val(qty)
    add_to_cart(pid, size, color);
    jQuery('#total_price_' + attr_id).html('Rs ' + qty * price);
}

function applyCouponCode() {
    jQuery('#coupon_code_msg').html('');
    jQuery('#order_place_msg').html('');
    var coupon_code = jQuery('#coupon_code').val();
    if (coupon_code != '') {
        jQuery.ajax({
            type: 'post',
            url: '/apply_coupon_code',
            data: 'coupon_code=' + coupon_code + '&_token=' + jQuery("[name='_token']").val(),
            success: function (result) {
                console.log(result.status);
                if (result.status == 'success') {
                    jQuery('.show_coupon_box').removeClass('hide');
                    jQuery('#coupon_code_str').html(coupon_code);
                    jQuery('#total_price').html('INR ' + result.totalPrice);
                    jQuery('.apply_coupon_code_box').hide();
                } else {

                }
                jQuery('#coupon_code_msg').html(result.msg);
            }
        });
    } else {
        jQuery('#coupon_code_msg').html('Please enter coupon code');
    }
}
