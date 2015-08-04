<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
if(!defined('IN_BTSUE')) {
	exit('CK Faild!');
}
$domail=1;
if(!isset($mailto)){
	echo '邮件发送失败！';
	$domail=2;
}
if(!isset($mailtitle)){
	echo '邮件发送失败！';
	$domail=2;
}else{
$mailtitle=utf8str($mailtitle);
}
if(!isset($mailtxt)){
	echo '邮件发送失败！';
	$domail=2;
}else{
$mailtxt=utf8str($mailtxt);
}
if($domail==1){
	switch($mailfs){
		case '1':
			@mail($mailto,$mailtitle,$mailtxt,'BTSnowBall Connect');
			break;
		case '2':
			include('./order/email.class.php');
		    $mailtype='HTML';
		    $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	        $smtp->debug = false;//是否显示发送的调试信息
	        $smtp->sendmail($mailto,$smtpusermail,$mailtitle,$mailtxt, $mailtype);
			break;
		case '3':
		echo '邮件发送被关闭！';
		break;
		case '4':
		echo '邮件发送被关闭！';
		break;
		default:
	    break;
	}
}