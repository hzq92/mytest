<?php echo $this->view->getPartial('common/nav'); ?>
	<div class="container">
		<div class="orderBox orderList">
			<dl class="orderTxt">
				<dt><span class="fr colf60">已完成</span>订单编号：20170625114</dt>
				<dd>
					<p>下单时间：2017-06-15  21:59:42</p>
					<p>付款时间：2017-06-15  21:59:58</p>
					<p>发货时间：2017-06-16  07:21:37</p>
					<p>成交时间：2017-06-26  07:21:42</p>
				</dd>
			</dl>
			<dl class="txtInfo">
				<dt>糖默默<span class="tel">13812341234</span></dt>
				<dd>
					<p>福建省  厦门市  思明区  望海路17号楼之二 403室</p>
					<p>361000</p>
				</dd>
			</dl>
			<div class="infoPro">
				<ul>
					<li>
						<div class="pic"><img src="{{constant('IMG_URL')}}pro01.jpg" alt=""></div>
						<div class="infoTxt">
							<h3 class="infoTtl">新果烟台红富士苹果 产地现摘正宗新鲜苹果5斤包邮</h3>
							<p class="infoPrice"><span class="fr">1</span><span class="colGray">单价：</span><span class="price colBlack">￥12</span></p>
						</div>
					</li>
					<li class="t_r">共1件商品  合计：<span class="priceBlack">￥12.80</span></li>
					<li>
						<button class="btn_green">退货</button>
					</li>
				</ul>
			</div>
			<div class="infoPro">
				<ul>
					<li><span class="fr">支付宝</span>支付方式</li>
					<li><span class="fr">￥12.80</span>商品金额</li>
					<li><span class="fr">￥00.00</span>运费</li>
					<li class="t_r pay">实付款：<span class="price">￥12.80</span></li>
				</ul>
			</div>
		</div>
	</div>
<?php echo $this->view->getPartial('common/footer'); ?>
		