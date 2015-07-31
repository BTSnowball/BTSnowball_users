<?PHP
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
//存贮一些旧版本中的函数。因为函数数量不会影响PHP的运行效率，所以这些函数默认是引入的。因为有重新启用的可能性。关闭引入在RUN中注释掉此引入行
function QCbh($bh,$dm,$UI,$zt=2){
$dm=YZdm($dm);
$bh=intval($bh);
$zt=intval($zt);
include('./dorun/Run_Mysql.php');
if($UI=="1"){
$sqlbh=mysql_query("SELECT user FROM `".$mysql_head."bh_list` WHERE `ibh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ",$linka);
}else{
$sqlbh=mysql_query("SELECT user FROM `".$mysql_head."bh_list` WHERE `ubh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ",$linka);
}
if($info=mysql_fetch_object($sqlbh)){
        if($info==""){
		return 'Faild';
		}
}else{
	return 'Faild';
}
$username=$info->user;
return $username;
}
function YIyzm($yzm,$bh,$dm,$ss,$zt=100,$safe=1){
	if($zt==100){
		return 'error';
	}
	if($safe!=0){
	$yzm=intval($yzm);
	$bh=intval($bh);
	$dm=YZdm($dm);
	$ss=intval($ss);
	$zt=intval($zt);
	}
	include('./dorun/Run_Mysql.php');
	$sqlyz=mysql_query("SELECT id FROM `".$mysql_head."yzm_list` WHERE `yzm`='".$yzm."' AND `ss`='".$ss."' AND `bh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlyz)){
	if($info==""){
		return 'error!';
		}
	}else{
		return 'error!';
	}
	return 'OK';
}
function YUyzm($yzm,$bh,$dm,$ss,$zt=100,$safe=1){
	if($zt==100){
		return 'error';
	}
	if($safe!=0){
	$yzm=intval($yzm);
	$bh=intval($bh);
	$dm=YZdm($dm);
	$ss=intval($ss);
	$zt=intval($zt);
	}
	include('./dorun/Run_Mysql.php');
	$sqlyz=mysql_query("SELECT id FROM `".$mysql_head."u_yzm_list` WHERE `yzm`='".$yzm."' AND `ss`='".$ss."' AND `bh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlyz)){
	if($info==""){
		return 'error!';
		}
	}else{
		return 'error!';
	}
	return 'OK';
}