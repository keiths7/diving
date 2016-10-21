
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
$('.row.images').on("click",".ui.image",imgClick);
$("#pptclose").on("click", destoryPowPoint);
$(function(){
    
 (function(){

      $('.cc-postalcode').payment('restrictNumeric');
      $('.cc-number').payment('formatCardNumber');
      $('.cc-exp').payment('formatCardExpiry');
      $('.cc-cvc').payment('formatCardCVC');

      $.fn.toggleInputError = function(erred) {
        this.parent('.field').toggleClass('invalid', erred);
        return this;
      };
        var $form = $('#payment-form');
        $form.submit(function(e) {
            e.preventDefault();
            var cardType = $.payment.cardType($('.cc-number').val());
            $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
            $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
            $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
            // $('.cc-brand').text(cardType);  //显示卡类型
            if($('.field.invalid').length>0){
                showError('Your input is incorrect!');
                return false;
            }else{
               // Disable the submit button to prevent repeated clicks:
                $form.find('.submit').prop('disabled', true);
                // Request a token from Stripe:
                Stripe.card.createToken($form, stripeResponseHandler);
                // Prevent the form from being submitted:
                return false;     
            }
            
        });
        function stripeResponseHandler(status, response) {
            // Grab the form:
            var $form = $('#payment-form');

            if (response.error) { // Problem!
                // Show the errors on the form:
                showError(response.error.message);
                $form.find('.submit').prop('disabled', false); // Re-enable submission
            } else { // Token was created!
                // Get the token ID:
                var token = response.id;
                // Insert the token ID into the form so it gets submitted to the server:
                $form.append($('<input type="hidden" name="stripeToken">').val(token));
                // Submit the form:
                $form.get(0).submit();
            }
        };
        function showError(text){
            $('.payment-errors').text(text).show();
            setTimeout(function() {
                $('.payment-errors').hide();
            }, 3000);
        }
 })();
    
    $('.date-pick').kuiDate({
        className:'date-pick',
        isDisabled: "0"  // isDisabled为可选参数，“0”表示今日之前不可选，“1”标志今日之前可选
    });
})
var myScroll,imgcount=0,curpage=0;
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

// function setImgSrc(obj) {
//     var img = new Image();
//     img.onload = function () {
//         img.onload = null;
//         //模拟延迟用
//         setTimeout(function () {
//             $(obj).get(0).src = $(obj).data("src");
//         }, 1000);
//     };
//    console.log($(obj).data("src"));
//     img.src = $(obj).data("src");
// }

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

    