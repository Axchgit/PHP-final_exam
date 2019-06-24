<link rel="stylesheet" type="text/css" href="css/style.css"/>

<html>
	
<link href="css/navigation.css" rel="stylesheet" type="text/css">

<html>
	<head>
		<meta charset="utf-8" />
		<title>用户界面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
<?php include('css/header_user.php') ?>
	
	<form name="user_add" method="post">
    <div class="ah1">
    	<h1 >	<span  style="color: rgb(69,137,148);text-align: center;">注销账户</span></h1>
	<hr color="#008B8B">
	<p><span class="sp1">输入昵称确认：</span><span class="sp2"><input name="nname" type="text"  size="30"></span></p>
	
    
	<p><span class="sp3"><input name="ac" class="bt1" style="background-color:crimson" type="submit" value="确认注销"></span></p>
	</div>
	
</form>

<?php
include 'conn/dbpdo.php';
include 'conn/verify_user.php';

if(isset($_POST['ac'])){
//	session_start();
	$b=$_POST['nname'];
	$a=$_SESSION['user'];
	$sql="delete from users_message where nickname='{$a}'";
	if($b==$a){
		
	 $re=$pdo->query($sql);
	 if($re->rowCount()>0){
	 	header('location:user_login.php');
	 	}
	}else{
//		header('location:vege_message_user.php');
		echo "<script>alert('输入错误');document.location.href='vege_message_user.php';</script>";
		
	}
 }
//echo '<script>alert("123");document.location.href="index.php";</script>';
//$a=$_SESSION['user'];
//$sql='delete from users_message where run_id='.$a;
//$pdo->query($sql);
//if($re->rowCount()>0){
//header('location:user_login.php');
//}
?>