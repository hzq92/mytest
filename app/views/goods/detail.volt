<?php echo $this->view->getPartial('common/nav'); ?>

<div class="container">
	<div class="proInfoItem">
		<div class="proPic"><img src="{{ constant('IMG_URL') }}pro03.jpg" alt=""></div>
		<div class="proItemTxt">
			<h3>杨梅新鲜东魁杨梅特产水果3斤产地直销</h3>
			<p class="colf60">【口感酸酸甜甜，顺丰空运，坏果包赔】</p>
			<p class="proDel"><del>市场价：￥288</del></p>
			<p>商城价：<span class="price">￥146.00</span> 菜票（代金券）<span class="price">+120积分</span></p>
			<p class="proSpec"><span>规格：</span><a href="javascript:void(0);">300g/盒</a><a href="javascript:void(0);">500g/盒</a></p>
			<div class="numberBox">
				<span>数量：</span>
				<!-- <div class="numbBox">
					<button class="btn_minus">-</button>
					<input type="text" name="" value="" maxlength="2">
					<button class="btn_add">+</button>
				</div> -->
				<input type="text" class="spinnerExample"/>
			</div>
			<div class="btnBox">
				<button class="btn_orange">立即购买</button><button class="btn_green">加入购物车</button>
			</div>
		</div>
	</div>
	<div class="proDetail">
		<h3 class="ttl">商品详情</h3>
		<p><img src="{{ constant('IMG_URL') }}pro03.jpg" alt=""></p>
		<p><img src="{{ constant('IMG_URL') }}pro03_1.jpg" alt=""></p>
	</div>
</div>

<?php echo $this->view->getPartial('common/footer'); ?>