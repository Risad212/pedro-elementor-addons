(function ($) {
  "use strict";

  function PedroEA_Testimonial_slider($scope, $) {
    // selector
    const slider =  $(".pea-testimonial-slider", $scope)[0];
    const next   =  $(".pea-button-next", $scope)[0];
    const prev   =  $(".pea-button-prev", $scope)[0];

    // Initialize Swiper
    if (slider) {
      new Swiper(slider, {
        slidesPerView: 3,
        loop: true,
        spaceBetween: 20,
        grabCursor: true,
        navigation: {
          nextEl: next,
          prevEl: prev,
        },
        pagination: {
          el: $scope.find(".pea-swiper-pagination")[0],
          clickable: true,
        },
        breakpoints: {
          640:  { slidesPerView: 1 },
          768:  { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
        },
      });
    }
  }

  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/PedroEA_Testimonial.default",
       PedroEA_Testimonial_slider
    );
  });

})(jQuery);
