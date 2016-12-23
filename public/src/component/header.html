<header class="ui following bar sticky" id="P_header" style="display:none">
    <div class="blurring-bg indexshow"></div>
    <div class="ui  menu" data-class="ui  large secondary network menu inverted">
        <div class="item">
            <div class="ui logo shape">
                <div class="sides">
                    <a class="active ui side" href="/">
                        <img class="ui  image light" src="/images/logo.png">
                        <img class="ui  image black" src="/images/logo-black.png">
                    </a>
                </div>
            </div>
        </div>
        <div class="item indexhide" style="display: none">
            <div class="ui transparent left icon input">
                <input type="text" placeholder="Search..." id="top_search_input">
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
<div class="ui small modal" style="z-index:1999" id="P_messagebox">
</div>
<script>
    var msgHtml = '',activeModal=$('.ui.modal').eq(0);
    $(function () {
        initHeader();
        $('.user.ui.dropdown').dropdown({
            on: 'hover',
            action: function () {},
        });
        $('.ui.modal').on('click', '.signin-button', signIn)
        $('.ui.modal').on('click', '.signup-button', signUp);
        $('#top_search_input').on('keydown', function (e) {
            if (e.keyCode == 13) {
                var val = $(this).val().trim();
                if (val) {
                    var href = /destination\=\w*/.test(location.href) ?
                        location.href.replace(/destination\=\w*/, 'destination=' + $(this).val()) :
                        '/search?destination=' + $(this).val()
                    location.href = href;
                }
            }
        })

        msgHtml =
            '<div class="ui {status} message" style="z-index:1999;width:60%;margin:0 auto;">\
                <i class="close icon"></i>\
                <div class="header">\
                    {content}\
                </div></div>';
    })

    function messageAlert(content,err) {
        var status=err==='err'?'negative':'success';
        var html=renderToString(msgHtml,{status:status,content:content});
        var modalParent=$('.ui.dimmer.modals.page')
        modalParent.prepend(html).fadeIn();
        modalParent.find('.ui.message .close').on('click',function(){
            modalParent.find('.ui.message').remove();
        })
        setTimeout(function(){
            modalParent.find('.ui.message').remove();
        },3000)
    }

    function renderToString(str, json, regexp) {
        return str.replace(regexp || /\\?\{([^{}]+)\}/g, function (match, name) {
            return (json[name] === undefined) ? '' : json[name];
        });
    }

    function initHeader() {
        checkLogin(function () {
            $('#P_header').fadeIn();
        })
        if ($('#diving').length > 0) {
            $('.indexshow').show();
            $('header .ui.menu').attr('class', $('header .ui.menu').data('class'));
            $('#P_header').addClass('index')
        } else {
            $('.indexhide').show();
        }
    }

    function checkLogin(cb) {
        $.ajax({
            url: '/user/islogin',
            type: 'GET',
            dataType: 'json',
            success: function success(r) {
                console.log(r);
                if (r.message === "yes") {
                    $('header.ui.bar  .right.menu').addClass('signed');
                    $('header.ui.bar  .right.menu .text').text(r.user.name);
                    $('.ui.modal.login-dialog').modal('hide');
                } else {
                    $('header.ui.bar  .right.menu').addClass('unsigned');
                }
                cb && cb();
            },
            error: function error(err) {
                messageAlert('Sorry,the server was wrong','err');
            }
        });
    }

    function signIn() {
        var email = $('#signin-email-input').val(),
            password = $('#signin-password-input').val();
        if (email && password) {

            $.ajax({
                url: '/user/login',
                type: 'GET',
                data: {
                    email: email,
                    password: password
                },
                dataType: 'json',
                success: function success(r) {
                    console.log(r);
                    if (r.message == "success") {
                        messageAlert('login succeed','suc');
                        setTimeout(function() {
                            $('header.ui.bar  .right.menu').addClass('signed');
                            $('header.ui.bar  .right.menu .text').text(r.user.name);
                            $('.ui.modal.login-dialog').modal('hide');
                            $('.ui.dimmer.modals.page').find('.ui.message').remove();
                        }, 1000);
                    } else {
                        messageAlert(r.message,'err');
                    }
                },
                error: function error(err) {
                    messageAlert('Sorry,the server was wrong','err');
                }
            });
        } else {
            messageAlert('Please fill in all options ~','err');
        }
    }

    function signUp() {
        var email = $('#signup-email-input').val(),
            password = $('#signup-password-input').val(),
            name = $('#signup-name-input').val(),
            password_confirmation = $('#signup-confirm-password-input').val();
        if (email && password && name && password_confirmation) {
            $.ajax({
                url: '/user/register',
                type: 'GET',
                data: {
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                    name: name
                },
                dataType: 'json',
                success: function success(r) {

                    console.log(r);
                    if (r.message == 'success') {
                        messageAlert('registration succeeded!','suc');
                        signInAlert();
                    } else {
                        messageAlert(r.message,'err');
                    }
                },
                error: function error(err) {
                    messageAlert('Sorry,the server was wrong','err');
                }
            });
        } else {
            messageAlert('Please fill in all options ~','err');
        }
    }

    function signOut() {
        $.ajax({
            url: '/user/logout',
            type: 'GET',
            dataType: 'json',
            success: function success(r) {
                console.log(r);
                $('header.ui.bar  .right.menu').removeClass('signed');
                messageAlert('logout succeeded','suc')
            },
            error: function error(err) {
                messageAlert('Sorry,the server was wrong','err');
            }
        });
    }

    function signInAlert() {

        $('.ui.modal.login-dialog').modal({
            blurring: true,
            transition: 'fade up'
        }).modal('show');
        activeModal=$('.ui.modal.login-dialog');
    }

    function signUpAlert() {
        $('.ui.modal.signup-dialog').modal({
            blurring: true,
            transition: 'fade up'
        }).modal('show');
       activeModal= $('.ui.modal.signup-dialog');
    }
</script>