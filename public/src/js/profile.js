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
    
    ajax('/user/order',data,function(r){

        if(r.message=='success'){
            let tpl='';
             r.orders.forEach((v,k)=>{
                    tpl+=`<div class="row list-item">
                        <div class="six wide column">
                            <div class="ui middle aligned list">
                                <div class="item">
                                    <img class="ui large image" src="/images/course/1.png">
                                    <div class=" content">
                                    <a class="header">${v.name}</a>
                                    <div class="description">${v.description}</div>
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
    })
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
    
    ajax('/user/info',{},fillForm);
    fillForm();
    function fillForm(r){
        if(r.message=='success'){
            $('#firstname').val(r.name);   
            $('#lastname').val('lack');  
            $('#email').val('lack');  
            $('#phone').val(r.phone);  
            $('#height').val(r.height);  
            $('#weight').val(r.weight);  
            $('#shoes_size').val(r.shoes_size);
            var selIndex=r.gender=='男'?0:1;
            $('#gender')[0].selectedIndex=selIndex;
        }else{
            alert(r.message);
        }         
    }
}
function updatePayInfo(){
      var data={
          card_number:$('#cardnumber').val(),
          valid_thru:$('#valid_date').val(),
          cvc:('#cvc').val()
      };
     ajax('/user/update_pay_info',data,function(r){
         alert('update successfully!');
         $('#paybtn').text('Save');
     });
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
          gender:$('#gender option:selected').val(),
          phone:$('#phone').val(),
          height:$('#height').val(),
          weight:$('#weight').val(),
          shoes_size:$('#shoes_size').val(),
          name:$('#firstname').val(),
     };
     ajax('/user/info/update',data,function(r){
            if(r.message=='success'){
                alert('Your information has been updated successfully');
            }else{
                alert('sorry,something went wrong');
            }
     });      
}
function resetPwd(){
    //TODO:  loacation to resetPage to send mail 
    
    // location.href='/resetPwd?cf=sendmail'
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

