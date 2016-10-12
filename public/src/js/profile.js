$('.profile-tab .row').on('click','.column',function(){
    $(this).addClass('sel').siblings().removeClass('sel');
    var tabName=$(this).data('tab');
    $('.'+tabName).addClass('sel').siblings().removeClass('sel');
    var url = location.pathname+'#'+tabName;
    history.replaceState({title:'switch',url:url,otherKey:''},'',url);
});
(function(){
    var tabName=location.hash.substr(1)||'purchases';
    $('.'+tabName).addClass('sel').siblings().removeClass('sel');
    $('.column[data-tab='+tabName+']').addClass('sel').siblings().removeClass('sel');
    loadOrderList();
    loadUserInfo();
    loadPayInfo();
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
paytime: "2016-09-20 15:50:50",
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
paytime: "2016-09-20 15:50:50",
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
paytime: "2016-09-20 15:50:50",
discount: "",
need_pay: "0",
created_at: "2016-09-20 15:50:50",
updated_at: "2016-09-20 15:50:50"
}
]
};
    // ajax('/user/order',data,function(r){

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
    ajax('/user/pay_info',{},function(r){
        if(typeof r.id !='undefined'){
            $('#paybtn').text('Save')
            $('#cardnumber').val(r.card_number);
            $('#valid_date').val(r.valid_thru);
            $('#cvc').val(r.cvc);     
        }else{
            $('#paybtn').text('Add  New  Card')
        }        
    },function(r){
            
    });
}
function loadUserInfo(){
    
    // ajax('/user/info',{},fillForm);
    fillForm();
    function fillForm(r){
         $('#firstname').val('jhon');   
         $('#lastname').val('klin');  
         $('#email').val('xxxxx@xxx.com');  
         $('#phone').val('xxxxxxxxxxx');  
         $('#height').val('133');  
         $('#weight').val('212');  
         $('#shoes_size').val('44');
         var selIndex=1;
         $('#gender')[0].selectedIndex=selIndex;
    }
}
function updatePayInfo(){
      var data={};
     // ajax('/user/update_pay_info',data,function(r){

    //  });
}
function changePwd(){
      var data={
          old_password:$('#oldpwd').val(),
          password:$('#newpwd').val(),
          password_confirmation:$('#cfmpwd').val()
      };
      console.log(data);
     ajax('/user/init_password',data,function(r){
         if(r.message=='success'){
             alert('your password has been modified  successfully');
         }else{
             alert('Password modification failed ')
         }
     },function(){
         alert('Password modification failed ')
     });      
}
function updateUserInfo(){
     var data={
          gender:'',
          phone:'',
          height:'',
          weight:'',
          shoes_size:'',
          name:'',
      };
     // ajax('/user/info/update',data,function(r){

    //  });   
    
}
function resetPwd(){ 
    alert('暂缺少接口');
}
function ajax(url,data,succb,errcb,method){
    var method=method||'GET';
    $.ajax({
              url:url,
              type:'GET',
              data:data,
              success:function(r){
                if(typeof succb === 'function'){
                    succb(r);
                }
              },
              error:function(err){
                 if(typeof errcb === 'function'){
                    errcb(err);
                }    
              }
    })
}

