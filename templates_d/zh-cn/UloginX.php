<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>	用户登录开放平台 --<?php echo $WebTxt; ?></title>
<link rel="stylesheet" type="text/css" media="screen" href="././images/style_Ul.css">
<meta http-equiv="content-type" content="text/html; charset=gb2312">

</head>
<BODY class="sign_body">
<div class="sign_top">
<div class="sign_blk">
 <form method="post" action="?doid=3"> 

	<div class="sign_form">
	<h2>使用<?php echo $WebTxt; ?>的帐号登录<?php echo $Udm; ?></h2>
	用户名：　　<?php echo $Uuser; ?><br />
	密　码：　　<input type="password" class="logform" name="pwd"><br />

	验证码：　　<input type="text" class="logform" name="jyjg" style="width:119px"> <img src="jsm.php"/><br />

	<input type="submit" value="授权并登陆" name="B12" style="margin: 5px 0 0 140px; border:1px solid #aaa;;background-color: #ddd; font-family: Arial; font-size: 12px; font-weight: bold; width:120px">
	</form>
	<p>您正在使用<img height=16px src="././images/btsu.png">协议进行连接!<a href="http://www.btsnowball.org/btsu/cn/help.html">帮助文档</a></p>
	</div>
	<input type=hidden name=mpc value=>
	<div class="sign_logo">
	<img src="././images/btsu.png"><br />
	<p class="gray">
	<?php
	if($btsupost=="1"){
	$qxlist='begin';
		foreach($cajgarr as $cajga){
			if(JXUxq($cajga)["bz"]=="error"){
				continue;
			}
			$qxth=JXUxq($cajga)["bz"];
			echo $qxth.'|';
			$qxlist=$qxlist.','.$qxth;
		}
		$_SESSION["qxlist"]=$cajg;
		echo '<br />以上信息将被授权予对方网站获取';
	}else{
		echo '您已经授权';
	}
    ?>
    </p>
	</div>
 </form>	

	</div>
</div>
<div>
本站帐号还可以登录
</div>

</body>
</html>
