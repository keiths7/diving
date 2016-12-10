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
    <script src="/js/jquery.min.js" charset="utf-8"></script>
    <script src="/js/semantic.min.js" charset="utf-8"></script>
</head>
<body id="profile" >
    @include('layout.header')
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
@include('layout.footer')
@include('layout.loginer')

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