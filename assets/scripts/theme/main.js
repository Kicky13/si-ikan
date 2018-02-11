$(function() {
  var $DataTableEl, $TouchSpinEl, $asColorPickerEl, $counterUpEl, $datepickerEl, $daterangepickerEl, $easyPieChartEl, $labelautyEl, $maxlengthEl, $multiselectEl, $owlslider, $peityBarEl, $peityDonutEl, $peityLineEl, $peityPieEl, $select2El, $selectpickerEl, $sssEl, $submenupickerEl, $summernoteEl, $timepickerEl, gridMasonry;
  FastClick.attach(document.body);
  $select2El = $("[data-plugin='select2']");
  $multiselectEl = $("[data-plugin='multiselect']");
  $counterUpEl = $("[data-plugin='counterUp']");
  $maxlengthEl = $("[data-plugin='maxlength']");
  $TouchSpinEl = $("[data-plugin='TouchSpin']");
  $asColorPickerEl = $("[data-plugin='asColorPicker']");
  $daterangepickerEl = $("[data-plugin='daterangepicker']");
  $datepickerEl = $("[data-plugin='datepicker']");
  $timepickerEl = $("[data-plugin='timepicker']");
  $peityPieEl = $("[data-plugin='peityPie']");
  $peityBarEl = $("[data-plugin='peityBar']");
  $peityLineEl = $("[data-plugin='peityLine']");
  $peityDonutEl = $("[data-plugin='peityDonut']");
  $submenupickerEl = $("[data-plugin='submenupicker']");
  $DataTableEl = $("[data-plugin='DataTable']");
  $selectpickerEl = $("[data-plugin='selectpicker']");
  $summernoteEl = $("[data-plugin='summernote']");
  $easyPieChartEl = $("[data-plugin='easyPieChart']");
  $sssEl = $("[data-plugin='sss']");
  $labelautyEl = $("[data-plugin='labelauty']");
  $owlslider = $("[data-plugin='owlslider']");
  $select2El.each(function() {
    return $(this).select2();
  });
  $multiselectEl.each(function() {
    return $(this).multiSelect();
  });
  $counterUpEl.each(function() {
    return $(this).counterUp();
  });
  $maxlengthEl.each(function() {
    return $(this).maxlength();
  });
  $TouchSpinEl.each(function() {
    return $(this).TouchSpin();
  });
  $asColorPickerEl.each(function() {
    return $(this).asColorPicker();
  });
  $daterangepickerEl.each(function() {
    return $(this).daterangepicker();
  });
  $datepickerEl.each(function() {
    return $(this).datepicker({
      container: $(this).parent('.datepicker-wrapper'),
      todayHighlight: true,
      todayBtn: "linked"
    });
  });
  $timepickerEl.each(function() {
    return $(this).timepicker();
  });
  $peityPieEl.each(function() {
    return $(this).peity('pie');
  });
  $peityLineEl.each(function() {
    return $(this).peity('line');
  });
  $peityBarEl.each(function() {
    return $(this).peity('bar');
  });
  $peityDonutEl.each(function() {
    return $(this).peity('donut');
  });
  $submenupickerEl.each(function() {
    return $(this).submenupicker();
  });
  $DataTableEl.each(function() {
    return $(this).DataTable();
  });
  $selectpickerEl.each(function() {
    return $(this).selectpicker();
  });
  $summernoteEl.each(function() {
    return $(this).summernote({
      focus: true,
      dialogsInBody: true
    });
  });
  $easyPieChartEl.each(function() {
    return $(this).easyPieChart({
      lineWidth: '10',
      barColor: '#2ECC71'
    });
  });
  $sssEl.each(function() {
    return $(this).sss({
      slideShow: false
    });
  });
  $labelautyEl.each(function() {
    return $(this).labelauty();
  });
  $owlslider.each(function() {
    return $(this).owlCarousel({
      loop: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        960: {
          items: 6
        }
      }
    });
  });
  $("[data-toggle='tooltip']").tooltip();
  $("[data-toggle='popover']").popover();
  $("[data-jqui='sortable']").sortable({
    placeholder: "ui-state-highlight",
    connectWith: '.js-sortable-connet'
  });
  $("[data-jqui='datepicker']").datepicker();
  if ($(window).width() > 544) {
    $(".gridster > ul").gridster({
      widget_margins: [10, 10],
      widget_base_dimensions: [140, 140]
    });
  }
  gridMasonry = $('.js-grid-wrapper').masonry({
    itemSelector: '.js-grid',
    columnWidth: '.js-sizer',
    percentPosition: true
  });
  $('.js-view-btn').on('click', function(e) {
    e.preventDefault();
    $(this).find('i').toggleClass('fa-list-ul fa-th');
    return $('.js-view-control').toggleClass('grid-view list-view');
  });
  gridMasonry.imagesLoaded().progress(function() {
    return gridMasonry.masonry('layout');
  });
  gridMasonry.on('click', '.js-grid-expand', function(e) {
    e.preventDefault();
    $(this).parents('.js-grid').toggleClass('expand');
    return gridMasonry.masonry();
  });
  gridMasonry.on('click', '.js-grid-up', function(e) {
    e.preventDefault();
    $(this).find('.icon').toggleClass('ion-chevron-down ion-chevron-up');
    $(this).parents('.js-grid').find('.panel-body').toggle();
    return gridMasonry.masonry();
  });
  gridMasonry.on('click', '.js-reload', function(e) {
    e.preventDefault();
    return $(this).parents('.js-grid').find('.js-loader').show().removeClass('hidden').animate({
      value: '100'
    }, 2000).fadeOut().animate({
      value: '0'
    });
  });
  $('.js-reload').on('click', function(e) {
    e.preventDefault();
    return $(this).parents('.panel').find('.js-loader').show().removeClass('hidden').animate({
      value: '100'
    }, 2000).fadeOut().animate({
      value: '0'
    });
  });
  $(window).bind('scroll', function() {
    if ($(window).scrollTop() > $('.topbar-wrapper').height()) {
      return $('body').addClass('scrolling');
    } else {
      return $('body').removeClass('scrolling');
    }
  });
  $(window).load(function() {
    $('#preload').delay(350).fadeOut('slow');
    return $('body').delay(350).css({
      'overflow': 'visible'
    });
  });
  $('.menu-block-has-sub > a').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $(this).next('.menu-block-sub').slideToggle();
    return $(this).parents().siblings('.menu-block-has-sub').children('.menu-block-sub').slideUp().prev('.active').removeClass('active');
  });
  $('.js-minibar-toggler').on('click', function(e) {
    e.preventDefault();
    $('body').toggleClass('minibar').promise().done(function() {
      if ($('body.layout-drawer').length) {
        $('body').css('overflow', 'hidden');
        $('.mainmenu-block').after("<div class='drawer-close'></div>");
        return $('.drawer-close').on('click', function(e) {
          e.preventDefault();
          $('body').removeClass('minibar');
          $('body').css('overflow', 'auto');
          return $(this).remove();
        });
      }
    });
    $('.layout-sidebar').removeClass('active');
    if ($(window).width() > 998 && !$('body.layout-drawer').length) {
      return $(this).find('.icon').toggleClass('ion-navicon-round');
    }
  });
  $('.js-nav-toggler').on('click', function(e) {
    e.preventDefault();
    return $('.topbar-wrapper-nav').addClass('active');
  });
  $('.js-close-mobile-nav').on('click', function(e) {
    e.preventDefault();
    return $('.topbar-wrapper-nav').removeClass('active');
  });
  $('.js-search-togger').on('click', function(e) {
    e.preventDefault();
    return $('.topbar-wrapper-search').addClass('active');
  });
  $('.js-close-search').on('click', function(e) {
    e.preventDefault();
    return $('.topbar-wrapper-search').removeClass('active');
  });
  $('.sidebar-togger').on('click', function(e) {
    e.preventDefault();
    return $('.layout-sidebar').toggleClass('active');
  });
  return $('.dropdown-menu a[data-toggle="tab"]').click(function(e) {
    e.stopPropagation();
    return $(this).tab('show');
  });
});
