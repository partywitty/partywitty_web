// for header sticky

$(window).scroll(function() {
    var sticky = $('.c-header'),
        scroll = $(window).scrollTop();
    if (scroll >= 100) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
});
// $(window).scroll(function() {
//     var sticky = $('.search--course'),
//         scroll = $(window).scrollTop();
//     if (scroll >= 800) sticky.addClass('sticky');
//     else sticky.removeClass('sticky');
// });
// $(window).scroll(function() {
//     var sticky = $('.calender--box'),
//         scroll = $(window).scrollTop();
//     if (scroll >= 100) sticky.addClass('sticky');
//     else sticky.removeClass('sticky');
// });

// drawer
$(function() {
    $('.button_menu').on('click', function() {
        $(this).toggleClass('open');
        $('.mobile--menu').toggleClass('open');
    });
});
$(function() {
    $('#mobile--menu--dropdown').on('click', function() {
        $(this).toggleClass('open');
        $('.dropdown-mobile').toggleClass('open');
    });
});
$(function() {
    $('.mobile--sidebar').on('click', function() {
        $(this).toggleClass('open');
        $('.side--nav').toggleClass('open');
    });
});
$(function() {
    $('#category_menu').on('click', function() {
        $(this).toggleClass('open');
        $('.tab--style').toggleClass('open');
    });
});








// for active url select jquery


$(function() {
    $('.nav--buttons a').click(function() {
        $('.nav--buttons li').removeClass('active');
        $(this).parent().addClass('active');
        let currentTab = $(this).attr('href');
        $('.tab--body .tab--content').hide();
        $(currentTab).show();
        return false;
    });
});
$(function() {
    $('.tab--style a').click(function() {
        $('.tab--style .head--box h5').removeClass('active');
        $(this).parent().addClass('active');
        let currentTab = $(this).attr('href');
        $('.body--box').hide();
        $(currentTab).show();
        return false;
    });
});


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


// $(function() {
//     $('.head--box a').click(function() {
//         $('.head--box .li').removeClass('active');
//         $(this).parent().addClass('active');
//         let currentTab = $(this).attr('href');
//         $('.tab--a').hide();
//         $(currentTab).show();
//         return false;
//     });
// });


// goto top 
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('#scroll').fadeIn();
    } else {
        $('#scroll').fadeOut();
    }
});