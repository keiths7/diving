$(window).scroll(function(){
   if(document.body.scrollTop>50){
        $('.following.bar').addClass('light');
        $('.menu').removeClass('inverted');
   }else{
       $('.following.bar').removeClass('light');
       $('.menu').addClass('inverted');
   }
})
$(function(){
  console.log('0');
  $('.ui.dropdown').dropdown()
  console.log('1')
  $('.grid .ui.image,.third-sec .ui.image ').dimmer('show');

})

// $('.ui.sticky')
//   .sticky({
//     context: '.full.height'
//   });
