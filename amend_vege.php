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
		<a class="left " href="vege_message.php">蔬菜列表</a>
		<a class="left " href="user_message.php">用户列表</a>
		<a class="left " href="select_vege.php">查找蔬菜</a>
		<a class="left " href="select_user.php">查找用户</a>
		<a class="left " href="admin_add.php"  >添加管理员</a>		
	    <a style="color: darkorange;" class="right" href="admin_logout.php">退出登录</a>
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
	<p>
		<span class="sp1">图片：
		</span>
	    <span class="sp2">
			<input class=""  name="myfile" type="file"   >
	    </span>
	</p>
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
		$arr=$_FILES['myfile'];
		$arr['tmp_name'];
		$filename="picture/".$arr['name'];
		move_uploaded_file($arr['tmp_name'],$filename);
		$id=$_GET['id'];
	
	$sql1="update vegetable_message set picture=:a, ori_place=:c,pur_price=:d,sell_price=:e,add_time=:f where id=$id";
//	$sql2="select run_id from users_message group by run_id having count(*)>1";
	
//	$pdo->beginTransaction();
	$ps = $pdo->prepare($sql1);
	
	$ps->bindParam("a",$filename);
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



  }

?>