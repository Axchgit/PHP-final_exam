<?php
		include 'conn/dbpdo.php';
	$dt=date("Y-m-d-His",time());
	$a=$dt.'.xls';
	
	$sql='select * from users_message';
	$re=$pdo->query($sql);
	
//function createtable($re,$a){  
    header("Content-type:application/vnd.ms-excel");  
    header("Content-Disposition:filename=$a");  
 
    $data="序号\tID号\t昵称\t密码\t联系方式\t地址\t注册时间\r";
    foreach ($re as $row){  
	
        $data.=$row['id']."\t";   
        $data.=$row['run_id']."\t";  
        $data.=$row['nickname']."\t";   
        $data.=$row['password']."\t";      
        $data.=$row['phone_number']."\t"; 
        $data.=$row['address']."\t";
//      $data.=$row['work']."\t";
//      $data.=$row['price']."\t";             
        $data.=$row['add_time']."\r";  
		
    }  
    $data=iconv('UTF-8',"GB2312//IGNORE",$data);  
    exit($data);     



?>