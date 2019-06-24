<link rel="stylesheet" type="text/css" href="css/style.css"/>
<html>
	
<link href="css/navigation.css" rel="stylesheet" type="text/css">

<html>
	<head>
		<meta charset="utf-8" />
		<title>用户界面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
<?php include('css/header_user.php') ?>
	<div class="nav">	
	<a class="left " href="vege_message_user.php">蔬菜列表</a>
	<a class="left current" href="select_vege_user.php">查找蔬菜</a>
	<!--<a class="left " href="user_add.php">新用户注册</a>-->
	
	<a class="right" style="color: darkorange;" href="logout_account.php">注销用户</a>
	<a class="right" style="color: darkorange;" href="user_logout.php">退出登录</a>
	<div style="clear: both;"></div>
	</div>	
	</body>
</html>

<form name="admin_add" method="post">
	
	<div class="ah1">
		<!--<h1 >	<span  style="color: rgb(69,137,148);text-align: center;">查找蔬菜</span></h1>
	<hr color="#008B8B">-->
	<p><span class="sp1">根据序号查询：</span><span class="sp2"><input name="rid" type="text"  size="30"></span></p>
	
	<p><span class="sp3"><input name="sel" class="bt1" type="submit" value="查询"></span></p>
	
	<p><span class="sp1">根据名称查询：</span><span class="sp2"><input name="nname" type="text"  size="30"></span></p>
    
	<p><span class="sp3"><input name="s" class="bt1" type="submit" value="查询"></span></p>
	</div>
	
	
</form>
	
<?php
	include 'conn/dbpdo.php';
	include 'conn/verify_user.php';
	if(isset($_POST['sel'])){
		$id=$_POST['rid']; 
		
		$sql="select * from vegetable_message where id=$id";
		
		$r=$pdo->query($sql);
		
		 echo '<table class="ah" border=2><br><br></caption><tr><th>序号</th><th>图片</th><th>名称</th><th>产地</th><th>批发价(元)</th><th>建议零售价(元)</th><th>添加时间</th></tr>';
		foreach($r as $arr){
			echo "<tr >
		<td align='center'>{$arr['id']}</td>
		<td align='center' ><div style='text-align: center;' >
		<img width='100px'height='80px'   src='$arr[picture]' /></div></td>
		<td align='center'>{$arr['name']}</td>
		<td align='center'>{$arr['ori_place']}</td>
		<td align='center'>{$arr['pur_price']}</td>
		<td align='center'>{$arr['sell_price']}</td>
		<td align='center'>{$arr['add_time']}</td>
		</tr>";
		}
		
		
	}
	
	if(isset($_POST['s'])){
		$nn=$_POST['nname'];
	
		
		$sql="select * from vegetable_message where name='$nn'";
		//加上单引号来根据字符串查询数据；
		
		
		$r=$pdo->query($sql);
		
		echo '<table class="ah" border=2><br><br></caption><tr><th>序号</th><th>图片</th><th>名称</th><th>产地</th><th>批发价(元)</th><th>建议零售价(元)</th><th>添加时间</th></tr>';
		foreach($r as $arr){
			echo "<tr >
		<td align='center'>{$arr['id']}</td>
		<td align='center' ><div style='text-align: center;' >
		<img width='100px'height='80px'   src='$arr[picture]' /></div></td>
		<td align='center'>{$arr['name']}</td>
		<td align='center'>{$arr['ori_place']}</td>
		<td align='center'>{$arr['pur_price']}</td>
		<td align='center'>{$arr['sell_price']}</td>
		<td align='center'>{$arr['add_time']}</td>
		</tr>";
		}
		
		
	}

	
		
	
		
	

?>