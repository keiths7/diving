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
    loadOrderList();
}())

$('.forms-wrap ').on('click','.payment .ui.submit.button',updatePayInfo);
$('.forms-wrap ').on('click','.setting .ui.submit.button',changePwd);
$('.forms-wrap ').on('click','.profile .ui.submit.button',updateUserInfo);
//reset页重置密码
function loadOrderList(){
    var data={};
    var r={
code: 0,
message: "success",
orders: [
{
id: 1,
pid: 1,
uid: 1,
type: 0,
start_date: "2016-09-21",
end_date: "2016-09-21",
divers: 1,
money: 0,
is_paid: 0,
paytime: "",
discount: "",
need_pay: "0",
created_at: "2016-09-20 15:50:50",
updated_at: "2016-09-20 15:50:50"
},{
id: 1,
pid: 1,
uid: 1,
type: 0,
start_date: "2016-09-21",
end_date: "2016-09-21",
divers: 1,
money: 0,
is_paid: 0,
paytime: "",
discount: "",
need_pay: "0",
created_at: "2016-09-20 15:50:50",
updated_at: "2016-09-20 15:50:50"
},
{
id: 1,
pid: 1,
uid: 1,
type: 0,
start_date: "2016-09-21",
end_date: "2016-09-21",
divers: 1,
money: 0,
is_paid: 0,
paytime: "",
discount: "",
need_pay: "0",
created_at: "2016-09-20 15:50:50",
updated_at: "2016-09-20 15:50:50"
}
]
};
    // ajax(data,function(r){

        if(r.message=='success'){
            let tpl='';
             r.orders.forEach((v,k)=>{
                    tpl+=`<div class="row list-item">
                        <div class="six wide column">
                            <div class="ui middle aligned list">
                                <div class="item">
                                    <img class="ui large image" src="/images/course/1.png">
                                    <div class=" content">
                                    <a class="header"> destination name(lack of api data)</a>
                                    <div class="description">the description(lack of api data)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="two wide column ">${v.money}</div>
                        <div class="three wide column">${v.paytime}</div>
                        <div class="three wide column">Save</div>
                        <div class="two wide column"><i class="edit icon"></i></div>
                    </div>`;
             })
             $('.forms-wrap').find('.purchases .ui.grid').append(tpl);
        }
       
    // })
}
function loadPayInfo(){

}
function loadUserInfo(){

}

function updatePayInfo(){

}
function changePwd(){

}
function updateUserInfo(){

}
function resetPwd(){ 
    alert('暂缺少接口');
}
function ajax(data,succb,method){
    var method=method||'GET';
    $.ajax({
              url:'/search/get_more',
              type:'GET',
              data:data,
              success:function(r){
                if(typeof succb === 'function'){
                    succb(r);
                }
              },
              error:function(err){
                 if(typeof succb === 'function'){
                    errcb(err);
                }    
              }
    })
}

