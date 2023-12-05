(function ($) {
  "use strict";

  $(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
      $('.navbar').addClass('shadow-lg');
    } else {
    $('.navbar').removeClass('shadow-lg');
  }
});

  // menu
  $(".siteBar-btn").click(function () {
    $(".mobile-menu").toggleClass("siteBar");
  });

  // owlCarousel
  $(".owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 20,
    smartSpeed: 1500,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    touchDrag: false,
    mouseDrag: false,
    nav: true,
    navText: [
      '<i class="far fa-angle-left"></i>',
      '<i class="far fa-angle-right"></i>',
    ],
    navElement: 'div class="owl-nav"',
    dots: false,
  });
})(jQuery);
