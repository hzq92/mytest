<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>farmWap</title>
    <!-- metatags -->
    <meta name="keywords" content="网页关键字" />
    <meta name="description" content="网页描述文字" />
    <!-- **** Viewport **** -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}style/reset.css"/>
    <link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}style/common.css"/>
    <!-- JS -->
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/index.js"></script>
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/jquery.event.drag-1.5.min.js"></script>
    <script type="text/javascript" src="{{ constant('JS_URL') }}scripts/jquery.touchSlider.js"></script>
</head>
<body>
<header id="header">
    <div class="header">
        <h1>首页</h1>
    </div>
</header>
<div class="container">
    <!--banner-->
    <div class="banner">
        <div class="banIcon">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
        </div>
        <div class="banImg">
            <ul>
                <li><img src="{{ constant('IMG_URL') }}banner/banner.jpg" alt=""></li>
                <li><img src="{{ constant('IMG_URL') }}banner/banner2.jpg" alt=""></li>
                <li><img src="{{ constant('IMG_URL') }}banner/banner3.jpg" alt=""></li>
            </ul>
            <a href="javascript:void(0);" id="btn_prev"></a>
            <a href="javascript:void(0);" id="btn_next"></a>
        </div>
    </div>
    <!--banner end-->
    <div class="iconBox">
        <ul>
            <li><a href="#">
                    <em class="icon_ticket"></em>
                    <p>菜票</p>
                </a></li>
            <li><a href="#">
                    <em class="icon_happyFarm"></em>
                    <p>欢乐农场</p>
                </a></li>
            <li><a href="#">
                    <em class="icon_integral"></em>
                    <p>积分</p>
                </a></li>
            <li><a href="#">
                    <em class="icon_sign"></em>
                    <p>签到</p>
                </a></li>
        </ul>
    </div>
    <h2 class="indexTtl"><span>乡亲都在看</span></h2>
    <ul class="proItem">
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}img/pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}img/pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}img/pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}img/pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}img/pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}img/pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
    </ul>
</div>
<footer id="footer">
    <div class="footer">
        <ul>
            <li class="cur"><a href="javascript:void(0);">
                    <em class="ico_home"></em>
                    <p>首页</p>
                </a></li>
            <li><a href="javascript:void(0);">
                    <em class="ico_category"></em>
                    <p>分类</p>
                </a></li>
            <li><a href="javascript:void(0);">
                    <em class="ico_cart"></em>
                    <p>购物车</p>
                </a></li>
            <li><a href="javascript:void(0);">
                    <em class="ico_order"></em>
                    <p>订单</p>
                </a></li>
            <li><a href="javascript:void(0);">
                    <em class="ico_user"></em>
                    <p>我的</p>
                </a></li>
        </ul>
    </div>
</footer>
</body>
</html>