<link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}style/style.css"/>
<?php echo $this->view->getPartial('common/nav'); ?>
	<div class="container">
		<div class="boxCont">
			<div class="logRgt_box">
				<table class="inpBox">
					<tr>
						<th class="ico_tel"><span></span></th>
						<td><input type="text" name="username" placeholder="请输入用户名(6-16位数字字母组合)" class="inpStyle"></td>
					</tr>
					<tr>
						<th class="ico_psw"></th>
						<td><input type="password" name="password" placeholder="请输入登录密码（6-22位数字字母组合密码）" class="inpStyle"></td>
					</tr>
					<tr>
						<th class="ico_psw_two"><span></span></th>
						<td class="pst_rlt"><input type="password" name="confirm_password" placeholder="请再次输入密码" class="inpStyle"></td>
					</tr>
					<tr>
						<th class="ico_code"><span></span></th>
						<td style="padding-top: 0">
							<input class="inpStyle validcode" type="number" name="validcode" placeholder="请输入验证码" oninput="if(value.length>4) value=value.slice(0,4)">
							<span><img id="regvc" onclick="refresh_code()" src="/common/valicate/regvc"></span>
						</td>
					</tr>
					<tr>
						<th></th>
						<td class="pdT_hd"><button class="btnStyle btnGreen" id="do_register">立即注册</button></td>
					</tr>
					<tr>
						<th></th>
						<td><button class="btnStyle" onclick="window.location.href='/user/login'">立即登录</button></td>
					</tr>
					<tr>
						<th></th>
						<td><button class="btnStyle" onclick="window.location.href='/'">返回首页</button></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript" src="{{ constant('JS_URL') }}user/register.js"></script>
