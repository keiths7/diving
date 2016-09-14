$('.profile-tab .row').on('click','.column',function(){
    $(this).addClass('sel').siblings().removeClass('sel');
    var tabName=$(this).data('tab');
    $('.'+tabName).addClass('sel').siblings().removeClass('sel');
    var url = location.pathname+'#'+tabName;
    history.replaceState({title:'switch',url:url,otherKey:''},'',url);
});
(function(){
    var tabName=location.hash.substr(1);
    $('.'+tabName).addClass('sel').siblings().removeClass('sel');
    console.log($('.column[data-tab='+tabName+']'))
    $('.column[data-tab='+tabName+']').addClass('sel').siblings().removeClass('sel');
}())