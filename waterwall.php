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
error_reporting(0);
if ($_SERVER["HTTP_X_FORWARDED_FOR"]) 
{ 
$userip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
} 
elseif ($_SERVER["HTTP_CLIENT_IP"]) 
{ 
$userip = $_SERVER["HTTP_CLIENT_IP"]; 
}
elseif ($_SERVER["REMOTE_ADDR"]) 
{ 
$userip = $_SERVER["REMOTE_ADDR"]; 
} 
elseif (getenv("HTTP_X_FORWARDED_FOR")) 
{ 
$userip = getenv("HTTP_X_FORWARDED_FOR"); 
} 
elseif (getenv("HTTP_CLIENT_IP")) 
{ 
$userip = getenv("HTTP_CLIENT_IP"); 
} 
elseif (getenv("REMOTE_ADDR"))
{ 
$userip = getenv("REMOTE_ADDR"); 
} 
else 
{ 
$userip = "Unknown"; 
}
$doczyzm='2';
if(!isset($btsyzmact)){
            $_SESSION['doczyzm']='2';
            }else{
            $_SESSION['doczyzm']=$btsyzmact;
            }
if(!isset($wateruser)){
	$wateruser='UNknow';
}
if($userip!="Unknown"){
	if(!isset($wateract)){
		$wateract='fangwen';
	}
	$timenow=time();
	$timewater=$timenow-360;
	$userip=fzr($userip);
	$sqlwater=mysql_query("SELECT `id` FROM `".$mysql_head."waterhub` WHERE `ip`='".$userip."' AND `act`='".$wateract."' AND `date`>='".$timewater."' ",$linka);
	if(!empty($sqlwater)){
		$waternum=mysql_num_rows($sqlwater);
		if($waternum>=4){
			$doczyzm='1';
            $_SESSION['doczyzm']='1';
		}
		mysql_query("insert into ".$mysql_head."waterhub(date,ip,act,username,zt) values('$timenow','$userip','$wateract','$wateruser','1')",$linka);
	}else{
		mysql_query("insert into ".$mysql_head."waterhub(date,ip,act,username,zt) values('$timenow','$userip','$wateract','$wateruser','1')",$linka);
	}
	if($wateruser!='UNknow'){
	$sqlwateruser=mysql_query("SELECT `id` FROM `".$mysql_head."waterhub` WHERE `username`='".$wateruser."' AND `act`='".$wateract."' AND `date`>='".$timewater."' ",$linka);
	if(!empty($sqlwateruser)){
		$waterusernum=mysql_num_rows($sqlwateruser);
		if($waterusernum>=4){
			$doczyzm='1';
            $_SESSION['doczyzm']='1';
		}
	}
	}
}else{
	$doczyzm='1';
    $_SESSION['doczyzm']='1';
}