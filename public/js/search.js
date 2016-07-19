$('.ui.checkbox').checkbox()
var conditionDV=$('.s-condition');
$('.filter-buttons .filter').on('click','button',function(){
  conditionDV.css('height','618px');
  conditionDV.addClass('open');
})
$('.apply-buttons').on('click','.ok,.cancel',function(){
  conditionDV.removeClass('open');
  $('body').animate({scrollTop:0},300,function(){
    conditionDV.css('height','264px');
  })
})
