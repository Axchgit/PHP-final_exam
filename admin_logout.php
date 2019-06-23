<?php
session_start();
	if(!isset($_SESSION['admin'])){
		echo "<script>alert('您还没有登录。');document.location.href='admin_login.php';</script>";
		//header("location:login.php");
	}else{unset($_SESSION['admin']);
$_SESSION=array();
session_destroy();
header("location:admin_login.php");}

?>