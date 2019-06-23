<?php
include 'conn/dbpdo.php';
$a=$_GET['id'];
$sql='delete from users_message where id='.$a;
$pdo->query($sql);
header('location:user_message.php');
?>