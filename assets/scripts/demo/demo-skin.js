$(function() {
  var bodyClass, presentColor;
  presentColor = Cookies.get('colour');
  if (presentColor !== void 0) {
    bodyClass = presentColor;
    if ($('body').hasClass('layout-drawer')) {
      bodyClass += ' layout-drawer';
    }
    $('body').removeClass().addClass(bodyClass);
    $("[data-color='" + presentColor + "']").addClass('active');
  } else {
    $('body').addClass('mirage');
  }
  if ($('.js-custom-mix-demo-pick').length) {
    $('.js-custom-mix-demo-pick').on('asColorPicker::change', function(e) {
      var chooseColoris;
      chooseColoris = $(this).asColorPicker('val');
      return $('.js-custom-mix-demo').css('backgroundColor', chooseColoris);
    });
  }
  return $('.js-color-switcher  a').each(function() {
    return $(this).on('click', function(e) {
      var clickColor;
      clickColor = $(this).data('color');
      Cookies.remove('colour', {
        path: ''
      });
      Cookies.set('colour', clickColor, {
        expires: 7,
        path: '/'
      });
      $('.js-color-switcher  a').removeClass('active');
      $("[data-color='" + clickColor + "']").addClass('active');
      if (clickColor !== void 0) {
        bodyClass = clickColor;
        if ($('body').hasClass('layout-drawer')) {
          bodyClass += ' layout-drawer';
        }
        return $('body').removeClass().addClass(bodyClass);
      } else {
        return $('body').addClass('mirage');
      }
    });
  });
});
