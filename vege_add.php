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
	<p>
		<span class="sp1">名称：
		</span>
	    <span class="sp2">
			<input  name="name" type="text"   >
	    </span>
	</p>
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
			<input name="add" class="bt1" type="submit" value="添加">
				
		</span>
	</p>
	</div>
	
</form>
	
</html>	

<?php
	include 'conn/dbpdo.php';
	if(isset($_POST['add'])){
		
		$n=$_POST['name'];
		$o=$_POST['ori'];
		$p=$_POST['pur'];
		$s=$_POST['sell'];
		$dt=date("Y-m-d H:i:s",time());
		$arr=$_FILES['myfile'];
		$arr['tmp_name'];
		$filename="picture/".$arr['name'];
		move_uploaded_file($arr['tmp_name'],$filename);
		
		$sql1="insert into vegetable_message(picture,name,ori_place,pur_price,sell_price,add_time) values(:a,:b,:c,:d,:e,:f)";
	$sql2="select name from vegetable_message group by name having count(*)>1";
	$pdo->beginTransaction();
	$ps = $pdo->prepare($sql1);
	
	$ps->bindParam("a",$filename);
	$ps->bindParam("b",$n);
	$ps->bindParam("c",$o);
	$ps->bindParam("d",$p);
	$ps->bindParam("e",$s);
	$ps->bindParam("f",$dt);
	

//	if(!$ps->execute()){
//		print_r($ps->errorInfo());
//	}
	$re=$pdo->query($sql2);
	if($re->rowCount()>0){
		$pdo->rollback();
		echo  "<script>alert('已存在，请重新添加');document.location.href='vege_add.php';</script>";
	}else{
		$ps->execute();
		$pdo->commit();
		echo  "<script>alert('添加成功');document.location.href='vege_add.php';</script>";
		}
	}
?>