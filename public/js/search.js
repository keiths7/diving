"use strict";var paramData={};$(function(){$(".ui.checkbox").checkbox(),$(".ui.dropdown").dropdown(),$(".date-pick").kuiDate({className:"date-pick",isDisabled:"0"})});var conditionDV=$(".s-condition"),sectionDivider=$(".ui.section.divider");$(".filter-buttons .filter").on("click","button",function(){conditionDV.css("height","618px"),setTimeout(function(){conditionDV.addClass("open"),sectionDivider.show()},300)}),$(".apply-buttons").on("click",".cancel",function(){$("body").animate({scrollTop:0},300,function(){conditionDV.css("height","264px"),conditionDV.removeClass("open"),sectionDivider.hide()})}),$(".apply-buttons").on("click",".ok",function(){var i=function(i){var n="",t=$(i).find("input[type=checkbox]:checked+label");return $(t).each(function(i,t){n+=$(t).text(),n+=","}),n=n.substr(0,n.length-1)},n=$(".dateS").val(),t=$(".dateE").val(),a=$(".passengers input").val(),e=$(".divingtype  input[type=radio]:checked").val(),s=$(".pricerange input").val(),c=i(".lang.fields "),o=i(".course.fields"),d=i(".divingcenter.fields"),r=i(".dest.fields");paramData={date_start:n,date_end:t,passenger:a,divingtype:e,pricerange:s,language:c,course:o,divingcenter:d,destination:r},location.href="/search?"+$.param(paramData)}),$(".see-more-button").on("click",function(){var i=$(this).siblings(".current-site"),n=$(this).siblings(".diving-sites");paramData.city_id=i.data("cityid"),paramData.diving_id=i.data("positionid");var t='<div class="row">',a=['<div class="column">','<div class="ui image">','<img src="/images/search/list_1.jpg" alt="">','<aside class="">$ 2300 </aside>',"<p>标题</p>","<p><span>tags</span></p>","</div></div>"].join(""),e=[];e.push(a),e.push(a),e.push(a),$(e).each(function(i,n){t+=n}),n.find(".ui.grid").append(t)});