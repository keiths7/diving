"use strict";function kui_click_(t,i,e,_,n){var a=t.className;if(a.indexOf("kui_td_hui")<0){var s;s=_<10?"0"+parseInt(_,10):_,n=null==$(t).html()?i.substring(8,10):$(t).html()<10?0+$(t).html():$(t).html(),jqObj[0].val(e+"-"+s+"-"+n),$("#kui_d_pane").hide()}}console.log("enter");var jqObj=[];$.fn.kuiDate=function(t){function i(){function i(i){jqObj.pop(),jqObj.push(e);var _=r,n=c;"right"==i?(12==n?(_++,n="01"):(n++,n<10&&(n="0"+n)),$(".kui_tomorrow").text(f[Number(n)-1]+" "+_)):n=n<10?"0"+parseInt(n,10):n;var a=p,s="";s=""==k?_+"-"+n+"-"+a:$.trim(k);var d=new Array(31,28,31,30,31,30,31,31,30,31,30,31);(_%4==0&&_%100!=0||_%400==0)&&(d[1]=29);for(var g=d[n-1],h=1,v=0;v<n-1;v++)h+=d[v];var m,b=(_-1)%4==0?(_-1)/4:(_-1-(_-1)%4)/4,x=(_-1)%100==0?(_-1)/100:(_-1-(_-1)%100)/100,j=(_-1)%400==0?(_-1)/400:(_-1-(_-1)%400)/400,y=_-1+b-x+j+h,D=y%7,w=(D+g)%7==0?(D+g)/7:(D+g-(D+g)%7)/7+1;m="left"==i?$("#kui_left_t"):$("#kui_right_t"),m.html("");for(var N=[],v=0;v<w;v++){var O=l<10?"0"+l:l,I=u<10?"0"+u:u,M=o+"-"+O+"-"+I;if(0==v){for(var S=1;S<D+1;S++)N.push('<dt class="kui_td_kong">&nbsp;</dt>');for(var q=1,S=D+1;S<=7;S++){var T=7*v+q<10?"0"+(7*v+q):7*v+q,F=n<10?"0"+parseInt(n,10):n,H=_+"-"+F+"-"+T,A="";H>=M?""==k?(A="kui_not_kong",a==T&&"left"==i&&(A="kui_not_kong td_select")):A=k==H?"kui_not_kong td_select":"kui_not_kong":"1"==t.isDisabled?""==k?(A="kui_not_kong",a==T&&"left"==i&&(A="kui_not_kong td_select")):A=k==H?"kui_not_kong td_select":"kui_not_kong":A="kui_td_hui",N.push('<dt class="'+A+'"  onclick="kui_click_(this,'+s+","+_+","+n+","+a+');">'+(7*v+q)+"</dt>"),q++}$(".kui_top_tr").removeClass("kui_top_tr")}else if(v==w-1)for(var q=8-D,S=1;S<=7;S++){var H=_+"-"+n+"-"+(7*(v-1)+q),A="";7*(v-1)+q>g?N.push('<dt class="kui_td_kong">&nbsp;</dt>'):(H>=M?""==k?(A="kui_not_kong",a==7*(v-1)+q&&"left"==i&&(A="kui_not_kong td_select")):A=k==H?"kui_not_kong td_select":"kui_not_kong":"1"==t.isDisabled?""==k?(A="kui_not_kong",a==7*(v-1)+q&&"left"==i&&(A="kui_not_kong td_select")):A=k==H?"kui_not_kong td_select":"kui_not_kong":A="kui_td_hui",N.push('<dt class="'+A+'" onclick="kui_click_(this,'+s+","+_+","+n+","+a+');">'+(7*(v-1)+q)+"</dt>")),q++}else for(var q=8-D,S=1;S<=7;S++){var T=7*(v-1)+q<10?"0"+(7*(v-1)+q):7*(v-1)+q,F=n<10?"0"+parseInt(n,10):n,H=_+"-"+F+"-"+T,A="";H>=M?""==k?(A="kui_not_kong",a==T&&"left"==i&&(A="kui_not_kong td_select")):A=k==H?"kui_not_kong td_select":"kui_not_kong":"1"==t.isDisabled?""==k?(A="kui_not_kong",a==T&&"left"==i&&(A="kui_not_kong td_select")):A=k==H?"kui_not_kong td_select":"kui_not_kong":A="kui_td_hui",N.push('<dt class="'+A+'"  onclick="kui_click_(this,'+s+","+_+","+n+","+a+',1);">'+(7*(v-1)+q)+"</dt>"),q++}}m.html(N.join(""));N.join("")}var _=e.offset().left,n=e.offset().top+e.outerHeight(),a=e.outerWidth(),s=$(window).width();_+370<s?$(document).clientHeight-n<217&&$(document).clientHeight>217?$("#kui_d_pane").attr("style","left:"+_+"px; top:"+(e.offset().top-197)+"px;"):$("#kui_d_pane").attr("style","left:"+_+"px; top:"+n+"px;"):$("#kui_d_pane").attr("style","left:"+(_+a-370)+"px; top:"+n+"px;"),$("#kui_d_pane").show();var d=new Date,o=d.getFullYear(),l=d.getMonth()+1,u=d.getDate(),k=(d.getDay(),d.getHours(),d.getMinutes(),d.getSeconds(),d.getTime(),e.val()),r=""==$.trim(k)?o:$.trim(k).substring(0,4),c=""==$.trim(k)?l:$.trim(k).substring(5,7),p=""==$.trim(k)?u:$.trim(k).substring(8,10),f=["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];$(".kui_today").text(f[Number(c)-1]+" "+r),$(".kui_prev_m").click(function(){var t=r,e=c;1==e&&(r=t-1,c="12"),e>1&&e<11&&(c="0"+(e-1)),e>10&&e<13&&(c=e-1),$(".kui_today").text(f[Number(c)-1]+" "+r),i("left"),i("right")}),$(".kui_next_m").click(function(){var t=c;t>0&&t<9&&(c="0"+(parseInt(t,10)+1)),t>8&&t<12&&(c=parseInt(t,10)+1),12==t&&(r++,c="01"),$(".kui_today").text(f[Number(c)-1]+" "+r),i("left"),i("right")}),i("left"),i("right"),$(".kui_clean_btn").click(function(){e.val("")}),$(".kui_close_btn").click(function(){$("#kui_d_pane").hide()})}t={isDisabled:t.isDisabled||"0",maxDate:t.maxDate||"",minDate:t.minDate||"",className:t.className};var e;console.log(this),$(this).on("click",function(t){$("#popup_frame,#popup_pane,#a_tips_frame,#air_down_tips").hide(),e=$(this),i()}),$(".kui_date_reset span.off").click(function(){jqObj[0].val(""),$("#kui_d_pane").hide()}),$(".kui_date_reset span.close").click(function(){$("#kui_d_pane").hide()})},$(function(){}),$(function(){var t='<div class="kui_d_pane" id="kui_d_pane" style="display:none;"><iframe id="kui_frame_d" width="370" height="203" frameborder="0"></iframe><div class="kui_data_content_pane"><div class="kui_prev_next_month"><i href="javascript:;" class="kui_prev_m  bordered  angle left icon"></i><span class="kui_today"></span><i href="javascript:;" class="kui_next_m bordered  angle right icon"></i><span class="kui_tomorrow"></span></div><div id="left_table"><dl class="kui_data_tab"><dt class="d_th_bg">Su</dt><dt>Mo</dt><dt>Tu</dt><dt>We</dt><dt>Th</dt><dt>Fr</dt><dt class="d_th_bg">Sa</dt></dl><dl class="kui_date_info" id="kui_left_t"></dl></div><div id="right_table"><dl class="kui_data_tab"><dt class="d_th_bg">Su</dt><dt>Mo</dt><dt>Tu</dt><dt>We</dt><dt>Th</dt><dt>Fr</dt><dt class="d_th_bg">Sa</dt></dl><dl class="kui_date_info" id="kui_right_t"></dl></div><div class="kui_date_reset"><span class="off">clear</span><span class="close">close</span></div></div></div>';$("body").append(t)});