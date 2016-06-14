if(window.screen&&screen.width){
   window.screenSize=screen.width>767?'PC':'MOBILE';
}else{
  window.screenSize='PC';
}
$(window).scroll(function(){
   if(document.body.scrollTop>30){
        $('.following.bar').addClass('light');
        $('.menu').removeClass('inverted');
   }else{
       $('.following.bar').removeClass('light');
       $('.menu').addClass('inverted');
   }
})
$('.search-bar').on('click','.ui.button',function(){
      var text='';
      if(window.screenSize=="PC"){
        text=$(this).parent().siblings('.four.wide').find('.menu div[data-value] b').text();
      }else{
        text=$(this).parent().siblings('.ten.wide').find('.menu div[data-value] b').text();
      }
      if(text)  ga('send', 'event', 'search_click', 'content:'+text, '');
})
$('.second-sec').on('click','.ui.list .item',function(){
    var title=$(this).parent().siblings('.ui.header').text();
    var linkText=$(this).text();
    ga('send', 'event', 'course_click', 'title:'+title+',content:'+linkText, '');
})
$('.third-sec').on('click','.card',function(){
    var hotName=$(this).find('.content .ui.header').text();
    ga('send', 'event', 'hotSpot_click', 'hotSpot_name:'+hotName, '');
})
$('.fourth-sec').on('click','.ui.image',function(){
    var popularName=$(this).find('.content .ui.header').text();
    ga('send', 'event', 'popularSpot_click', 'popularSpot_name:'+popularName, '');
})
$('.more-course').on('click',function(){
    ga('send', 'event', 'seeMoreCourse_click', '', '');
})
$('.more-destination').on('click',function(){
    ga('send', 'event', 'seeMoreDestination_click', '', '');
})
$(function(){
  $('.ui.dropdown').dropdown({
    direction: 'upward',
    transition:'slide up',
    //允许用户自己输入，而不仅仅是选择列表
    allowAdditions:true,
    //选择列表项时候触发
    action: function(){
    },

  })
  // $('.grid .ui.image,.third-sec .ui.image ').dimmer('show');

})
