<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>页面君走丢了！</title>
    <meta charset="UTF-8">
</head>

<body>
<div id="errorpage">
    <div class="tfans_error">
        <div class="logo"></div>
        <div class="errortans clearfix">
            <div class="e404">
                <span>404</span>
            </div>
            <p><b>页面不存在！</b></p>
            <p>请联系管理员!(ERROR_CODE:404)</p>
            <div class="bt" ><a href="/">返回首页</a></div>
        </div>
    </div>
</div>

</body>
<style>
    body{margin:0;font:14px/1.5 "Microsoft Yahei","Hiragino Sans GB",sans-serif;background-color:#fff}
    a{color:#3d3d3d;text-decoration:none}
    /*错误页面*/
    #errorpage{width:600px;text-align: center;padding: 80px 0;margin:15% auto;height:360px;}
    #errorpage .pinknum{color: #fe3a3b;}
    #errorpage p{font-size: 18px;font-weight: bold;padding-top: 30px;}
    #errorpage .greyspan{color: #999;}
    #errorpage i{font-size: 72px;color: #ccc;}
    #errorpage .errorsug{margin: 12px auto 62px;text-align: left;display: inline-block;*display: inline;}
    #errorpage .errorsug p{font-size: 14px;padding-top: 6px;text-indent: 15px;}
    #errorpage .bt a{background: #fe3a3b;padding: 9px 46px 11px;*padding: 7px 24px 9px;color: #fff;border: 0;font-size: 14px;}

    #errorpage .tfans_error .tfans{float: left;}
    #errorpage .tfans_error .errortans{margin: 0;text-align: left;float: left;z-index: 5;height: 300px;position: relative;padding: 80px 0 0 24px;}
    #errorpage .tfans_error .errortans .ter{position: absolute; left: 155px; top: 10px; z-index: 3; }
    #errorpage .tfans_error .errortans p{font-weight: normal;z-index: 10;position: relative;}
    #errorpage .tfans_error .errortans p b{font-size: 38px; }
    #errorpage .tfans_error .errortans div{margin-top: 30px; }
    #errorpage .tfans_error .errortans div button{font-size: 17px; padding: 3px 42px 5px; border-radius: 3px; }

    #errorpage .logo{display: inline-block;float: left;height:303px; width:256px;background: url("{{ constant('IMG_URL') }}errors/tfans.jpg");}
    #errorpage .info{display: inline-block;float: left;position: relative;}
    #errorpage .e404{display: inline-block;position:absolute;top: -60px;left: 145px;;height:164px; width:150px;background: url("{{ constant('IMG_URL') }}errors/error_msg.png");text-align: center;font-size: 5em;color: #ffffff}
    #errorpage .e404 span{
        display: block;
        margin-top: 18px;
    }

</style>
</html>
