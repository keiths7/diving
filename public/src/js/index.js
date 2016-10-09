if(window.screen&&screen.width){
   window.screenSize=screen.width>767?'PC':'MOBILE';
}else{
  window.screenSize='PC';
}
var signUpDialog='',signInDialog='';
$(window).scroll(function(){
   if(window.screenSize=="MOBILE") return;
   if(document.body.scrollTop>30){
        $('.following.bar').addClass('light');
        $('.menu').removeClass('inverted');
   }else{
       $('.following.bar').removeClass('light');
       $('.menu').addClass('inverted');
   }
})
 console.log($('.search-bar input[name=country]'));

$('.search-bar').on('click','.search-btn',function(){
      // notice();
      var text='';
      if(window.screenSize=="PC"){
        text=$(this).siblings('.four.wide').find('input[name=country]').val();
      }else{
        text=$(this).siblings('.ten.wide').find('input[name=country]').val();
      }
       search(text);
      if(text){
          ga('send', 'event', 'search_click', 'content:'+text, '');
      } else{
           ga('send', 'event', 'search_click', 'content:'+'null', '');
      }

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
$('.ui.mini.teal.button').on('click',function(e){
  ga('send', 'event', 'contant_us_click', '', '');
  e.preventDefault();
})

$(function(){
  var destDOM= $('.ui.dropdown.destination');
      signUpDialog=$('.ui.modal.signup-dialog');
      signInDialog=$('.ui.modal.login-dialog');
    destDOM.dropdown({  
      direction: 'updown',
      transition:'slide down',
      allowAdditions:false,
      // action:function(){      
      // },
      // onChange:function(value, text, selectedItem){
      // },
      // apiSettings: {
      //    url: 'data.json?word={query}'
      // }
    })
  $('.ui.dropdown.passengers').dropdown()
  $('.date-pick').kuiDate({
    className:'date-pick',
    isDisabled: "0"  // isDisabled为可选参数，“0”表示今日之前不可选，“1”标志今日之前可选
  });
  $('.search-bar input.search').on('input propertychange',function(){
     destDOM.addClass('loading');
      var _this=$(this),word=_this.val(),itemStr='';
      $.getJSON('/destination',{word:word},function(r){
          destDOM.removeClass('loading');
          if((r instanceof Array) && r.length>0){
              $(r).each(function(k,v){
                itemStr+='<div class="item" data-value="'+v+'">'+v+'</div>';
              })
              _this.siblings('.menu').html(itemStr);
              destDOM.dropdown('refresh');
          }          
      })
  })
  $('.user.ui.dropdown').dropdown({
    on:'hover',
    action:function(){    
    },
  });
 
})
//signin,signup
$('.ui.modal').on('click','.signin-button',signIn)
$('.ui.modal').on('click','.signup-button',signUp);
$('header.ui.bar').on('click','.signin.item',signInAlert);
$('header.ui.bar').on('click','.signup.item',signUpAlert);

function notice(){
  
}
function search(dest){
     var dateS=$('.search-bar .from').find('input').val();
     var dateE=$('.search-bar .to').find('input').val();
     var passenger=$('.search-bar .passengers').find('input').val();
     if(!dest&&!dateS&&!dateE&&!passenger){
       alert('please choose one option for search at least ~');
     }
     else{
       location.href='/search?destination='+dest+'&date_start='+dateS+'&data_end='+dateE+'&passenger='+passenger;
     }
}
function signIn(){
    // $('header.ui.bar  .right.menu').addClass('signed');
    // return;
    var email=$('#signin-email-input').val(),
        password=$('#signin-password-input').val();
        if(email&&password){
            $.get('/user/login/',{email:email,password:password},function(r){
                console.log(r);
                if(r.message=="success"){
                    $('header.ui.bar  .right.menu').addClass('signed');
                    $('header.ui.bar  .right.menu').text(r.user)
                    signInDialog.modal('hide');  
                }else{
                    alert('sorry , someting wrong ')
                }

            })
        }else{
            alert('Please fill in all options ~');
        }
    
}
function signUp(){
    var email=$('#signup-email-input').val(),
        password=$('#signup-password-input').val(),
        name=$('#signup-name-input').val();
    if(email&&password&&name){
        $.get('/user/register',
          {email:email,
            password:password,
            name:name
          },
          function(r){
                    console.log(r);
                    alert('registration succeeded!');
                    signInAlert();
          })
    }else{
      alert('Please fill in all options ~');
    }
   
}
function signOut(){
  //  $('header.ui.bar  .right.menu').removeClass('signed'); 
  // return;
   $.get('/user/logout',function(r){
            console.log(r);
            $('header.ui.bar  .right.menu').removeClass('signed'); 
            alert('logout succeeded')   
      })
}
function signInAlert(){  
  signInDialog.modal({
        blurring:true,
        transition:'fade up'
    }).modal('show');
}
function signUpAlert(){
  signUpDialog.modal({
        blurring:true,
        transition:'fade up'
    }).modal('show');
}