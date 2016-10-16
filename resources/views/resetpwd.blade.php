<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="full-screen" content="yes">
     <title>Dreamdivingtrip.com: Online Booking for Scuba Diving,Liveaboard and Courses all around the world</title>
    <meta name="description" content="Book your best diving trip，every diving trip with Dreamdivingtrip,the world’s best diving booking site.Your free personal diving assistant.">
    <meta name="keywords" content="diving vacation, diving vacations, diving vacation packages, diving vacation package, diving travel package, diving travel packages, diving travel, diving trip package, diving trip packages, diving trip,planning, hotel, hotels, motel, bed and breakfast, inn, guidebook, review, reviews, popular, plan, airfare, cheap, discount, map, maps, golf, ski, articles, attractions, advice, restaurants">
    <link href="/css/datePick.css" rel="stylesheet">
    <link href="/css/semantic.min.css" rel="stylesheet">
   
<link href="/css/profile.css" rel="stylesheet">
</head>
<body id="profile" >
    <header class="ui following bar sticky">
      <div class="ui  menu ">
        <div class="item">
          <div class="ui logo shape">
            <div class="sides">
              <div class="active ui side">
                <img class="ui  image"  src="/images/logo-black.png">
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="ui transparent left icon input">
            <input type="text" placeholder="Search...">
            <i class="search icon"></i>
          </div>
        </div>       
        <div class="right  menu">
          <div class="item user ui pointing dropdown">
                 <div class="text">Welcome</div>
                 <div class="menu">
                   <div class="item"><a href="/profile#purchases">Purchases</a></div>
                   <div class="item"><a href="/profile#setting">Settings</a></div>
                   <div class="item"><a href="javascript:signOut()">Sign Out</a></div>
                 </div>         
          </div>
          <div class="item ui link signup" onclick="signUpAlert()">Sign Up</div>
          <div class="item ui link signin" onclick="signInAlert()">Sign In</div>
        </div>
      </div>
  </header>
  <script>
    $(function(){
        $('.user.ui.dropdown').dropdown({
            on:'hover',
            action:function(){    
            },
        });
        $('.ui.modal').on('click','.signin-button',signIn)
        $('.ui.modal').on('click','.signup-button',signUp);
    })


