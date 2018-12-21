$(function () {
    var username = '';
    var password = '';
    var logvc = '';
    $('.pdT_hd button[name="login"]').click(function () {
        username = $('.inpBox input[name="username"]').val();
        username = $.trim(username);    //删除首位空格
        password = $('.inpBox input[name="password"]').val();
        password = $.trim(password);
        logvc = $('.inpBox input[name="validcode"]').val();
        logvc = $.trim(logvc);

        // if (username == '' || username == null){
        //     layer.alert('用户名不能为空',{title:"温馨提示:"});
        //     return false;
        // }

        // if (password == '' || password == null){
        //      layer.alert('用户密码不能为空',{title:"温馨提示:"});
        //      return false;
        // }

        // if (logvc == '' || logvc == null){
        //     layer.alert('验证码不能为空',{title:"温馨提示:"});
        //     return false;
        // }

        var param = {
            username : username,
            password : password,
            logvc : logvc
        }

        $.ajax({
            url : "/user/login",
            type : "post",
            dataType : "json",
            data : param,
            timeout : 50000,
            success : function (data) {
                if (data.state == 0){
                    layer.alert(data.msg,{title:"温馨提示:"});
                    $("#logvc").click();
                    return false;
                }
            }
        })
    })
})

function refresh_code() {
    $("#logvc").attr('src','/common/valicate/logvc/4/NUMBER/66/44/16/14/15?t=' + Math.random());
}