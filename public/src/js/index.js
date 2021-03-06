if (window.screen && screen.width) {
    window.screenSize = screen.width > 767 ? 'PC' : 'MOBILE';
} else {
    window.screenSize = 'PC';
}
$(window).scroll(function () {
    if (window.screenSize == "MOBILE") return;
    if (document.body.scrollTop > 30) {
        $('.following.bar').addClass('light');
        $('.menu').removeClass('inverted');
    } else {
        $('.following.bar').removeClass('light');
        $('.menu').addClass('inverted');
    }
})

$('.search-bar').on('click', '.search-btn', function () {
    var text = '';
    if (window.screenSize == "PC") {
        text = $(this).siblings('.four.wide').find('input[name=country]').val();
    } else {
        text = $(this).siblings('.ten.wide').find('input[name=country]').val();
    }
    search(text);
    if (text) {
        ga('send', 'event', 'search_click', 'content:' + text, '');
    } else {
        ga('send', 'event', 'search_click', 'content:' + 'null', '');
    }

})
$('.second-sec').on('click', '.ui.list .item', function () {
    var title = $(this).parent().siblings('.ui.header').text();
    var linkText = $(this).text();
    ga('send', 'event', 'course_click', 'title:' + title + ',content:' + linkText, '');
})
$('.third-sec').on('click', '.card', function () {
    var hotName = $(this).find('.content .ui.header').text();
    ga('send', 'event', 'hotSpot_click', 'hotSpot_name:' + hotName, '');
})
$('.fourth-sec').on('click', '.ui.image', function () {
    var popularName = $(this).find('.content .ui.header').text();
    ga('send', 'event', 'popularSpot_click', 'popularSpot_name:' + popularName, '');
})
$('.more-course').on('click', function () {
    ga('send', 'event', 'seeMoreCourse_click', '', '');
})
$('.more-destination').on('click', function () {
    ga('send', 'event', 'seeMoreDestination_click', '', '');
})
$('.ui.mini.teal.button').on('click', function (e) {
    ga('send', 'event', 'contant_us_click', '', '');
    e.preventDefault();
})

$(function () {
        var destDOM = $('.ui.dropdown.destination');
        destDOM.dropdown({
            direction: 'updown',
            transition: 'slide down',
            allowAdditions: false,
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
            className: 'date-pick',
            isDisabled: "0" // isDisabled为可选参数，“0”表示今日之前不可选，“1”标志今日之前可选
        });
        $('.search-bar input.search').on('input propertychange', function () {
            destDOM.addClass('loading');
            var _this = $(this),
                word = _this.val(),
                itemStr = '';
            $.getJSON('/destination', {
                word: word
            }, function (r) {
                destDOM.removeClass('loading');
                if ((r instanceof Array) && r.length > 0) {
                    $(r).each(function (k, v) {
                        itemStr += '<div class="item" data-value="' + v + '">' + v + '</div>';
                    })
                    _this.siblings('.menu').html(itemStr);
                    destDOM.dropdown('refresh');
                }
            })
        })
        $('.user.ui.dropdown').dropdown({
            on: 'hover',
            action: function () {},
        });

    })
    //signin,signup

$('.more-destination').on('click', '.ui.button', seeMoreDestination);

function search(dest) {
    var dateS = $('.search-bar .from').find('input').val();
    var dateE = $('.search-bar .to').find('input').val();
    var passenger = $('.search-bar .passengers').find('input').val();
    if (!dest && !dateS && !dateE && !passenger) {
        alert('please choose one option for search at least ~');
    } else {
        location.href = '/search?destination=' + dest + '&date_start=' + dateS + '&data_end=' + dateE + '&passenger=' + passenger;
    }
}

function seeMoreDestination() {
    var $this = $(this);
    $.ajax({
        url: '/popular/more',
        type: 'GET',
        data: {},
        success: function (r) {
            var tpl = ''
            r.forEach((v, k) => {
                tpl += `<a class="card" href="${v.url?v.url:'#'}">
                    <div class="ui  image">
                      <div class="ui dimmer visible active">
                        <div class="content">
                          <div class="center">
                            <div class="ui header">${v.desc}</div>
                          </div>
                        </div>
                      </div>
                      <img src="${v.image_url}">
                    </div>
                </a>`;
            })
            $('.third-sec .cards').append(tpl);
            $this.remove();
        },
        error: function (err) {

        }
    })
}

