<link rel="stylesheet" type="text/css" href="css/navigation.css"/>

<html>
	<head>
		<meta charset="utf-8" />
		<title>管理员页面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
<?php include('css/header_admin.php') ?>
			
	    <div class="nav">
		<a class="left current" href="admin_add.php"  >管理员注册</a>
				<!--<a class="left" href="user_add.php">用户注册</a>-->
		<a class="left " href="user_message.php">用户列表</a>
		<a class="left " href="vege_message.php">蔬菜列表</a>
		<a class="left " href="select_user.php">查找用户</a>
		<a class="left " href="select_vege.php">查找蔬菜</a>
		<a class="right" href="admin_logout.php">退出登录</a>
		<div style="clear: both;"></div>
		</div>
	</body>
</html>

<html>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
<form name="admin_add" method="post">
	<div class="ah1">
	<p>
		<span class="sp1">用户名：
		</span>
	    <span class="sp2">
			<input  name="user" type="text"   >
	    </span>
	</p>
	<p>
		<span class="sp1">密码：</span>
		<span class="sp2">
			<input  name="pwd" type="password">
				
		</span>
	</p>
	<p>
		<span class="sp3">
			<input name="add" class="bt1" type="submit" value="注册">
				
		</span>
	</p>
	</div>
	
</form>
	
</html>	
<?php
include 'conn/dbpdo.php';
include 'conn/verify_admin.php';
if(isset($_POST['add'])){
	$t=$_POST['user'];
	$c=$_POST['pwd'];	
	
	$sql1="insert into admin_message(name,password) values('$t','$c')";
	$sql2="select a.* from admin_message a,(select name,password from admin_message group by name,password having count(*)>1) b where a.name=b.name and a.password=b.password";
	$sql3="DELETE from admin_message
order by id DESC limit 1";
	
	$pdo->query($sql1);
	$r=$pdo->query($sql2);

	if($r->rowCount()>0){
			$pdo->query($sql3);
echo "<script>alert('该账户信息已存在');document.location.href='admin_add.php';</script>";
	}else{
		
		header('location:admin_login.php');
		echo "<script>alert('注册成功');document.location.href='admin_login';</script>";
	}
	
	//$link->close();


}

?>