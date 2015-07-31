<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>	用户绑定 --<?php echo $WebTxt; ?></title>
<link rel="stylesheet" type="text/css" media="screen" href="./images/style_Ul.css">
<meta http-equiv="content-type" content="text/html; charset=gb2312">

</head>
<BODY class="sign_body">
<div class="sign_top">
<div class="sign_blk">
 <form action="" method="post" >

	<div class="sign_form">
	<h2>将用户绑定至<?php echo $WebTxt; ?></h2>
	<?php
	if($uncan=='1'){
	?>
	用户名：　　<input type="text" class="logform" name="username" value=""><br />
	<?php
	}else if($uncan=='2'){
		?>
	Email：　　<input type="text" class="logform" name="email" value=""><br />
	<?php
	}else if($uncan=='3'){
			?>
	用户名：　　<?php echo $username; ?><br />
	<?php
	}else if($uncan=='4'){
			?>
	Email：　　<?php echo $email; ?><br />
	<?php
			}else if($uncan=='5'){
			?>
	用户名：　　<input type="text" class="logform" name="username" value=""><br />
	Email：&nbsp;　　<input type="text" class="logform" name="email" value="<?php echo $email; ?>"> <br />
	<?php
			}else{
				echo exit ('ERROR!');
			}
	?>
	密　码：　　<input type="password" class="logform" name="pwd"><br />

	验证码：　　<input type="text" class="logform" name="jyjg" style="width:119px"> <img src="jsm.php"/><br />

	<input type="submit" value="BTSU授权并登陆" name="B12" style="margin: 5px 0 0 140px; border:1px solid #aaa;;background-color: #ddd; font-family: Arial; font-size: 12px; font-weight: bold; width:120px">
	<p>您正在使用<img height=16px src="./images/btsu.png">协议进行连接!<a href="http://www.btsnowball.org/btsu/cn/help.html">帮助文档</a></p>
	</div>
	<input type=hidden name=mpc value=>
	<div class="sign_logo">
	<img src="./images/st.gif"><br />
	<p class="gray"><?php echo $bdmsg; ?></p>
	</div>
 </form>	

	</div>
</div>
<div>
本站帐号还可以登录
</div>

</body>
</html>
