<meta charset="utf-8" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>

	
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<html>
	<head>
		<meta charset="utf-8" />
		<title>用户注册</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
<?php include('css/header_user.php') ?>
			
	<div class="nav">
	<a class="left " href="user_add.php">新用户注册</a>
	<a class="left " href="vege_message_user.php">蔬菜列表</a>
	<a class="left " href="select_vege_user.php">查找蔬菜</a>
	<a class="left " href="user_login.php">其它账户登录</a>		
	<a class="right" href="user_logout.php">退出登录</a>
	<a class="left" href="logout_account.php">注销用户</a>
	<div style="clear: both;"></div>
	</div>	
		
	</body>
</html>
<form name="logn"  method="post">
	<div class="ah1">
	<h1 >	<span  style="color: rgb(69,137,148);text-align: center;">用户登录</span></h1>
	<hr color="#008B8B">	
		
	<p><span class="sp1">ID：</span><span class="sp2"><input name="user" type="text"  size="30"></span></p>
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
		$_SESSION['user']=$u;
    $sql="select run_id,password from users_message where run_id='{$u}' and password='{$p}'";
    $result=$pdo->query($sql);
		
	if($result->rowCount()>0){
	header("location:user_index.php");
		echo "<script>alert('登录成功');document.location.href='';</script>";
	
	
	}else{
		echo "<script>alert('登录不成功');</script>";
	}
	
	
}

?>