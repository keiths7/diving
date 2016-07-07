
$('.ui.rating').rating();

$('.description.p70.column').on('click','.more',function(){
    $(this).prev().toggleClass('expand')
})
$('.ui.left.arrow').on('click',function(){
    myScroll.prev()
})
$('.ui.right.arrow').on('click',function(){
    myScroll.next()
})
var myScroll,imgcount=0;
function registerScroll() {
    myScroll = new IScroll('#maskcontent', { scrollX: true, scrollY: false, mouseWheel: true, momentum: false, snap: true });

    myScroll.on('scrollEnd', function () {
         curpage = myScroll.currentPage.pageX + 1;
        if (curpage>imgcount) {
            return;
        }
        $("#download").text(curpage + "/" + imgcount);
        displayImage($("#scroller li").children("div").eq(curpage-1));

    });
}

$('.row.images').on("click",".ui.image",imgClick);
$("#pptclose").on("click", destoryPowPoint);
//点击图片显示大图
function imgClick(){
//console.log("00--"+$(this).data("src"));
    var obj = this;
    initMask(obj);
    $("#mask").animate({ top: "0%" }, "200", function () { });
    pushHistory();
}
function pushHistory() {
  var url=location.href.indexOf('#SEE')>-1?location.href:location.href+'#SEE'
    var state = {
        title: "see large image",
        url: url,
        otherkey: ""
    };
    window.history.pushState(state, "", url);
    window.addEventListener("popstate", destoryPowPoint, false);
}
function destoryPowPoint() {
    $("#mask").animate({ top: "100%" }, "200", function () {
        //     // myScroll.destroy();
        //     // $("#imgul").children().remove();
        var url=location.href.indexOf('#SEE')>-1?location.protocol+'//'+location.host+location.pathname:location.href;
        window.history.replaceState({},"",url);
    });
    window.removeEventListener("popstate", destoryPowPoint, false);
}
function initMask(obj) {
    var imgurls=$('.row.images').find('.ui.image');
    imgcount = imgurls.length;
    $(imgurls).each(function () {
        $("#imgul").append('<li><div  data-img="' + $(this).data("img") + '" ><div class="loader-wrap" ><div class="ui active inline loader"></div></div></div></li>');
    });
    $("#scroller li").css({ width: (100 / imgcount) + "%" });
    $("#scroller").css({ width: (100 * imgcount) + "%" });

    registerScroll();
    // var index = Number(this.id.replace(/\D+/g, " ")) + 1;
    var index = imgurls.index($(obj));
    // $("#download").text((index+1) + "/" + imgcount);
    myScroll.goToPage(index,0,0);
    var curpage = myScroll.currentPage.pageX;
    displayImage($("#scroller li").children("div").eq(curpage));
    // $("#mask").addClass("active");//css版动画
}

function setImgSrc(obj) {
    var img = new Image();
    img.onload = function () {
        img.onload = null;
        //模拟延迟用
        setTimeout(function () {
            $(obj).get(0).src = $(obj).data("src");
        }, 1000);
    };
   console.log($(obj).data("src"));
    img.src = $(obj).data("src");
}

function displayImage(obj) {
    var path = $(obj).data('img');
    if (!path) {
        return;
    }
    var img = new Image();
    img.onload = function () {
        img.onload = null;
        $(obj).css({
            backgroundImage: 'url(' + path + ')'
        });
        $(obj).text("");
    };
    img.src = path;
}
function stopEventBubble(e) {
    var evt = e || window.event;
    evt.stopPropagation ? evt.stopPropagation() : (evt.cancelBubble = true);
    e.preventDefault();
}
