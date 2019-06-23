<?php
	$a='data/2019-06-24-022125.txt';
	fopen($a,'a+');
	unlink($a);
	if(!(unlink($a))){
		echo "shanchushibai";
	}else{
		echo "chenggong";
	}
	?>
