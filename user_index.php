
<!--
	
	
	暂存文件；
	作用：用户主页面；
	
	-->








<?php
//include 'conn/verify_user.php';
?>
<link href="css/style.css" rel="stylesheet" type="text/css">	
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<html>
	<head>
		<meta charset="utf-8" />
		<title>用户界面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
<?php include('css/header_user.php') ?>
	<div class="nav">
	<a class="left " href="user_add.php">新用户注册</a>
	<a class="left " href="vege_message_user.php">蔬菜列表</a>
	<a class="left " href="select_vege_user.php">查找蔬菜</a>
	<a class="left" href="user_login.php">其它账户登录</a>		
	<a class="right" style="color: darkorange;" href="logout_account.php">注销用户</a>
	<a class="right" style="color: darkorange;" href="user_logout.php">退出登录</a>
	<div style="clear: both;"></div>
	</div>	
	</body>
</html>
	

		
	
	
