window.verify = {
    username: /^[a-zA-Z0-9_-]{6,16}$/,
    password: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,22}$/,
    qq: /^[1-9][0-9]{5,11}$/,
    email: /^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/,
    tel: /^(13[0-9]|15[012356789]|17[0678]|18[0-9]|14[57])[0-9]{8}$/
};

$(function () {
    var parentSelector = '.inpBox ';
    $('#do_register').bind('click',function () {
        var username,password,confirm_password,validcode = '';
        username = $.trim($(parentSelector + " [name=\"username\"]").val());
        password = $.trim($(parentSelector + " [name='password']").val());
        confirm_password = $.trim($(parentSelector + " [name='confirm_password']").val());
        validcode = $.trim($(parentSelector + " [name='validcode']").val());

        if (username == '' || username.length == 0 ){
            layer.alert('用户名不能为空',{title:"温馨提示:"});
            return false;
        }

        if (!(window.verify['username'].test(username))){
            layer.alert('用户名格式不正确',{title:"温馨提示:"});
            return false;
        }

        if (password == '' || password.length == 0){
            layer.alert('用户密码不能为空',{title:"温馨提示:"});
            return false;
        }

        if (!(window.verify['password'].test(password))){
            layer.alert('密码格式不正确',{title:"温馨提示:"});
            return false;
        }

        if (confirm_password != password ){
            layer.alert('两次密码不一致',{title:"温馨提示:"});
            return false;
        }

        if (validcode == '' || validcode.length!= 4){
            layer.alert('请输入正确的验证码',{title:"温馨提示:"});
            return false;
        }

        var param = {
            username: username,
            password: password,
            confirm_password: confirm_password,
            validcode_reg: validcode
        }

        $.ajax({
            url : '/user/regist',
            type : 'post',
            dataType : 'json',
            data : param,
            timeout : 5000,
            success : function(data){
                if (data.state == 1){
                    layer.alert(data.msg,{title:"温馨提示:"},function (e) {
                        window.location.href = '/user/login';
                    });
                }else{
                    layer.alert(data.msg,{title:"温馨提示:"});
                    $("#regvc").click(); //模拟点击，刷新验证码
                }
            }
        })

    })

})

function refresh_code() {
    $("#regvc").attr('src','/common/valicate/regvc/4/NUMBER/66/44/16/14/15?t=' + Math.random());
}
