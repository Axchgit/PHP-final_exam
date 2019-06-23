<link href="css/style.css" rel="stylesheet" type="text/css">
<html>
	<head>
		<meta charset="utf-8" />
		<title>管理员页面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
<?php include('css/header_admin.php') ?>
			
	    <div class="nav">
		<a class="left" href="admin_add.php"  >管理员注册</a>
		<a class="left" href="user_message.php">用户列表</a>
		<a class="left " href="user_message.php">蔬菜列表</a>
		<a class="left " href="select_user.php">查找用户</a>
		<a class="left " href="select_vege.php">查找蔬菜</a>
		<a href="user_login.php"></a>
		<a class="right" href="admin_logout.php">退出登录</a>
		<div style="clear: both;"></div>
		</div>
		
		
		
	</body>
</html>

<html>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
<form name="admin_add" method="post" enctype="multipart/form-data">
	
	
	<div class="ah1">
		<h1 style="text-align: ;" >	<span   style="color: rgb(69,137,148);text-align: center;">蔬菜信息修改</span></h1>
	<hr color="#008B8B">
	<!--<p>
		<span class="sp1">名称：
		</span>
	    <span class="sp2">
			<input  name="name" type="text"   >
	    </span>
	</p>-->
	<p>
		<span class="sp1">产地：
		</span>
	    <span class="sp2">
			<input  name="ori" type="text"   >
	    </span>
	</p>
	<p>
		<span class="sp1">批发价：
		</span>
	    <span class="sp2">
			<input  name="pur" type="text"   >
	    </span>
	</p>
	<p>
		<span class="sp1">建议零售价：</span>
		<span class="sp2">
			<input  name="sell" type="text">
				
		</span>
	</p>
	<!--<p>
		<span class="sp1">图片：
		</span>
	    <span class="sp2">
			<input class=""  name="myfile" type="file"   >
	    </span>
	</p>-->
	<p>
		<span class="sp3">
			<input name="add" class="bt1" type="submit" value="提交">
				
		</span>
	</p>
	</div>
	
</form>
	
</html>	
	
	
<?php
include 'conn/dbpdo.php';
if(isset($_POST['add'])){
//		$n=$_POST['name'];
		$o=$_POST['ori'];
		$p=$_POST['pur'];
		$s=$_POST['sell'];
		$dt=date("Y-m-d H:i:s",time());
//		$arr=$_FILES['myfile'];
//		$arr['tmp_name'];
//		$filename="picture/".$arr['name'];
//		move_uploaded_file($arr['tmp_name'],$filename);
		$id=$_GET['id'];
	
	$sql1="update vegetable_message set ori_place=:c,pur_price=:d,sell_price=:e,add_time=:f where id=$id";
//	$sql2="select run_id from users_message group by run_id having count(*)>1";
	
//	$pdo->beginTransaction();
	$ps = $pdo->prepare($sql1);
	
//	$ps->bindParam("a",$filename);
//	$ps->bindParam("b",$n);
	$ps->bindParam("c",$o);
	$ps->bindParam("d",$p);
	$ps->bindParam("e",$s);
	$ps->bindParam("f",$dt);
	$ps->execute();
	if($ps->execute()){
	echo  "<script>alert('修改成功');document.location.href='vege_message.php';</script>";
	}else{
		echo  "<script>alert('修改失败');document.location.href='vege_message.php';</script>";
	}
//	if(!$ps->execute()){
//		print_r($ps->errorInfo());
//	}
//	$re=$pdo->query($sql2);
//	if($re->rowCount()>0){
//		$pdo->rollback();
//		echo  "<script>alert('获取随机ID号已存在，请重新获取');document.location.href='user_add.php';</script>";
//	}else{
//		$pdo->commit();
//		echo "注册成功，您的ID号为：".$run_id."    此为登陆凭证，请妥善保管";
//		echo '<div style="text-align: center;"><a  href="user_login.php"><button  class="bt2">确定</button></a></div>';
//		if(isset($_POST['con'])){
//			header("location:user_login.php");
//			
//		}
		
		
//		echo "<script>alert('注册成功');document.location.href='user_login.php';</script>";
	
	
	
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