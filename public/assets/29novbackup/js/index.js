// $('.slider').slick({
//     autoplay: true,
//     speed: 800,
//     lazyLoad: 'progressive',
//     arrows: true,
//     dots: false,

//     prevArrow: "<i class='fa fa-chevron-left'></i>",
//     nextArrow: "<i class='fa fa-chevron-right'></i>"

// }).slickAnimation();

$('.client-slider').owlCarousel({
    loop: true,
    autoplay: true,
    nav: false,
    margin: 15,
    dots: false,
    navText: [
        "<i class='fa fa-chevron-left'></i>",
        "<i class='fa fa-chevron-right'></i>"
    ],
    responsive: {
        0: {
            items: 1,
            margin: 10,

        },
        500: {
            items: 1,
            margin: 10,

        },
        576: {
            items: 2,
        },
        768: {
            items: 2,

        },
        1200: {
            items: 4,
        },
        1600: {
            items: 5,
        },

    }
});
$('.chap-slider').owlCarousel({
    loop: true,
    autoplay: true,
    nav: false,
    margin: 15,
    dots: false,
    navText: [
        "<i class='fa fa-chevron-left'></i>",
        "<i class='fa fa-chevron-right'></i>"
    ],
    responsive: {
        0: {
            items: 1,
            margin: 10,

        },
        500: {
            items: 1,
            margin: 10,

        },
        576: {
            items: 2,
        },
        768: {
            items: 2,

        },
        1200: {
            items: 3,
        },
        1600: {
            items: 4,
        },

    }
});


// for header sticky

$(window).scroll(function() {
    var sticky = $('.header--section'),
        scroll = $(window).scrollTop();
    if (scroll >= 100) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
});
$(window).scroll(function() {
    var sticky = $('.search--course'),
        scroll = $(window).scrollTop();
    if (scroll >= 800) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
});
$(window).scroll(function() {
    var sticky = $('.calender--box'),
        scroll = $(window).scrollTop();
    if (scroll >= 100) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
});




// for active url select jquery


// $(function() {
//     $('.tab--head a').click(function() {
//         $('.tab--head .li--box').removeClass('active');
//         $(this).parent().addClass('active');
//         let currentTab = $(this).attr('href');
//         $('.tab--content--box .tab--wrapper').hide();
//         $(currentTab).show();

//         return false;
//     });
// });


// accordian 


// $('.close--icon').hide();


$(document).ready(function() {
    $(".faq--box .faq--head").click(function() {
        var id = this.id;
        $(".faq--body").each(function() {
            if ($("#" + id).next()[0].id != this.id) {
                $(this).slideUp();
            }
        });
        $(".faq--head").removeClass("active");
        $(this).addClass("active");
        $(this).next().toggle();
    });
});

$(function() {
    $('.wrapper--box.tab a').click(function() {
        $('.wrapper--box.tab .li').removeClass('active');
        $(this).parent().addClass('active');
        let currentTab = $(this).attr('href');
        $('.tab--a').hide();
        $(currentTab).show();
        return false;
    });
});


// goto top 
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('#scroll').fadeIn();
    } else {
        $('#scroll').fadeOut();
    }
});