<?php echo $this->view->getPartial('common/nav'); ?>
	<div class="container h_hd100 pst_total" style="height: 570px;">
		<div class="boxInfo infoPro">
			<div class="addressLink"><a href="#">请填写收获地址</a></div>
			<h3 class="ttl">商品信息</h3>
			<ul>
				<li>
					<div class="pic"><img src="{{constant('IMG_URL')}}pro01.jpg" alt=""></div>
					<div class="infoTxt">
						<h3 class="infoTtl">新果烟台红富士苹果 产地现摘正宗新鲜苹果5斤包邮</h3>
						<p class="infoPrice"><span class="fr">x1</span><span class="price">¥24.90</span><del>￥86</del></p>
					</div>
				</li>
				<li>
					<div class="pic"><img src="{{constant('IMG_URL')}}pro01.jpg" alt=""></div>
					<div class="infoTxt">
						<h3 class="infoTtl">新果烟台红富士苹果 产地现摘正宗新鲜苹果5斤包邮</h3>
						<p class="infoPrice"><span class="fr">x1</span><span class="price">¥24.90</span><del>￥86</del></p>
					</div>
				</li>
				<li><span class="fr">¥49.80</span>价格合计:</li>
				<li><span class="fr">¥0.00</span>运费:</li>
			</ul>
		</div>
		<div class="total">
			<button>提交订单</button>
			<p class="totalPrice">合计：<span class="price">￥97.2.00</span></p>
		</div>
	</div>
<?php echo $this->view->getPartial('common/footer'); ?>