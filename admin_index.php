
<!--
	
	
	暂存文件；
	作用：管理员主页面；
	
	-->








<?php
//include 'conn/verify_admin.php';
?>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<html>
	<head>
		<meta charset="utf-8" />
		<title>管理员页面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
        <?php include('css/header_admin.php') ?>
		<div class="nav">
		<a class="left " href="admin_add.php"  >管理员注册</a>
		<a class="left " href="user_message.php">用户列表</a>
		<a class="left " href="vege_message.php">蔬菜列表</a>
		<a class="left " href="select_user.php">查找用户</a>
		<a class="left " href="select_vege.php">查找蔬菜</a>
	    <a style="color: darkorange;" class="right" href="admin_logout.php">退出登录</a>
	    <!--<a style="color: darkorange;" class="right" href="index.php">返回首页</a>-->
		<div style="clear: both;"></div>
		</div>
	</body>
</html>
