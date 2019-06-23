<link rel="stylesheet" type="text/css" href="css/style.css"/>

<html>
	
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<html>
	<head>
		<meta charset="utf-8" />
		<title>新用户注册</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
<?php include('css/header_user.php') ?>
			
	<div class="nav">
	<a class="left current" href="user_add.php">新用户注册</a>
	<a class="left " href="vege_message_user.php">蔬菜列表</a>
	<a class="left " href="select_vege_user.php">查找蔬菜</a>
	<a class="left" href="user_login.php">其它账户登录</a>		
	<a class="right" href="user_logout.php">退出登录</a>
	<a class="left" href="logout_account.php">注销用户</a>
	<div style="clear: both;"></div>
	</div>
		
	</body>
</html>

<form name="admin_add" method="post">
    <div class="ah1">
	<p><span class="sp1">昵称：</span><span class="sp2"><input name="nname" type="text"  size="30"></span></p>
	<p><span class="sp1">密码：</span><span class="sp2"><input name="pw" type="password"></span></p>
	<p><span class="sp1">手机号：</span><span class="sp2"><input name="phone" type="text"  size="30"></span></p>
	<p><span class="sp1">住址：</span><span class="sp2"><input name="ad" type="text"  size="30"></span></p>
    
	<p><span class="sp3"><input name="add" class="bt1" type="submit" value="注册"></span></p>
	</div>
	
</form>
	
	
<?php
include 'conn/dbpdo.php';
if(isset($_POST['add'])){
	$n=$_POST['nname'];
	$p=$_POST['pw'];	
	$ph=$_POST['phone'];
	$ad=$_POST['ad'];
	$dt=date("Y-m-d H:i:s",time());
	$run_id=mt_rand(100000,999999);

	
	$sql1="insert into users_message(run_id,nickname,password,phone_number,address,add_time) values(:a,:b,:c,:d,:e,:f)";
	$sql2="select run_id from users_message group by run_id having count(*)>1";
	
	$ps = $pdo->prepare($sql1);
	
	$ps->bindParam("a",$run_id);
	$ps->bindParam("b",$n);
	$ps->bindParam("c",$p);
	$ps->bindParam("d",$ph);
	$ps->bindParam("e",$ad);
	$ps->bindParam("f",$dt);
	$pdo->beginTransaction();
	$ps->execute();
//	if(!$ps->execute()){
//		print_r($ps->errorInfo());
//	}
	$re=$pdo->query($sql2);
	if($re->rowCount()>0){
		$pdo->rollback();
		echo  "<script>alert('获取随机ID号已存在，请重新获取');document.location.href='user_add.php';</script>";
	}else{
		$pdo->commit();
		echo "注册成功，您的ID号为：".$run_id."    此为登陆凭证，请妥善保管";
		echo '<div style="text-align: center;"><a  href="user_login.php"><button  class="bt2">确定</button></a></div>';
//		if(isset($_POST['con'])){
//			header("location:user_login.php");
//			
//		}
		
		
//		echo "<script>alert('注册成功');document.location.href='user_login.php';</script>";
	}
	
	
//	$sql2="select a.* from admin_message a,(select name,password from admin_message group by name,password having count(*)>1) b where a.name=b.name and a.password=b.password";
//	$sql3="DELETE from admin_message
//order by id DESC limit 1";
//	
//	$pdo->query($sql1);
//	$r=$pdo->query($sql2);

//	if($r->rowCount()>0){
//			$pdo->query($sql3);
//echo "<script>alert('该账户信息已存在');document.location.href='admin_add.php';</script>";
//	}else{
//		echo "<script>alert('注册成功');</script>";
//		header('location:admin_login.php');
//		echo "<script>alert('注册成功');document.location.href='';</script>";
//	}
	
	//$link->close();



  }

?>