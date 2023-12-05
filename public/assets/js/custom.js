/*var wid = $(window).width(),
hei = $(window).height();
alert("width:" + wid +"px and height: " + hei + "px.")
*/

$(document).ready(function () {
    /*function bannerheight(){
        var head_height = $("header").outerHeight(true);
        $("body").css("padding-top",head_height + "px")
        $(".banner-sec").css("min-height","calc(100vh - " + head_height + "px)")
    };
    bannerheight();
    $(window).resize(bannerheight);*/

    // $('.navbar-toggler').click(function () {
    //     $('html').toggleClass('show-menu');
    // });

    // function scrolling() {
    //     var sticky = $('header'),
    //         scroll = $(window).scrollTop();

    //     if (scroll >= 15) sticky.addClass('fixed');
    //     else sticky.removeClass('fixed');
    // }
    // scrolling();
    // $(window).scroll(scrolling);

    // hide #back-top first
    $('#myBtn').hide();

    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#myBtn').fadeIn();
            } else {
                $('#myBtn').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#myBtn').click(function () {
            $('body,html').animate(
                {
                    scrollTop: 0,
                },
                1000
            );
            return false;
        });
    });
});
// $('#home-carousel').owlCarousel({
//     loop: true,
//     nav: true,
//     navText: ["<i class='far fa-chevron-left'></i>", "<i class='far fa-chevron-right'></i>"],
//     navContainer: '#customNav',
//     dots: false,
//     smartSpeed: 3500,
//     touchDrag: false,
//     mouseDrag: false,
//     autoplay: true,
//     autoplayTimeout: 5000,
//     responsive: {
//         0: {
//             items: 1,
//         },
//     },
// });
$('#featured-owl').owlCarousel({
    loop: true,
    nav: true,
    navText: ["<i class='far fa-chevron-left'></i>", "<i class='far fa-chevron-right'></i>"],
    dots: false,
    smartSpeed: 1000,
    responsive: {
        0: {
            items: 1,
        },
        500: {
            items: 2,
        },
        800: {
            items: 3,
        },
        1221: {
            items: 5,
        },
    },
});
wow = new WOW({
    animateClass: 'animated',
    offset: 100,
    callback: function (box) {
        console.log('WOW: animating <' + box.tagName.toLowerCase() + '>');
    },
});
// wow.init();
