<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href ="css/style.css" />
<h1 align="center">用户注册</h1><hr>	
<form name="reg" method="post" enctype="multipart/form-data">
	<p>	<span class="sp1">用户名：</span><span class="sp2"><input type="text" name="user" placeholder="4-10个字母。"></span></p>
	<p>	<span class="sp1">密码：</span><span class="sp2"><input type="password" name="password" placeholder="4-10位字母数字组合"></span>	</p>	
	<p>	<span class="sp1">性别：</span><input id="a" type="radio" name="sex" value="man" />	<label for="a">男</label>&nbsp;
<input id="b" type="radio" name="sex" value="wm" />	<label for="b">女</label>	</p>
	<p>	<span class="sp1">身份证号：</span><span class="sp2"><input type="text" name="idCard"	placeholder="18位身份证号"></span></p>
	<p>	<span class="sp1">Email：</span>	<span class="sp2"><input type="text" name="email" placeholder="合法的邮箱格式"></span></p>
	<p>	<span class="sp1">QQ：</span><span class="sp2"><input type="text" name="qq" placeholder="5-10个数字字符"</span></p>
	<p>	<span class="sp1">联系电话：</span>	<span class="sp2"><input type="text" name="phone" placeholder="合法的11位手机号码"</span> </p>
	<p>	<span class="sp1">爱好：</span>  <input type="checkbox" name="hb[]" value="乐器">乐器   <input type="checkbox" name="hb[]" value="游戏">游戏    <input type="checkbox" name="hb[]" value="吃货">吃货    <input type="checkbox" name="hb[]" value="旅游">旅游   <input type="checkbox" name="hb[]" value="唱歌">唱歌	</p>
	<p>	<span class="sp1">就读学校：</span>	<select name="ssc">	<option value="河南大学">河南大学</option>	<option value="河南科技大学">河南科技大学</option><option value="南开大学">南开大学</option>	<option value="复旦大学">复旦大学</option>	<option value="剑桥大学">剑桥大学</option></select><br></p>
	<p>	<span class="sp1">头像：</span>	<input type="file" name="myfile" >	</p>
	<p>	<span class="sp1">个人简介:</span><span class="sp2"><textarea name="content" cols="60" rows="5"></textarea> </span></p>
	<p>	<span class="sp3"><input class="bt" name="enter" type="submit"></span>	</p>	
	</form>
	
<?php
	if(isset($_POST['enter'])){	
		$ah=$_POST['hb'];	$sex=$_POST['sex'];		
		$u=$_POST['user'];	$up="/[\w]{4,10}/";		
		$p=$_POST['password'];	$pp="/[\w]{4,10}/";		
		$i=$_POST['idCard'];	$ip="/41[\d]{15}([\d]{1}|xX)/";		
		$e=$_POST['email'];	$ep="/[\w]{3,10}@[a-zA-Z]{2,5}|[\d]{2,5}.[a-z]{2,3}/";
		$q=$_POST['qq'];	$qp="/[\d]{5,10}/";
		$s=$_POST['phone'];	$sp="/1[\d]{10}/";			
		$arr = $_FILES['myfile'];	$arr['tmp_name'];
		$filename = "img/".$arr['name'];
		
		
		if(preg_match($up,$u)==1)
		{
			$tu=$u;
		}
		else
		{
			echo "<script>alert('用户名格式错误。');</script>";
		}
		if(preg_match($pp,$p)==1)
		{
			$tp=$p;
		}
		else
		{
			echo "<script>alert('密码格式错误');</script>";
		}
		if($sex=='man')
		{
			$sex="男";
		}
		else
		{
			$sex="女";
		}
		if(preg_match($ip,$i)==1)
		{
			$ti=$i;
		}
		else
		{
			echo "<script>alert('身份格式错误。');</script>";
		}
		if(preg_match($ep,$e)==1)
		{
			$te=$e;
		}
		else
		{
			echo "<script>alert('邮箱格式错误。');</script>";
		}
		if(preg_match($qp,$q)==1)
		{
			$tq=$q;
		}
		else
		{
			echo "<script>alert('QQ号格式错误。');</script>";
		}		
        if(preg_match($sp,$s)==1)
        {
        	$ts=$s;
        }
        else
        {
			echo "<script>alert('手机号格式错误');</script>";
		}		
	
		echo "用户名：".$tu;	echo "<br>";	echo "密码：".$tp;	echo "<br>";	echo "性别：".$sex;
		echo "<br>";	echo "身份证号：".$ti;	echo "<br>";	echo "Email：".$te;
		echo "<br>";	echo "QQ：".$tq; 	echo "<br>";	echo "联系电话：".$ts;	echo "<br>";
		echo "爱好：";
		for($i=0;$i<count($ah);$i++){ 
			echo $ah[$i]; 
			echo "  ";
			} 
		echo "<br>";	echo "就读学校：".$_POST['ssc'];	echo "<br>";
		$arr = $_FILES['myfile'];	$arr['tmp_name'];
		$filename = "img/".$arr['name'];	echo $filename;
	   	move_uploaded_file($arr['tmp_name'],$filename);
	   	echo "头像：<br> <img src=$filename width=200 height=150>";
	   		echo $arr['name'];
	   		echo ".".$arr['tmp_name'].".";
	   		
	   		
		echo "<br>";	echo "个人简介：".$_POST['content'];	
	}
	?>
