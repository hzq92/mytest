<link rel="stylesheet" type="text/css" href="{{ constant('CSS_URL') }}style/style.css"/>
	<div class="imgBox"><img src="{{ constant('IMG_URL') }}topImg_login.png" alt=""></div>
	<div class="boxCont">
		<div class="logRgt_box">
			<table class="inpBox">
				<tr>
					<th class="ico_user"><span></span></th>
					<td><input type="text" name="username" placeholder="请输入用户名" class="inpStyle"></td>
				</tr>
				<tr>
					<th class="ico_psw"></th>
					<td><input type="password" name="password" placeholder="请输入密码" class="inpStyle"></td>
				</tr>
				<tr>
					<th class="ico_code"></th>
					<td style="padding-top: 0">
						<input class="inpStyle validcode" type="number" name="validcode" placeholder="请输入验证码" oninput="if(value.length>4) value=value.slice(0,4)">
						<span><img id="logvc" onclick="refresh_code()" src="/common/valicate/logvc"></span>
					</td>
				</tr>
				<tr>
					<th></th>
					<td class="pdT_hd"><button name="login" class="btnStyle btnGreen">登录</button></td>
				</tr>
				<tr>
					<th></th>
					<td><button class="btnStyle" onclick="window.location.href='/user/regist'">注册</button></td>
				</tr>
				<tr>
					<th></th>
					<td><button class="btnStyle" onclick="window.location.href='/'">返回首页</button></td>
				</tr>
			</table>
			<p class="psw_txt"><a href="#">忘记密码？点此修改密码</a></p>
		</div>
	</div>
	<script type="text/javascript" src="{{ constant('JS_URL') }}user/login.js"></script>
	</body>
</html>