<?php
		header('Content_Type:text/html;charset=utf-8');
	include 'conn/dbpdo.php';
	$dt=date("Y-m-d-His",time());
	$a='data/'.$dt.'.txt';
	
	$sql='select * from vegetable_message';
	$re=$pdo->query($sql);
	foreach($re as $row){
		$date=[
		'id' =>$row['id'],
		'a' =>" ",
		'name' =>$row['name'],
		'b' => ' ',
		'ori_place' => $row['ori_place'],
		'c' => ' ',
		'pur_price' => $row['pur_price'],
		'd' => ' ',
		'sell_price' => $row['sell_price'],
		'e' => "\n"
		];
		file_put_contents("$a",$date,FILE_APPEND);
	}
?>