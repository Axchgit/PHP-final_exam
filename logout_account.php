<?php
include 'conn/dbpdo.php';
session_start();
echo '<script>alert("123");document.location.href="index.php";</script>';
$a=$_SESSION['user'];
$sql='delete from users_message where run_id='.$a;
$pdo->query($sql);
if($re->rowCount()>0){
header('location:user_login.php');
}
?>