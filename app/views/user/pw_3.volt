<link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}user/style.css"/>
<?php echo $this->view->getPartial('common/nav'); ?>
	<div class="container">
		<div class="boxCont">
			<ul class="logRgt_step">
			  <li class="active"><span><span class="logRgt_num">1</span><span class="logRgt_txt">验证身份</span></span></li>
			  <li class="active"><span><span class="logRgt_num">2</span><span class="logRgt_txt">重置密码</span></span></li>
			  <li class="active"><span><span class="logRgt_num">3</span><span class="logRgt_txt">重置成功</span></span></li>
			</ul>
			<div class="payInfo">
				<span class="ico_success"></span>
				<p>恭喜您，密码修改成功！</p>
				<button class="btn_gray">返回首页</button>
			</div>
		</div>
	</div>