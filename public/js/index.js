"use strict";function notice(){}function search(n){var i=$(".search-bar .from").find("input").val(),e=$(".search-bar .to").find("input").val(),o=$(".search-bar .passengers").find("input").val();n||i||e||o?location.href="/search?destination="+n+"&date_start="+i+"&data_end="+e+"&passenger="+o:alert("please choose one option for search at least ~")}function signIn(){var n=$("#signin-email-input").val(),i=$("#signin-password-input").val();console.log(n,i),n&&i?$.get("/user/login/",{email:n,password:i},function(n){console.log(n),"success"==n.message?($("header.ui.bar  .right.menu").addClass("signed"),$("header.ui.bar  .right.menu").text(n.user),signInDialog.modal("hide")):alert("sorry , someting wrong ")}):alert("Please fill in all options ~")}function signUp(){var n=$("#signup-email-input").val(),i=$("#signup-password-input").val(),e=$("#signup-name-input").val(),o=$("#signup-confirm-password-input").val();n&&i&&e&&o?$.get("/user/register",{email:n,password:i,password_confirmation:o,name:e},function(n){console.log(n),alert("registration succeeded!"),signInAlert()}):alert("Please fill in all options ~")}function signOut(){$.get("/user/logout",function(n){console.log(n),$("header.ui.bar  .right.menu").removeClass("signed"),alert("logout succeeded")})}function signInAlert(){signInDialog.modal({blurring:!0,transition:"fade up"}).modal("show")}function signUpAlert(){signUpDialog.modal({blurring:!0,transition:"fade up"}).modal("show")}window.screen&&screen.width?window.screenSize=screen.width>767?"PC":"MOBILE":window.screenSize="PC";var signUpDialog="",signInDialog="";$(window).scroll(function(){"MOBILE"!=window.screenSize&&(document.body.scrollTop>30?($(".following.bar").addClass("light"),$(".menu").removeClass("inverted")):($(".following.bar").removeClass("light"),$(".menu").addClass("inverted")))}),console.log($(".search-bar input[name=country]")),$(".search-bar").on("click",".search-btn",function(){var n="";n="PC"==window.screenSize?$(this).siblings(".four.wide").find("input[name=country]").val():$(this).siblings(".ten.wide").find("input[name=country]").val(),search(n),n?ga("send","event","search_click","content:"+n,""):ga("send","event","search_click","content:null","")}),$(".second-sec").on("click",".ui.list .item",function(){var n=$(this).parent().siblings(".ui.header").text(),i=$(this).text();ga("send","event","course_click","title:"+n+",content:"+i,"")}),$(".third-sec").on("click",".card",function(){var n=$(this).find(".content .ui.header").text();ga("send","event","hotSpot_click","hotSpot_name:"+n,"")}),$(".fourth-sec").on("click",".ui.image",function(){var n=$(this).find(".content .ui.header").text();ga("send","event","popularSpot_click","popularSpot_name:"+n,"")}),$(".more-course").on("click",function(){ga("send","event","seeMoreCourse_click","","")}),$(".more-destination").on("click",function(){ga("send","event","seeMoreDestination_click","","")}),$(".ui.mini.teal.button").on("click",function(n){ga("send","event","contant_us_click","",""),n.preventDefault()}),$(function(){var n=$(".ui.dropdown.destination");signUpDialog=$(".ui.modal.signup-dialog"),signInDialog=$(".ui.modal.login-dialog"),n.dropdown({direction:"updown",transition:"slide down",allowAdditions:!1}),$(".ui.dropdown.passengers").dropdown(),$(".date-pick").kuiDate({className:"date-pick",isDisabled:"0"}),$(".search-bar input.search").on("input propertychange",function(){n.addClass("loading");var i=$(this),e=i.val(),o="";$.getJSON("/destination",{word:e},function(e){n.removeClass("loading"),e instanceof Array&&e.length>0&&($(e).each(function(n,i){o+='<div class="item" data-value="'+i+'">'+i+"</div>"}),i.siblings(".menu").html(o),n.dropdown("refresh"))})}),$(".user.ui.dropdown").dropdown({on:"hover",action:function(){}})}),$(".ui.modal").on("click",".signin-button",signIn),$(".ui.modal").on("click",".signup-button",signUp),$("header.ui.bar").on("click",".signin.item",signInAlert),$("header.ui.bar").on("click",".signup.item",signUpAlert);