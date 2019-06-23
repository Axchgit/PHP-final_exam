<link rel="stylesheet" type="text/css" href="css/style.css"/>
<html>
	<head>
		<meta charset="utf-8" />
		<title>管理员页面</title>
		<link href="css/navigation.css" rel="stylesheet" type="text/css">
	</head>
	<body >
        <?php include('css/header_admin.php') ?>
		<div class="nav">
		<a class="left " href="admin_add.php"  >管理员注册</a>
		<a class="left " href="user_message.php">用户列表</a>
		<a class="left " href="vege_message.php">蔬菜列表</a>
		<a class="left current" href="select_user.php">查找用户</a>
		<a class="left " href="select_vege.php">查找蔬菜</a>
	    <a style="color: darkorange;" class="right" href="admin_logout.php">退出登录</a>
	    <!--<a style="color: darkorange;" class="right" href="index.php">返回首页</a>-->
		<div style="clear: both;"></div>
		</div>
	</body>
</html>

<form name="admin_add" method="post">
	
	<div class="ah1">
		<!--<h1 >	<span  style="color: rgb(69,137,148);text-align: center;">查找用户</span></h1>
	<hr color="#008B8B">-->
	<p><span class="sp1">根据ID号查询：</span><span class="sp2"><input name="rid" type="text"  size="30"></span></p>
	
	<p><span class="sp3"><input name="sel" class="bt1" type="submit" value="查询"></span></p>
	
	<p><span class="sp1">根据昵称查询：</span><span class="sp2"><input name="nname" type="text"  size="30"></span></p>
    
	<p><span class="sp3"><input name="s" class="bt1" type="submit" value="查询"></span></p>
	</div>
	
	
</form>
	
<?php
	include 'conn/dbpdo.php';
	include 'conn/verify_admin.php';
	if(isset($_POST['sel'])){
		$id=$_POST['rid']; 
		
		$sql="select * from users_message where run_id=$id";
		
		$r=$pdo->query($sql);
		
		echo '<div class="ah1"><table border=1><caption style="font-size:28px ;color: rgb(69,137,148);">查询结果<hr color="#008B8B"></caption><tr><th>序号</th><th>ID号</th><th>昵称</th><th>密码</th><th>手机号</th><th>地址</th><th>注册时间</th><th>操作</th></tr></div>';
		foreach($r as $arr){
			echo "<tr><td>{$arr['id']}</td><td>{$arr['run_id']}</td><td>{$arr['nickname']}</td><td>{$arr['password']}</td><td>{$arr['phone_number']}</td><td>{$arr['address']}</td><td>{$arr['add_time']}</td><td><a href='amend_user.php?id={$arr['id']}'><button  class='bt3'>修改</button></a> | <a href='delete_user_select.php?id={$arr['id']}'><button class='bt3'>删除</button></a></td></tr>";
		}
		
		
	}
	
	if(isset($_POST['s'])){
		$nn=$_POST['nname'];
	
		
		$sql="select * from users_message where nickname='$nn'";
		//加上单引号来根据字符串查询数据；
		
		
		$r=$pdo->query($sql);
		
		echo '<div class="ah1"><table border=1><caption style="font-size:28px ;color: rgb(69,137,148);">查询结果<hr color="#008B8B"></caption><tr><th>序号</th><th>ID号</th><th>昵称</th><th>密码</th><th>手机号</th><th>地址</th><th>注册时间</th><th>操作</th></tr></div>';
		foreach($r as $arr){
			echo "<tr><td>{$arr['id']}</td><td>{$arr['run_id']}</td><td>{$arr['nickname']}</td><td>{$arr['password']}</td><td>{$arr['phone_number']}</td><td>{$arr['address']}</td><td>{$arr['add_time']}</td><td><a href='amend_user.php?id={$arr['id']}'><button  class='bt3'>修改</button></a> | <a href='delete_user_select.php?id={$arr['id']}'><button class='bt3'>删除</button></a></td></tr>";
		}
		
		
	}

	
		
	
		
	

?>