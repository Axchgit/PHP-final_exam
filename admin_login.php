<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/navigation.css"/>

<!--<html>
	<head>
		<meta charset="utf-8" />
		<title>管理员页面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >-->
<?php include('css/header_admin.php') ?>
			
	    <!--<div class="nav">
	    	
		<a class="left " href="admin_add.php"  >管理员注册</a>
		
	
		<a class="left" href="user_add.php">用户注册</a>
		<a class="left " href="user_message.php">用户列表</a>
		<a class="left " href="select_user.php">用户查询</a>
		<a href="user_login.php"></a>
		<a class="right" href="admin_logout.php">退出登录</a>
		<div style="clear: both;"></div>
		</div>
	</body>
</html>-->
<link href="css/style.css" type="text/css" rel="stylesheet" />

<form name="logn"  method="post">
	<div class="ah1">
	<h1 >	<span  style="color: rgb(69,137,148);text-align: center;">管理员登录</span></h1>
	<hr color="#008B8B">
	<p><span class="sp1">用户名：</span><span class="sp2"><input name="user" type="text"  size="30"></span></p>
	<p><span class="sp1">密码：</span><span class="sp2"><input name="pwd" type="password"></span></p>
	<p><span class="sp3"><input name="dl" class="bt1" type="submit" value="登录"></span></p>
	</div>
</form>


<?php
	session_start();
	
if(isset($_POST['dl'])){

	include 'conn/dbpdo.php';
	$u=$_POST['user'];
	$p=$_POST['pwd'];
		$_SESSION['admin']=$u;
    $sql="select name,password from admin_message where name='{$u}' and password='{$p}'";
    $result=$pdo->query($sql);
		
	if($result->rowCount()>0){
	header("location:admin_index.php");
		echo "<script>alert('登录成功');document.location.href='';</script>";
	
	
	}else{
		echo "<script>alert('登录不成功');</script>";
	}
	
	
}

?>