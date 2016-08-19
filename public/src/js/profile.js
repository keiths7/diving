$('.profile-tab').on('click','.column',function(){
    $(this).addClass('sel').siblings().removeClass('sel');
    var tabName=$(this).data('tab');
    $('.'+tabName).addClass('sel').siblings().removeClass('sel');
})