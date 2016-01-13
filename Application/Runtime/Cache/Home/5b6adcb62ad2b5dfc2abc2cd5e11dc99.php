<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login page</title>
	<link rel="stylesheet" href="/Public/Home/css/login.css">
	<link rel="stylesheet" href="/Public/Home/easyui/themes/default/easyui.css" />
	<script type="text/javascript" src="/Public/Home/easyui/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/Home/easyui/jquery.easyui.min.js"></script>
</head>
<body>
	<div id="loginWrapper">
		<div id="loginPanel" class="easyui-panel" title="login">
			<form action="<?php echo U('Login/submit');?>" method="POST">
			<div class="inputBorder">
				<label class="inputLabel" for="userName"><img src="/Public/Home/img/icons/0.png"></label>
				<input type="text" id="userName" name="username" class="textInput" placeholder="用户名" autofocus="autofocus">
			</div>
			<div class="inputBorder">
				<label class="inputLabel" for="password"><img src="/Public/Home/img/icons/1.png"></label>
				<input type="password" id="password" name="password" class="textInput" placeholder="密码">
			</div>
			<div id="verifyCode" style="margin-left:50px; margin-bottom:20px;">
				请输入验证码：<br/><input type="text" id="vcode" name="vcode" placeholder="验证码"/>
				<img id="vcodeimg" src="<?php echo U('Login/vcode');?>">
				<span id="vcodeurl" style="display:none;"><?php echo U('Login/vcode');?></span>
			</div>
			<div id="loginButton">
				<input id="login" type="submit" value="登&nbsp;&nbsp;&nbsp;&nbsp;录">
			</div>
			<a id="register" href="<?php echo U('Login/registerClick');?>">立即注册</a>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		$("#vcodeimg").bind('click',function(){
			var date = new Date();
			var url = $("#vcodeurl").text();
			url = url + "?action=" + date.getTime();
			$("#vcodeimg").attr('src',url);
		});
	</script>


</body>
</html>