function signIn(){
    // $('header.ui.bar  .right.menu').addClass('signed');
    // return;
    var email=$('#signin-email-input').val(),
        password=$('#signin-password-input').val();
        console.log(email,password)
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
        name=$('#signup-name-input').val(),
        password_confirmation=$('#signup-confirm-password-input').val();
    if(email&&password&&name&&password_confirmation){
        $.get('/user/register',
          {email:email,
            password:password,
            password_confirmation:password_confirmation,
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
  
  $('.ui.modal.login-dialog').modal({
        blurring:true,
        transition:'fade up'
    }).modal('show');
}
function signUpAlert(){
  $('.ui.modal.signup-dialog').modal({
        blurring:true,
        transition:'fade up'
    }).modal('show');
}
  </script>
    <section class="profile-tab">
        <div class="ui container">
            <div class="ui four column grid">
                <div class="row">
                    <div class="column sel" data-tab="purchases">Reset Password</div>
                </div>
            </div>
        </div>
    </section>
    <section class="form-sec profile">
    <div class="ui container">
        <div class="forms-wrap">
             <div class="setting sel">  
                    <div class="ui form">
                        <div class="inline  fields">
                            <div class="four wide field">
                                <label for="">enter your new password</label>
                            </div>
                            <div class=" eight wide field">
                                <input type="text" placeholder="">
                            </div>
                        </div>
                        <div class="inline  fields">
                            <div class="four wide field">
                                <label for="">enter your new password again</label>
                            </div>
                            <div class=" eight wide field">
                                <input type="text" placeholder="">
                            </div>
                        </div>
                        <div class="inline  fields">
                            <div class="four wide field"></div>
                            <div class="five wide field">
                                <div class="ui submit teal large fluid button"  onclick="resetPwd()">OK</div>
                            </div>
                        </div>
                    </div>
              </div>
        </div>
    </div>
</section>
    <footer class="footer-sec ui black inverted vertical footer segment">
  <div class="ui center aligned container">
    <div class="ui stackable inverted centered four column grid">
      <div class="row">
      <div class="column">
        <h4 class="ui inverted header">Dream Scubatrip</h4>
        <div class="ui inverted bolded divider "></div>
        <div class="ui inverted link list">
          <a class="item" href="https://www.transifex.com/organization/semantic-org/" target="_blank">
            <i class="marker icon"></i>
            BEIJING
          </a>
          <div class="ui inverted divider"></div>
          <a class="item" href="https://github.com/Semantic-Org/Semantic-UI/issues" target="_blank">
            <i class="phone icon"></i>
            +86 18911189901
          </a>
          <div class="ui inverted divider"></div>
          <a class="item" href="https://gitter.im/Semantic-Org/Semantic-UI" target="_blank">
            <i class="mail outline icon"></i>
            market@dreamdivingtrip.com
          </a>
        </div>
      </div>
      <div class="column">
        <h4 class="ui inverted header">TAG</h4>
        <div class="ui inverted bolded divider"></div>
        <div class="ui   tiny labels">
          <div class="ui inverted  label">BIG ANIMAL</div>
          <div class="ui inverted label">STORE</div>
          <div class="ui inverted label">HO</div>
          <div class="ui inverted label">WALL</div>
          <div class="ui inverted label">GO DIVING</div>
          <div class="ui inverted label">SHADOW</div>
          <div class="ui inverted label">FREEEEE</div>
        </div>
      </div>
      <div class="column">
        <h4 class="ui inverted header">GALLERY</h4>
        <div class="ui inverted bolded divider"></div>
        <!-- 底部的图片 -->
        <div class="ui link three cards">
            <div class="card">
              <div class="image"><img src="/images/index/gallery.png" alt=""></div>
            </div>
            <div class="card">
              <div class="image"><img src="/images/index/gallery.png" alt=""></div>
            </div>
            <div class="card">
              <div class="image"><img src="/images/index/gallery.png" alt=""></div>
            </div>
            <div class="card">
              <div class="image"><img src="/images/index/gallery.png" alt=""></div>
            </div>
            <div class="card">
              <div class="image"><img src="/images/index/gallery.png" alt=""></div>
            </div>
        </div>
      </div>
      <div class="column">
        <h4 class="ui inverted header">CONTACT US</h4>
        <div class="ui inverted bolded divider"></div>
        <form class="ui form" >
          <div class=" ui field  input ">
            <input type="text" name="email" placeholder="email">
          </div>
          <div class=" ui field  input">
            <input type="text" name="message" placeholder="message">
          </div>
          <button class="ui mini teal button" type="submit">SEND</button>
        </form>
      </div>
      </div>
    </div>
    <div class="ui  hidden  divider"></div>
    <div class="ui two column grid">
      <div class="seven wide left floated column">
          <div class="ui inverted link list">
            <a href="#" class="item">COPY RIGHT 2016 BY DREAMSCUBATRIP</a>
          </div>
      </div>
      <div class="three wide right floated column">
         <i class="bordered inverted  teal  twitter  icon"></i>&nbsp;
         <i class="bordered inverted  red  google plus  icon"></i>&nbsp;
         <i class="bordered inverted  blue facebook  icon"></i>
      </div>
    </div>
  </div>
</footer>
    <div class="ui inverted modal login-dialog"  >
  <i class="close icon"></i>
  <div class="top-header">
    <div class="logo"><img src="/images/logo-black.png" alt=""></div>
    <h3>Book your diving trips all in one place</h3>
  </div>
  <div class=" loginby-facebook">
    <button class="ui blue button fluid"><i class="ui facebook icon"></i>Sign In With Facebook</button>
  </div>
  <div class="ui horizontal divider mt-4">or</div>
  <div class="forms">
      <div class="ui fluid icon input">
        <input type="text" id="signin-email-input" placeholder="type your email address...">
        <i class="mail icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signin-password-input" placeholder="type your password ...">
        <i class="lock icon"></i>
      </div>
      <div class="tr mt-2 mb-4">Forgot?</div>
      <button class="ui button teal fluid signin-button"> SIGN IN</button>
  </div>
  <div class="ui divider"></div>
  <div class="new-user-tip">
      <span class="left floated mt-1">New to super diving trip?</span>
      <div class="right floated">
        <button class="ui button inverted red" onclick="signUpAlert()">sign up</button>
      </div>
  </div>
</div>
<div class="ui inverted modal signup-dialog"  >
  <i class="close icon"></i>
  <div class="top-header">
    <div class="logo"><img src="/images/logo-black.png" alt=""></div>
    <h3>Book your diving trips all in one place</h3>
  </div>
  <div class=" loginby-facebook">
    <button class="ui blue button fluid"><i class="ui facebook icon"></i>Sign In With Facebook</button>
  </div>
  <div class="ui horizontal divider mt-4">or</div>
  <div class="forms">
      <div class="ui fluid icon input">
        <input type="text" id="signup-email-input" placeholder="type your email address...">
        <i class="mail icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signup-password-input" placeholder="type your password between 6 and 12 characters ...">
        <i class="lock icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signup-confirm-password-input" placeholder="type your password again ...">
        <i class="lock icon"></i>
      </div>
      <div class="ui fluid icon input">
        <input type="text" id="signup-name-input" placeholder="type your nickname ...">
        <i class="user icon"></i>
      </div>
      <a href=""></a><div class="tr mt-2 mb-4">Forgot?</div>
      <button class="ui button teal fluid signup-button"> SIGN UP</button>
  </div>
  <div class="ui divider"></div>
  <div class="new-user-tip clearfix">
      <span class="left floated mt-1">Already have an account?</span>
      <div class="right floated">
        <button class="ui button inverted red" onclick="signInAlert()">sign in</button>
      </div>
  </div>
</div>
<script src="/js/jquery.min.js" charset="utf-8"></script>
<script src="/js/semantic.min.js" charset="utf-8"></script>
<script src="/js/profile.js" charset="utf-8"></script>
</body>
<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-78887752-1', 'auto');
        ga('send', 'pageview');
</script>