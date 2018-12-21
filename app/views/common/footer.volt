<!--底部菜单栏公用部分-->
<footer id="footer">
        <div class="footer">
            <ul>
                <li {% if current_controller == 'index' %} class="cur" {% endif %}><a href="/">
                        <em class="ico_home"></em>
                        <p>首页</p>
                    </a></li>
                <li {% if current_controller == 'goods' %} class="cur" {% endif %}><a href="/goods/index">
                        <em class="ico_category"></em>
                        <p>分类</p>
                    </a></li>
                <li {% if current_controller == 'order' and current_action == 'index' %} class="cur" {% endif %}><a href="/order/index">
                        <em class="ico_cart"></em>
                        <p>购物车</p>
                    </a></li>
                <li {% if current_controller == 'order' and current_action == 'detail' %} class="cur" {% endif %}><a href="/order/detail">
                        <em class="ico_order"></em>
                        <p>订单</p>
                    </a></li>
                <li><a href="/user/login">
                        <em class="ico_user"></em>
                        <p>个人中心</p>
                    </a></li>
            </ul>
        </div>
    </footer>
<script type="text/javascript">
    $(function () {
//        $('.ico_home').click(function () {
//            alert('首页！！！！！');
//        });
//        $('.ico_category').click(function () {
//            alert('分类！！！！！');
//        });
//        $('.ico_cart').click(function () {
//            alert('购物车！！！！！');
//        });
//        $('.ico_order').click(function () {
//            alert('订单！！！！！');
//        });
//        $('.ico_user').click(function () {
//            alert('个人中心！！！！！');
//        });
    });
</script>
