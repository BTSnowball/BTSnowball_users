<?php
function CKbh($bh,$dm,$zt,$safe=1){
if($safe!=0){
$dm=$dm;
$bh=intval($bh);
$zt=intval($zt);
}
$mysql_head     = "btsu_";
$sqlyz=mysql_query("SELECT id FROM `".$mysql_head."bh_list` WHERE `ibh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlyz)){
        if($info==""){
		return 'Error#000A0003';
		}
	}else{
		return 'PHP/MYSQL-Error!';
	}
return $bh;
}
function IsEBlack($address,$safe=1){
	if($safe!=0){
	$address=$address;
	}
	$mysql_head     = "btsu_";
	 $sqljc=mysql_query("SELECT `zt` FROM `".$mysql_head."e_black` WHERE `email`='".$address."'",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(isset($info->zt)){
		return true;
		}
	  }
	return false;
}
include('config/MySQL_CONFIG.php');
$linka=mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("数据库连接失败".mysql_error());
mysql_select_db($mysql_dbname);
mysql_query("set names utf8");
echo IsEBlack('blca@g.in',1);