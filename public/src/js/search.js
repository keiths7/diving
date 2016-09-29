var paramData='';
$(function(){
    $('.ui.checkbox').checkbox();
    $('.ui.dropdown').dropdown();
    $('.date-pick').kuiDate({
        className:'date-pick',
        isDisabled: "0"  // isDisabled为可选参数，“0”表示今日之前不可选，“1”标志今日之前可选
    });
})  
var conditionDV=$('.s-condition');
var sectionDivider=$('.ui.section.divider');
$('.filter-buttons .filter').on('click','button',function(){
  conditionDV.css('height','618px');
  setTimeout(function(){
    conditionDV.addClass('open');
    sectionDivider.show();
  },300);
})
$('.apply-buttons').on('click','.cancel',function(){

  $('body').animate({scrollTop:0},300,function(){
    conditionDV.css('height','264px');
    conditionDV.removeClass('open');
    sectionDivider.hide();
  })
})
$('.apply-buttons').on('click','.ok',function(){
    var getCheckedItems=function(selector){
      var itemStr='';
      var items=$(selector).find('input[type=checkbox]:checked+label')
      $(items).each(function(k,v){
          itemStr+=$(v).text();
            itemStr+=','           
      })
      itemStr=itemStr.substr(0,itemStr.length-1);
      return itemStr;
    };
    var dateS=$('.dateS').val(),dateE=$('.dateE').val();
    var passenger=$('.passengers input').val();
    var divingtype=$('.divingtype  input[type=radio]:checked').val();
    var pricerange=$('.pricerange input').val();
    var lang=getCheckedItems('.lang.fields ')
    var course=getCheckedItems('.course.fields');
    var divingcenter=getCheckedItems('.divingcenter.fields');
    var dest=getCheckedItems('.dest.fields');
    paramData={
      date_start:dateS,
      date_end:dateE,
      passenger:passenger,
      divingtype:divingtype,
      pricerange:pricerange,
      language:lang,
      course:course,
      divingcenter:divingcenter,
      dest:dest,
    }
    location.href='/search?'+$.param(paramData);
})
$('.see-mor-button').on('click',function(){
    paramData.city_id='';
    paramData.diving_id='';
    // $.get('/search/get_more',paramData,function(r){

    // })
})