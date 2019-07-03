<?php
		include 'conn/dbpdo.php';
	$dt=date("Y-m-d-His",time());
	$a=$dt.'.xls';
	
	$sql='select * from vegetable_message';
	$re=$pdo->query($sql);
	
//function createtable($re,$a){  
    header("Content-type:application/vnd.ms-excel");  
    header("Content-Disposition:filename=$a");  
 
    $data="序号\t名称\t产地\t进价\t建议零售价\t添加时间\r";
    foreach ($re as $row){  
	
        $data.=$row['id']."\t";   
        $data.=$row['name']."\t";  
        $data.=$row['ori_place']."\t";   
        $data.=$row['pur_price']."\t";      
        $data.=$row['sell_price']."\t"; 
//      $data.=$row['tel']."\t";
//      $data.=$row['work']."\t";
//      $data.=$row['price']."\t";             
        $data.=$row['add_time']."\r";  
		
    }  
    $data=iconv('UTF-8',"GB2312//IGNORE",$data);  
    exit($data);     



?>