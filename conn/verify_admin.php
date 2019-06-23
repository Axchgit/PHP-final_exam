<?php
	session_start();
	if(!isset($_SESSION['admin'])){
		echo "<script>alert('您还没有登录。');document.location.href='./admin_login.php';</script>";
		//header("location:login.php");
	}

?>