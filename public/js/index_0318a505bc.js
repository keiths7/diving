"use strict";function notice(){$(".ui.modal").modal({blurring:!0}).modal("show"),$(".ui.modal").on("click",function(){$(this).modal("hide")})}window.screen&&screen.width?window.screenSize=screen.width>767?"PC":"MOBILE":window.screenSize="PC",$(window).scroll(function(){"MOBILE"!=window.screenSize&&(document.body.scrollTop>30?($(".following.bar").addClass("light"),$(".menu").removeClass("inverted")):($(".following.bar").removeClass("light"),$(".menu").addClass("inverted")))}),$(".search-bar").on("click",".ui.button",function(){notice();var e="";e="PC"==window.screenSize?$(this).parent().siblings(".four.wide").find(".menu div[data-value] b").text():$(this).parent().siblings(".ten.wide").find(".menu div[data-value] b").text(),e&&ga("send","event","search_click","content:"+e,"")}),$(".second-sec").on("click",".ui.list .item",function(){notice();var e=$(this).parent().siblings(".ui.header").text(),n=$(this).text();ga("send","event","course_click","title:"+e+",content:"+n,"")}),$(".third-sec").on("click",".card",function(){notice();var e=$(this).find(".content .ui.header").text();ga("send","event","hotSpot_click","hotSpot_name:"+e,"")}),$(".fourth-sec").on("click",".ui.image",function(){notice();var e=$(this).find(".content .ui.header").text();ga("send","event","popularSpot_click","popularSpot_name:"+e,"")}),$(".more-course").on("click",function(){notice(),ga("send","event","seeMoreCourse_click","","")}),$(".more-destination").on("click",function(){notice(),ga("send","event","seeMoreDestination_click","","")}),$(".ui.mini.teal.button").on("click",function(e){notice(),ga("send","event","contant_us_click","",""),e.preventDefault()}),$(function(){$(".ui.dropdown").dropdown({direction:"upward",transition:"slide up",allowAdditions:!0}),$(".date-pick").kuiDate({className:"date-pick",isDisabled:"0"})});