<?php
include 'conn/dbpdo.php';
$a=$_GET['id'];
$sql='delete from vegetable_message where id='.$a;
$pdo->query($sql);
header('location:vege_message.php');
?>