<?php
	session_start();
	if(!isset($_SESSION['user'])){
		echo "<script>alert('您还没有登录。');document.location.href='user_login.php';</script>";
		//header("location:login.php");
	}

?>