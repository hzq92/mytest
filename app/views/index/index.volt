<?php echo $this->view->getPartial('common/nav'); ?>
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
                <img src="{{ constant('IMG_URL') }}pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
        <li>
            <a href="#" class="proInfo">
                <img src="{{ constant('IMG_URL') }}pro01.jpg" alt="">
                <span class="proTxt">苹果水果新鲜山西壶口...</span>
            </a>
            <span class="price">￥29.00</span>
            <a href="#" class="shopCart"></a>
        </li>
    </ul>
</div>

<?php echo $this->view->getPartial('common/footer'); ?>
