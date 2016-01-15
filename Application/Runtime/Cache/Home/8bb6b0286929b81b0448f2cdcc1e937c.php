<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>register page</title>
	<link rel="stylesheet" href="/ThinkPHP_APP/TP_Message/Public/Home/css/register.css">
	<link rel="stylesheet" href="/ThinkPHP_APP/TP_Message/Public/Home/easyui/themes/default/easyui.css" />
	<script type="text/javascript" src="/ThinkPHP_APP/TP_Message/Public/Home/easyui/jquery.min.js"></script>
	<script type="text/javascript" src="/ThinkPHP_APP/TP_Message/Public/Home/easyui/jquery.easyui.min.js"></script>
</head>
<body>
	<div id="registerWrapper">
		<div id="registerPanel" class="easyui-panel" title="register">
			<form method="post" action="<?php echo U('Register/submit');?>">
			<div class="inputBorder">
				<label class="inputLabel" for="userName"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/icons/0.png"></label>
				<input type="text" name="username" id="userName" class="textInput" placeholder="用户名">
			</div>
			<div class="inputBorder">
				<label class="inputLabel" for="password"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/icons/1.png"></label>
				<input type="password" name="password" id="password" class="textInput" placeholder="密码">
			</div>
			<div class="inputBorder">
				<label class="inputLabel" for="passwordconfirm"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/icons/1.png"></label>
				<input type="password" name="passwordconfirm" id="passwordconfirm" class="textInput" placeholder="确认密码">
			</div>
			<div id="inputBorderSex">
				<div id="sexContent">
					性别：
					男<input type="radio" name="sex" checked="checked" value="man" />
					女<input type="radio" name="sex" value="woman" />
				</div>
			</div>
			<div id="imgWrapper">
				图像：
				<br />
				<label for="radio1"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/1.jpg" alt=""></label>
				<label for="radio2"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/2.jpg" alt=""></label>
				<label for="radio3"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/3.jpg" alt=""></label>
				<label for="radio4"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/4.jpg" alt=""></label>
				<label for="radio5"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/5.jpg" alt=""></label>
				<br />
				<input class="radio" id="radio1" type="radio" checked="checked" name="imgnum" value="1" />
				<input class="radio" id="radio2" type="radio" name="imgnum" value="2" />
				<input class="radio" id="radio3" type="radio" name="imgnum" value="3" />
				<input class="radio" id="radio4" type="radio" name="imgnum" value="4" />
				<input class="radio" id="radio5" type="radio" name="imgnum" value="5" />
			</div>
			<div class="inputBorder">
				<label class="inputLabel" for="webpage"><img src="/ThinkPHP_APP/TP_Message/Public/Home/img/icons/0.png"></label>
				<input type="text" name="webpage" id="webpage" class="textInput" placeholder="webpage">
			</div>
			<div id="registerButton">
				<!-- <a id="register" href="#">注&nbsp;&nbsp;&nbsp;&nbsp;册</a> -->
				<input id="register" type="submit" value="注&nbsp;&nbsp;&nbsp;&nbsp;册" />
			</div>
			</form>
		</div>
	</div>
</body>
</html>