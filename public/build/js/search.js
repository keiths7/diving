'use strict';

$('.ui.checkbox').checkbox();
var conditionDV = $('.s-condition');
var sectionDivider = $('.ui.section.divider');
$('.filter-buttons .filter').on('click', 'button', function () {
  conditionDV.css('height', '618px');
  setTimeout(function () {
    conditionDV.addClass('open');
    sectionDivider.show();
  }, 300);
});
$('.apply-buttons').on('click', '.ok,.cancel', function () {

  $('body').animate({ scrollTop: 0 }, 300, function () {
    conditionDV.css('height', '264px');
    conditionDV.removeClass('open');
    sectionDivider.hide();
  });
});