<?php
$dsn="mysql:host=127.0.0.1;dbname=final_exam";	
try{
	$pdo=new PDO($dsn,'root','');
}catch(PDOException $e){
	echo "<script>alert('数据库连接失败。');</script>";
	return;
}
$pdo->exec("set names utf8");

?>