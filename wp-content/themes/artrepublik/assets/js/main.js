(function ($) {
  // Wrap item sub-menu
  let submenuItems = $(".header-nav__menu li a");
  submenuItems.each((index, element) => {
    let submenuItemContent = $(element).text();
    $(element).html("<span>" + submenuItemContent + "</span>")
  })
  // Insert icon dropdown to sub menu panel bar
  $(".panel-bar__menu .menu-item.menu-item-has-children > a").append("<span class=\"toggle-drop-submenu\"><i class=\"far fa-plus\"></i></span>")
  // Drop down submenu panel bar
  $(".panel-bar__menu .menu-item.menu-item-has-children a .toggle-drop-submenu").on("click", function (e) {
    e.stopPropagation()
    $(this).closest(".menu-item").toggleClass("drop-active")
    return false;
  })
  // Open sub menu
  $(".panel-bar__menu .menu-item.menu-item-has-children > a").on("click", function (e) {
    e.stopPropagation();
  })

  // Replace input type submit contact form 7 to button
  const inputSubmitForm7Val = $('.wpcf7-form [type="submit"]').val();
  $('.wpcf7-form [type="submit"]').hide();
  $(`<button type="submit">${inputSubmitForm7Val}</button>`).insertAfter('.wpcf7-form [type="submit"]');

  $(document).ready(function () {
    // Open panel bar
    $('.hd-hamburger-btn').on('click', function (e) {
      e.preventDefault();
      $('#panel-bar').addClass('panel-open');
      $('.body-backdrop').addClass('backdrop-open');
    })
    // Close panel bar
    $('.panel-bar__close-btn').on('click', function () {
      $('#panel-bar').removeClass('panel-open');
      $('.body-backdrop').removeClass('backdrop-open');
    })

    // Open panel bar search
    $('.panel-bar__search-btn').on('click', function (e) {
      e.preventDefault();
      $('.panel-bar__search-form').addClass('form-open');
    })
    // Close panel bar search
    $('.panel-bar__search-form-close').on('click', function (e) {
      e.preventDefault();
      $('.panel-bar__search-form').removeClass('form-open');
    })
    // change location map
    // $('.contact-office__btn').on('click', function () {
    //   let ggMapUrl = new URL('https://maps.google.com/maps?q=coordinates&output=embed');
    //   let coordinates = $(this).find('input[name=office_coordinates]').val();

    //   $([document.documentElement, document.body]).animate({
    //     scrollTop: $(".contact-map").offset().top
    //   }, 300, 'linear');

    //   ggMapUrl.searchParams.set('q', coordinates);
    //   $('.contact__information-map > iframe').attr('src', ggMapUrl.toString());
    // })

    function timbcnn(a, b) {
      let stop = false;
      let i = 1;
      let bcnn = 0;
      let ba = []
      let bb = [];
    
      do {
        ba.push(a * i);
        bb.push(b * i);
        for(let j = 0; j < ba.length; j++) {
          for(let k = 0; k < bb.length; k++) {
            console.log(ba[j], bb[k], ba[j] == bb[k]);
            if (ba[j] == bb[k]) {
              bcnn = ba[j];
              stop = true;
              break;
            }
          }
          if (stop) { break; }
        }

        i++;        
      }
      while (stop == false);

      return bcnn;
    }
  
    timbcnn(5, 10)
    
  })
})(jQuery)