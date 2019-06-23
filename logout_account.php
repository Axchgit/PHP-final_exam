<?php
include 'conn/dbpdo.php';
session_start();
echo '<script>alert("123");document.location.href="index.html";</script>';
$a=$_SESSION['user'];
$sql='delete from users_message where run_id='.$a;
$pdo->query($sql);
header('location:user_login.php');
?>