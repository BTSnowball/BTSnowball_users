<?PHP
/*
+BTSnowball_Users!
+BTSnowball.Org������ӭ���ļ���
+����Ʒ��ѭApache lincense V2.0��������BTSpl��������μ�lincense&txt�ļ���������ļ�
+Copyright (c) 2015 ��Ȩ��������Ӧ��������ߡ������˺�BTSnowball_Org���������Ա
+ Author list:������(Lin Youzhe)
*/
//����һЩ�ɰ汾�еĺ�������Ϊ������������Ӱ��PHP������Ч�ʣ�������Щ����Ĭ��������ġ���Ϊ���������õĿ����ԡ��ر�������RUN��ע�͵���������
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