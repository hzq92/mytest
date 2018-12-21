<link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}user/style.css"/>
<?php echo $this->view->getPartial('common/nav'); ?>
	<div class="container">
		<div class="boxCont">
			<ul class="logRgt_step">
			  <li class="active"><span><span class="logRgt_num">1</span><span class="logRgt_txt">验证身份</span></span></li>
			  <li><span><span class="logRgt_num">2</span><span class="logRgt_txt">重置密码</span></span></li>
			  <li><span><span class="logRgt_num">3</span><span class="logRgt_txt">重置成功</span></span></li>
			</ul>
			<div class="logRgt_box">
				<table class="inpBox">
					<tr>
						<th class="ico_tel"><span></span></th>
						<td><input type="text" name="" placeholder="请输入手机号码" class="inpStyle"></td>
					</tr>
					<tr>
						<th class="ico_code"><span></span></th>
						<td class="pst_rlt"><input type="text" name="" placeholder="请输入验证码" class="inpStyle"><button class="btn_code">发送验证码</button></td>
					</tr>
					<tr>
						<th></th>
						<td class="pdT_hd"><button class="btnStyle btnGreen">下一步</button></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
