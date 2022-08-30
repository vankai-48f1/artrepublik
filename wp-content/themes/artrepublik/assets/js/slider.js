(function ($) {
  $(document).ready(function () {

    $('.slider-primary').slick({
      dots: false,
      arrows: true,
      infinite: false,
      // autoplay: true,
      // autoplaySpeed: 7000,
      speed: 1000,
      slidesToShow: 5,
      slidesToScroll: 2,
      appendArrows: $('.slider-primary__custom-arrows'),
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });

    // Slider tertiary
    $('.about-partner__list').slick({
      dots: false,
      arrows: false,
      infinite: false,
      slidesToShow: 6,
      slidesToScroll: 2,
      autoplay: true,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    })

    // Slider fourth
    $('.about-team__list').slick({
      dots: false,
      arrows: true,
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      // autoplay: true,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    })
  }); // end ready document
})(jQuery)