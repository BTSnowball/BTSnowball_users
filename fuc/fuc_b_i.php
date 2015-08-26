<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
/*
在这段程序中有些不习惯使用mysql_库的朋友会质疑会不会过多的浪费资源了。所以我在这写几句体外话，面对这个函数库我使用的是mysql_connect，mysql_connect的实现中，如果再次调用它时操作的是同一个数据库，那么会返回第一次调用mysql_connect返回的那个句柄，也就是说多次调用mysql_connect()，将不会建立新连接，而将返回已经打开的连接标识，这个过程效率到可以忽略。当然把句柄直接传进函数体来效率会更高，但是今后维护这段代码可就要带来巨大的问题了，所以调mysql_connect()来传句柄吧，但是这样有效的避免了有些服务端在监听进程被K掉后导致一些错误。
*/
function Cbh($dm,$lu,$lcadd='web',$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$user=fzri($lu);
	$lcadd=fzri($lcadd);
	}else{
	$user=$lu;
	}
	if($dm=="error"){
		return "error";
	}
	include('./dorun/Run_Mysql_i.php');
	$user=mysqli_real_escape_string($linkai,$user);
	$cs=1;
	do{
	$bh=rand(9999,999999999);
	$sqlyz=mysqli_query($linkai,"SELECT id FROM `".$mysql_head."bh_list` WHERE `Ibh`='".$bh."' ");
	if($info=mysqli_fetch_object($sqlyz)){
        if($info!=""){
		continue;
		}
	}
	$cs=2;
	$date=time();
	mysqli_query($linkai,"insert into ".$mysql_head."bh_list(Ibh,dm,zt,date,user,lcadd) values('$bh','$dm','1','$date','$user','$lcadd')");
	}while($cs==1);
	return $bh;
}
function CKbh($bh,$dm,$zt,$safe=1){
if($safe!=0){
$dm=YZdm($dm);
$bh=intval($bh);
$zt=intval($zt);
}
include('./dorun/Run_Mysql_i.php');
$sqlyz=mysqli_query($linkai,"SELECT id FROM `".$mysql_head."bh_list` WHERE `ibh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ");
	if($info=mysqli_fetch_object($sqlyz)){
        if($info==""){
		return 'Error#000A0003';
		}
	}else{
		return 'PHP/MYSQL-Error!';
	}
return $bh;
}
function Bh2yzm($bh,$UI=1,$safe=1){
	if($safe!=0){
		$bh=intval($bh);
		$UI=intval($UI);
	}
	include('./dorun/Run_Mysql_i.php');
	if($UI=="1"){
		$sqlyzm=mysqli_query($linkai,"SELECT `yzm` FROM `".$mysql_head."yzm_list` WHERE `bh`='".$bh."' ORDER BY  `".$mysql_head."yzm_list`.`ss` ASC ");
	}else{
		$sqlyzm=mysqli_query($linkai,"SELECT `yzm` FROM `".$mysql_head."u_yzm_list` WHERE `bh`='".$bh."' ORDER BY  `".$mysql_head."u_yzm_list`.`ss` ASC ");
	}
	if($info=mysqli_fetch_object($sqlyzm)){
        if($info==""){
		$remsg["jg"]='Faild';
		return $remsg;
	}
	}else{
		$remsg["jg"]='Faild';
		return $remsg;
	}
	$remsg["yzma"]=$info->yzm;
	if($info=mysqli_fetch_object($sqlyzm)){
        if($info==""){
		$remsg["jg"]='Faild';
		return $remsg;
	}
	}else{
		$remsg["jg"]='Faild';
		return $remsg;
	}
	$remsg["yzmb"]=$info->yzm;
	if($info=mysqli_fetch_object($sqlyzm)){
        if($info==""){
		$remsg["jg"]='Faild';
		return $remsg;
	}
	}else{
		$remsg["jg"]='Faild';
		return $remsg;
	}
	$remsg["yzmc"]=$info->yzm;
	if($info=mysqli_fetch_object($sqlyzm)){
        if($info==""){
		$remsg["jg"]='Faild';
		return $remsg;
	}
	}else{
		$remsg["jg"]='Faild';
		return $remsg;
	}
	$remsg["yzmd"]=$info->yzm;
	$remsg["jg"]='Success';
	return $remsg;
}
function BtsQbh($bh,$UI=1,$zt=0,$safe=1){
	if($safe!=0){
		$bh=intval($bh);
		$zt=intval($zt);
	}
	include('./dorun/Run_Mysql_i.php');
	if($UI=="1"){
	if($zt=="0"){
		$sqlbh=mysqli_query($linkai,"SELECT `dm`,`zt`,`user`,`date`,`dourl`,`apiurl`,`urlrep`,`lcadd` FROM `".$mysql_head."bh_list` WHERE `Ibh`='".$bh."' ");
	}else{
		$sqlbh=mysqli_query($linkai,"SELECT `dm`,`user`,`date`,`dourl`,`apiurl`,`urlrep`,`lcadd` FROM `".$mysql_head."bh_list` WHERE `Ibh`='".$bh."' AND `zt`='".$zt."' ");
	}
	}else{
	if($zt=="0"){
		$sqlbh=mysqli_query($linkai,"SELECT `dm`,`zt`,`user`,`date`,`dourl`,`apiurl`,`urlrep`,`lcadd` FROM `".$mysql_head."bh_list` WHERE `Ubh`='".$bh."' ");
	}else{
		$sqlbh=mysqli_query($linkai,"SELECT `dm`,`user`,`date`,`dourl`,`apiurl`,`urlrep`,`lcadd` FROM `".$mysql_head."bh_list` WHERE `Ubh`='".$bh."' AND `zt`='".$zt."' ");
	}
	}
	if($info=mysqli_fetch_object($sqlbh)){
        if($info==""){
		$remsg["jg"]='Faild';
		return $remsg;
	    }
	}else{
		$remsg["jg"]='Faild';
		return $remsg;
	}
	$remsg["dm"]=$info->dm;
	$remsg["user"]=$info->user;
	$remsg["date"]=$info->date;
	$remsg["dourl"]=$info->dourl;
	$remsg["apiurl"]=$info->apiurl;
	$remsg["urlrep"]=$info->urlrep;
	$remsg["lcadd"]=$info->lcadd;
	$remsg["jg"]='Success';
	if($zt=="0"){
		$remsg["zt"]=$info->zt;
	}
	return $remsg;
}
function UIbh($bh,$UI,$safe=1){
	//1=I&2=U
	if($safe!=0){
	$bh=intval($bh);
	$UI=intval($UI);
	}
	switch($UI){
		case "1":
		include('./dorun/Run_Mysql.php');
		$sqlyz=mysql_query("SELECT Ubh FROM `".$mysql_head."bh_list` WHERE `ibh`='".$bh."'",$linka);
	    if($info=mysql_fetch_object($sqlyz)){
        if($info==""){
		return 'Error#000A0003';
		}
		}else{
		return 'PHP/MYSQL-Error!';
		}
		$Nbh=$info->Ubh;
			break;
		case "2":
		include('./dorun/Run_Mysql.php');
		$sqlyz=mysql_query("SELECT Ibh FROM `".$mysql_head."bh_list` WHERE `Ubh`='".$bh."'",$linka);
	    if($info=mysql_fetch_object($sqlyz)){
        if($info==""){
		return 'Error#000A0003';
		}
		}else{
		return 'PHP/MYSQL-Error!';
		}
		$Nbh=$info->Ibh;
			break;
		default:
			return "error#A0013";
			break;
	}
	return $Nbh;
}
function CKTUbh($bh,$zt,$safe=1){
if($safe!=0){
$bh=intval($bh);
$zt=intval($zt);
}
$time=time();
include('./dorun/Run_Mysql.php');
$sqlyz=mysql_query("SELECT date FROM `".$mysql_head."bh_list` WHERE `Ubh`='".$bh."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlyz)){
        if($info==""){
		return 'error!';
		}
	}else{
		return 'error!';
	}
$bhtime=$info->date;
$etime=$time-$bhtime+1;
return $etime;
}
function UPbh($Ibh,$Ubh,$dm,$safe=1){
	if($safe!=0){
	$Ibh=intval($Ibh);
	$Ubh=intval($Ubh);
	$dm=YZdm($dm);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update ".$mysql_head."bh_list set Ubh='".$Ubh."' where Ibh='".$Ibh."' AND dm='".$dm."' ",$linka);
}
function SZIbh($zt,$Ibh,$dm,$safe=1){
	if($safe!=0){
	$zt=intval($zt);
	$Ibh=intval($Ibh);
	$dm=YZdm($dm);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update ".$mysql_head."bh_list set zt='".$zt."' where Ibh='".$Ibh."' AND dm='".$dm."' ",$linka);
}
function SURIbh($dourl,$apiurl,$Ibh,$dm,$URLrep='http://',$safe=1){
	if($safe!=0){
	$dourl=fzr($dourl);
	$apiurl=fzr($apiurl);
	$URLrep=fzr($URLrep);
	$Ibh=intval($Ibh);
	$dm=YZdm($dm);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update ".$mysql_head."bh_list set `dourl` =  '".$dourl."',
`apiurl` =  '".$apiurl."' where Ibh='".$Ibh."' AND dm='".$dm."' AND urlrep='".$URLrep."' ",$linka);
}
function DELbh($Ibh,$dm,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$Ibh=intval($Ibh);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."bh_list  where Ibh='".$Ibh."' AND dm='".$dm."' ",$linka);
}
function Cyzm($dm,$bh,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$bh=intval($bh);
	}
	if($dm=="error"){
		return "error";
	}
	include('./dorun/Run_Mysql_i.php');
	$cs=1;
	do{
	$yzm=rand(999999,999999999);
	$sqlyz=mysqli_query($linkai,"SELECT id FROM `".$mysql_head."yzm_list` WHERE `yzm`='".$yzm."' AND `dm`='".$dm."' ");
	if($info=mysqli_fetch_object($sqlyz)){
        if($info!=""){
		continue;
		}
	}
	$cs=2;
	@$sqlbh=mysqli_query($linkai,"SELECT id FROM `".$mysql_head."yzm_list` WHERE `bh`='".$bh."' ");
	@$ss=mysqli_num_rows($sqlbh);
	$ss=$ss+1;
	$date=time();
	mysqli_query($linkai,"insert into ".$mysql_head."yzm_list(ss,bh,yzm,date,zt,dm) values('$ss','$bh','$yzm','$date','1','$dm')");
	}while($cs==1);
	return $yzm;
}
function WUyzm($ss,$bh,$yzm,$dm,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$ss=intval($ss);
	$bh=intval($bh);
	$yzm=intval($yzm);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
	mysql_query("insert into ".$mysql_head."u_yzm_list(ss,bh,yzm,date,zt,dm) values('$ss','$bh','$yzm','$date','2','$dm')",$linka);
}
function CKUyzm($bh,$dm,$zt=2,$yzm=0,$safe=1){ //二次开发勿删yzm，后续版本有用以作提醒
	if($safe!=0){
	$bh=intval($bh);
	$dm=YZdm($dm);
	$zt=intval($zt);
	}
	include('./dorun/Run_Mysql.php');
	$sqlyz=mysql_query("SELECT * FROM `".$mysql_head."u_yzm_list` WHERE `bh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlyz)){
	if($info==""){
		return 'error!';
		}
	}else{
		return 'error!';
	}
	do{
		$yzmid=$info->ss;
		switch($yzmid){
			case "1":
			$Uyzm["yzma"]=$info->yzm;
			$Uyzm["yzmadate"]=$info->date;
			break;
			case "2":
			$Uyzm["yzmb"]=$info->yzm;
			$Uyzm["yzmbdate"]=$info->date;
			break;
			case "3":
			$Uyzm["yzmc"]=$info->yzm;
			$Uyzm["yzmcdate"]=$info->date;
			break;
			case "4":
			$Uyzm["yzmd"]=$info->yzm;
			$Uyzm["yzmddate"]=$info->date;
			break;
			default:
			$Uyzm["Debug"]="error#C0003";
			return $Uyzm;
	        break;
		}
	}while($info=mysql_fetch_object($sqlyz));
	$Uyzm["Debug"]="Success";
	return $Uyzm;
}
function CKIyzm($bh,$dm,$zt=2,$yzm=0,$safe=1){
	if($safe!=0){
	$bh=intval($bh);
	$dm=YZdm($dm);
	$zt=intval($zt);
	}
	include('./dorun/Run_Mysql.php');
	$sqlyz=mysql_query("SELECT * FROM `".$mysql_head."yzm_list` WHERE `bh`='".$bh."' AND `dm`='".$dm."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlyz)){
	if($info==""){
		return 'error!';
		}
	}else{
		return 'error!';
	}
	do{
		$yzmid=$info->ss;
		switch($yzmid){
			case "1":
			$Iyzm["yzma"]=$info->yzm;
			$Iyzm["yzmadate"]=$info->date;
			break;
			case "2":
			$Iyzm["yzmb"]=$info->yzm;
			$Iyzm["yzmbdate"]=$info->date;
			break;
			case "3":
			$Iyzm["yzmc"]=$info->yzm;
			$Iyzm["yzmcdate"]=$info->date;
			break;
			case "4":
			$Iyzm["yzmd"]=$info->yzm;
			$Iyzm["yzmddate"]=$info->date;
			break;
			default:
			$Iyzm["Debug"]="error#C0003";
			return $Iyzm;
	        break;
		}
	}while($info=mysql_fetch_object($sqlyz));
	$Iyzm["Debug"]="Success";
	return $Iyzm;
}
function SZIyzm($zt,$Ibh,$Iyzm,$ss,$safe=1){
	if($safe!=0){
	$zt=intval($zt);
	$Ibh=intval($Ibh);
	$Iyzm=intval($Iyzm);
	$ss=intval($ss);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update ".$mysql_head."yzm_list set zt='".$zt."' where bh='".$Ibh."' AND yzm='".$Iyzm."' AND ss='".$ss."'  ",$linka);
}
function DELIyzm($Ibh,$yzm,$safe=1){
	if($safe!=0){
	$yzm=intval($yzm);
	$Ibh=intval($Ibh);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."yzm_list  where bh='".$Ibh."' AND yzm='".$yzm."' ",$linka);
}
function DELUyzm($Ibh,$yzm,$safe=1){
	if($safe!=0){
	$yzm=intval($yzm);
	$Ibh=intval($Ibh);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."u_yzm_list  where bh='".$Ibh."' AND yzm='".$yzm."' ",$linka);
}
function JXUxq($Uxq,$zt=1,$hand='all',$safe=1){
	if($safe!=0){
	$Uxq=fzr($Uxq);
	$zt=intval($zt);
	$hand=fzr($hand);
	}
	include('./dorun/Run_Mysql.php');
	$sqlxq=mysql_query("SELECT * FROM `".$mysql_head."qxlist` WHERE `cname`='".$Uxq."' AND `hand`='".$hand."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlxq)){
	if($info==""){
		$xqarr["xq"]='error';
	    $xqarr["bz"]='error';
		$xqarr["lx"]='error';
	    return $xqarr;
		}
	}else{
		$xqarr["xq"]='error';
	    $xqarr["bz"]='error';
		$xqarr["lx"]='error';
	    return $xqarr;
	}
	$xqarr["xq"]=$info->hname;
	$xqarr["bz"]=$info->bz;
	$xqarr["lx"]=$info->lx;
	return $xqarr;
}
function SETres($Ibh,$key,$value,$zt=1,$safe=1){
	if($safe!=0){
	$Ibh=intval($Ibh);
	$zt=intval($zt);
	$key=fzr($key);
	$val=fzr($value);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
	$sqlwater=mysql_query("SELECT `id` FROM `".$mysql_head."reslist` WHERE `Ibh`='".$Ibh."' AND `key`='".$key."' AND `val`='".$val."' ",$linka);
	if(!empty($sqlwater)){
		$waternum=mysql_num_rows($sqlwater);
		if($waternum>=1){
			return 'faild';
		}
	}
	mysql_query("INSERT INTO  `".$mysql_head."reslist` (`Ibh`,`key`,`val`,`zt`,`date`)VALUES ('$Ibh','$key','$val','$zt','$date')",$linka);
}
function QCres($bh,$key,$zt=1,$cs=900,$safe=1){
if($safe!=0){
$bh=intval($bh);
$key=fzr($key);
$zt=intval($zt);
$cs=intval($cs);
}
include('./dorun/Run_Mysql.php');
$sqlres=mysql_query("SELECT `val`,`date` FROM `".$mysql_head."reslist` WHERE `Ibh`='".$bh."' AND `key`='".$key."' AND`zt`='".$zt."' ORDER BY  `".$mysql_head."reslist`.`id` ASC  ",$linka);
if($info=mysql_fetch_object($sqlres)){
        if($info==""){
		$cres["jg"]="error";
		return $cres;
		}
}else{
	$cres["jg"]="error";
	return $cres;
}
$resjg='';
$cres["dat"]=$info->date;
$cres["jg"]="success";
do{
$timb=$info->date;
$timn=time();
$timc=$timn-$timb;
if($timc>$cs){
$cres["jg"]="timedout";
return $cres;
}
$resjg=$resjg.$info->val;
}while($info=mysql_fetch_object($sqlres));
$cres["val"]=trim($resjg);
return $cres;
}
function IINreg($username,$dm,$safe=1){
	if($safe!=0){
	$username=fzr($username);
	$dm=YZdm($dm);
	}
	include('./dorun/Run_Mysql.php');
    $sqlnr=mysql_query("SELECT `Iusername`,`zt` FROM `".$mysql_head."userzt` WHERE `Uusername`='".$username."' AND `dm`='".$dm."' AND `from`='2' ",$linka);
    if($info=mysql_fetch_object($sqlnr)){
        if($info==""){
		$cnr["in"]="1";
		return $cnr;
		}
	}else{
		$cnr["in"]="1";
	    return $cnr;
	}
	$zt=$info->zt;
	if($zt=="1"){
    $cnr["in"]="2";
	$cnr["Iusername"]=$info->Iusername;
	return $cnr;
	}else{
	$cnr["in"]="3";
	return $cnr;
	}
}
function SETuzt($Iusername,$Uusername,$dm,$from,$zt=1,$Iuid,$mmzt,$email,$safe=1){
	if($safe!=0){
		$Iusername=fzr($Iusername);
		$Uusername=fzr($Uusername);
		$email=fzr($email);
		$dm=YZdm($dm);
		$from=intval($from);
		$zt=intval($zt);
		$Iuid=intval($Iuid);
		$mmzt=intval($mmzt);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("INSERT INTO  `".$mysql_head."userzt` (`Iusername`,`dm`,`from`,`zt`,`Uusername`,`Iuid`,`mmzt`,`email`)VALUES ('$Iusername','$dm','$from','$zt','$Uusername','$Iuid','$mmzt','$email')",$linka);
}
//危险函数，请先过滤后调用
function DelUbU($username){ 
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."userzt  where Iusername='".$username."' ",$linka);
}
function DelUbUid($uid){
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."userzt  where Iuid='".$uid."' ",$linka);
}
function DelUbM($email){
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."userzt  where email='".$email."' ",$linka);
}
function DelUbIU($id,$username){
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."userzt  where id='".$id."' AND Iusername='".$username."' ",$linka);
}
function DelUbOU($id){
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM ".$mysql_head."userzt  where id='".$id."'",$linka);
}
function UpUbX($mstp,$msg,$bytp,$byg){ 
	include('./dorun/Run_Mysql.php');
	mysql_query("update ".$mysql_head."userzt set ".$mstp."='".$msg."' where ".$bytp."='".$byg."' ",$linka);
}
function UpUbXX($mstp,$msg,$bytp,$byg,$bytpb,$bygb){ 
	include('./dorun/Run_Mysql.php');
	mysql_query("update ".$mysql_head."userzt set ".$mstp."='".$msg."' where ".$bytp."='".$byg."' AND ".$bytpb."='".$bygb."' ",$linka);
}
function UpFbX($mstp,$msg,$bytp,$byg){ 
	include('./dorun/Run_Mysql.php');
	mysql_query("update ".$mysql_head."w_friend set ".$mstp."='".$msg."' where ".$bytp."='".$byg."' ",$linka);
}
//危险函数，请先过滤后调用
function IINTSet($Iusername,$dm,$safe=1){
	if($safe!=0){
	$Iusername=fzr($Iusername);
	$dm=YZdm($dm);
	}
	if($Iusername=='BTSUser'){
		$cnr["in"]="3";
	    return $cnr;
	}
	include('./dorun/Run_Mysql.php');
    $sqlnr=mysql_query("SELECT `zt` FROM `".$mysql_head."userzt` WHERE `Iusername`='".$Iusername."' AND `dm`='".$dm."' AND `from`='1' ",$linka);
    if($info=mysql_fetch_object($sqlnr)){
        if($info==""){
		$cnr["in"]="1";
		return $cnr;
		}
	}else{
		$cnr["in"]="1";
	    return $cnr;
	}
	$zt=$info->zt;
	if($zt=="1"){
    $cnr["in"]="2";
	return $cnr;
	}else{
	$cnr["in"]="3";
	return $cnr;
	}
}
function IFRTSet($Uusername,$dm,$safe=1){
	if($safe!=0){
	$Uusername=fzr($Uusername);
	$dm=YZdm($dm);
	}
	if($Uusername=='BTSUser'){
		$cnr["in"]="3";
	    return $cnr;
	}
	include('./dorun/Run_Mysql.php');
    $sqlnr=mysql_query("SELECT `zt` FROM `".$mysql_head."userzt` WHERE `Uusername`='".$Uusername."' AND `dm`='".$dm."' AND `from`='2' ",$linka);
    if($info=mysql_fetch_object($sqlnr)){
        if($info==""){
		$cnr["in"]="1";
		return $cnr;
		}
	}else{
		$cnr["in"]="1";
	    return $cnr;
	}
	$zt=$info->zt;
	if($zt=="1"){
    $cnr["in"]="1";
	return $cnr;
	}else{
	$cnr["in"]="3";
	return $cnr;
	}
}
function IINFSet($dm,$from,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$from=intval($from);
	}
	include('./dorun/Run_Mysql.php');
    $sqlnr=mysql_query("SELECT `zt` FROM `".$mysql_head."w_friend` WHERE `wdomain`='".$dm."' AND `from`='".$from."'",$linka);
    if($info=mysql_fetch_object($sqlnr)){
        if($info==""){
		$cnr["in"]="1";
		return $cnr;
		}
	}else{
		$cnr["in"]="1";
	    return $cnr;
	}
	$zt=$info->zt;
	if($zt=="1"){
    $cnr["in"]="2";
	return $cnr;
	}else{
	$cnr["in"]="3";
	return $cnr;
	}
}
function SETfriend($Uwname,$wdomain,$from,$zt=1,$safe=1){
	if($safe!=0){
		$Uwname=fzr($Uwname);
		$wdomain=YZdm($wdomain);
		$from=intval($from);
		$zt=intval($zt);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
	mysql_query("INSERT INTO  `".$mysql_head."w_friend` (`wname`,`wdomain`,`zt`,`date`,`from`)VALUES ('$Uwname','$wdomain','$zt','$date','$from')",$linka);
}
function QCFriend($dm,$from,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$from=intval($from);
	}
	include('./dorun/Run_Mysql.php');
    $sqlnr=mysql_query("SELECT * FROM `".$mysql_head."w_friend` WHERE `wdomain`='".$dm."' AND `from`='".$from."'",$linka);
    if($info=mysql_fetch_object($sqlnr)){
        if($info==""){
		$cnr["jg"]="2";
		return $cnr;
		}
	}else{
		$cnr["jg"]="2";
	    return $cnr;
	}
	$zt=$info->zt;
	if($zt=="1"){
    $cnr["jg"]="1";
	$cnr["rank"]=$info->rank;
	$cnr["fz"]=$info->fz;
	$cnr["wname"]=$info->wname;
	$cnr["date"]=$info->date;
	$cnr["id"]=$info->id;
	return $cnr;
	}else{
	$cnr["jg"]="3";
	return $cnr;
	}
}
function QCBDUser($usermasg,$mid,$dm,$safe=1){
	if($safe!=0){
	$Iusername=fzr($usermasg);
	if($dm!='none'){
	$dm=YZdm($dm);
	}
	}
	if($dm!='none'){
	switch($mid){
		case '1':
			$bg='Iusername';
		break;
		case '2':
			$bg='Uusername';
		break;
		case '3':
			$bg='Iuid';
		break;
		case '4':
			$bg='email';
		break;
		default:
			$remsg['jg']='Faild';
			return $remsg;
	    break;
	}
	}
	include('./dorun/Run_Mysql.php');
	if($dm!='none'){
	$sqluz=mysql_query("SELECT * FROM `".$mysql_head."userzt` WHERE ".$bg."='".$usermasg."' AND `dm`='".$dm."' ",$linka);
	}else{
		$sqluz=mysql_query("SELECT * FROM `".$mysql_head."userzt` WHERE `email`='".$usermasg."' ",$linka);
	}
    if($info=mysql_fetch_object($sqluz)){
        if($info==""){
		$remsg['jg']='Faild';
		return $remsg;
		}
	}else{
		$remsg['jg']='Faild';
		return $remsg;
	}
	$remsg['Iusername']=$info->Iusername;
	$remsg['Uusername']=$info->Uusername;
	$remsg['Iuid']=$info->Iuid;
	$remsg['mmzt']=$info->mmzt;
	$remsg['zt']=$info->zt;
	$remsg['from']=$info->from;
	$remsg['Id']=$info->id;
	$remsg['jg']='Success';
	return $remsg;
}
function CIucookie($ckeya,$ckeyb,$username,$date,$zt=1,$safe=1){
	if($safe!=0){
		$username=fzr($username);
		$ckeya=intval($ckeya);
		$ckeyb=intval($ckeyb);
		$date=intval($date);
		$zt=intval($zt);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("insert into ".$mysql_head."cookie(ckeya,ckeyb,date,username,zt) values('$ckeya','$ckeyb','$date','$username','$zt')",$linka);
}
function CKucookie($ckeya,$ckeyb,$username,$zt=1,$safe=1){
if($safe!=0){
		$username=fzr($username);
		$ckeya=intval($ckeya);
		$ckeyb=intval($ckeyb);
		$zt=intval($zt);
	}
include('./dorun/Run_Mysql.php');
$sqlyz=mysql_query("SELECT date,username FROM `".$mysql_head."cookie` WHERE `ckeya`='".$ckeya."' AND `ckeyb`='".$ckeyb."' AND `username`='".$username."' AND`zt`='".$zt."' ",$linka);
	if($info=mysql_fetch_object($sqlyz)){
        if($info==""){
		$remsg['jg']='error';
		return $remsg;
		}
	}else{
		$remsg['jg']='error';
		return $remsg;
	}
$remsg['date']=$info->date;
$remsg['user']=$info->username;
$remsg['jg']='success';
return $remsg;
}
function StopGoodFri($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."w_goodfriend` set `zt`='2' where `id`='".$id."' ",$linka);
}
function BeginGoodFri($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."w_goodfriend` set `zt`='1' where `id`='".$id."' ",$linka);
}
function DelGoodFri($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM `".$mysql_head."w_goodfriend`  where id='".$id."' ",$linka);
}
function NewGoodFri($wname,$wdomain,$rank,$zt,$from,$ly,$bz,$safe=1){
	if($safe!=0){
	$wname=fzr($wname);
	$wdomain=fzr($wdomain);
	$rank=intval($rank);
	$zt=intval($zt);
	$from=intval($from);
	$ly=fzr($ly);
	$bz=fzr($bz);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
    mysql_query("INSERT INTO  `".$mysql_head."w_goodfriend` (`wname`,`wdomain`,`rank`,`zt`,`date`,`from`,`ly`,`bz`)VALUES ('$wname','$wdomain','$rank','$zt','$date','$from','$ly','$bz')",$linka);
}
function StopFri($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."w_friend` set `zt`='2' where `id`='".$id."' ",$linka);
}
function BeginFri($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."w_friend` set `zt`='1' where `id`='".$id."' ",$linka);
}
function DelFri($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM `".$mysql_head."w_friend`  where id='".$id."' ",$linka);
}
function NewFri($wname,$wdomain,$rank,$zt,$from,$safe=1,$txt='none'){
	if($safe!=0){
	$wname=fzr($wname);
	$wdomain=fzr($wdomain);
	$rank=intval($rank);
	$zt=intval($zt);
	$from=intval($from);
	$txt=fzr($txt);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
    mysql_query("INSERT INTO  `".$mysql_head."w_friend` (`wname`,`wdomain`,`rank`,`zt`,`date`,`from`,`txt`)VALUES ('$wname','$wdomain','$rank','$zt','$date','$from','$txt')",$linka);
}
function IsFri($wdomain,$from,$safe=1){
	if($safe!=0){
	$wdomain=fzr($wdomain);
	$from=intval($from);
	}
	include('./dorun/Run_Mysql.php');
	 $sqljc=mysql_query("SELECT `zt` FROM `".$mysql_head."w_friend` WHERE `wdomain`='".$wdomain."' AND `from`='".$from."' ",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(isset($info->zt)){
		return true;
		}
	  }
	return false;
}
function CHKFri($sl,$safe=1){
	if($safe!=0){
	$sl=intval($sl);
	}
	include('./dorun/Run_Mysql.php');
    $sqlfri=mysql_query("select * from `".$mysql_head."w_friend` where `from`='1' order by rand() limit ".$sl." ",$linka);
	if($info=mysql_fetch_object($sqlfri)){
        if(!isset($info->zt)){
			$remsg['jg']='none';
		return $remsg;
		}else{
			$remsg['jg']='success';
			$zt=$info->zt;
		  if($zt!=1){
			  $remsg['jg']='none';
		  }
		  $cs=1;
		  $remsg["$cs"]=$info->wdomain;
		  $cs=$cs+1;
		  $remsg["$cs"]=$info->wname;
		}
	  }else{
		  $remsg['jg']='none';
	  }
	  $cs=2;
	  while($info=mysql_fetch_object($sqlfri)){
		  $zt=$info->zt;
		  if($zt!=1){
			  continue;
		  }
		  $cs=$cs+1;
		  $remsg["$cs"]=$info->wdomain;
		  $cs=$cs+1;
		  $remsg["$cs"]=$info->wname;
	  }
	  $remsg['cs']=$cs;
	  if($cs>2){
		  $remsg['jg']='success';
	  }
	  return $remsg;
}
function CHKGFri($sl,$safe=1){
	if($safe!=0){
	$sl=intval($sl);
	}
	include('./dorun/Run_Mysql.php');
    $sqlfri=mysql_query("select * from `".$mysql_head."w_goodfriend` where `from`='1' order by rand() limit ".$sl." ",$linka);
	if($info=mysql_fetch_object($sqlfri)){
        if(!isset($info->zt)){
			$remsg['jg']='none';
		return $remsg;
		}else{
			$remsg['jg']='success';
			$zt=$info->zt;
		  if($zt!=1){
			  $remsg['jg']='none';
		  }
		  $cs=1;
		  $remsg["$cs"]=$info->wdomain;
		  $cs=$cs+1;
		  $remsg["$cs"]=$info->wname;
		}
	  }else{
		  $remsg['jg']='none';
	  }
	  $cs=2;
	  while($info=mysql_fetch_object($sqlfri)){
		  $zt=$info->zt;
		  if($zt!=1){
			  continue;
		  }
		  $cs=$cs+1;
		  $remsg["$cs"]=$info->wdomain;
		  $cs=$cs+1;
		  $remsg["$cs"]=$info->wname;
	  }
	  $remsg['cs']=$cs;
	  if($cs>2){
		  $remsg['jg']='success';
	  }
	  return $remsg;
}
function StopZCloud($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."zcloud` set `zt`='2' where `id`='".$id."' ",$linka);
}
function BeginZCloud($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."zcloud` set `zt`='1' where `id`='".$id."' ",$linka);
}
function DelZCloud($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM `".$mysql_head."zcloud`  where id='".$id."' ",$linka);
}
function ZDZCloud($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."zcloud` set `zb`='1' where `id`='".$id."' ",$linka);
}
function BDZCloud($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
	mysql_query("update `".$mysql_head."zcloud` set `zb`='2' where `id`='".$id."' ",$linka);
}
function NewZCloud($name,$api,$url,$rank,$zt,$zb,$ms,$safe=1){
	if($safe!=0){
	$name=fzr($name);
	$api=fzr($api);
	$url=fzr($url);
	$rank=intval($rank);
	$zt=intval($zt);
	$zb=intval($zb);
	$ms=fzr($ms);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("INSERT INTO  `".$mysql_head."zcloud` (`name`,`api`,`url`,`rank`,`zt`,`zb`,`ms`)VALUES ('$name','$api','$url','$rank','$zt','$zb','$ms')",$linka);
}
function DelWBlack($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM `".$mysql_head."w_black`  where id='".$id."' ",$linka);
}
function NewWBlack($wname,$wdomain,$rank,$zt,$from,$text,$ly=0,$safe=1){
	if($safe!=0){
	$wname=fzr($wname);
	$wdomain=fzr($wdomain);
	$rank=intval($rank);
	$zt=intval($zt);
	$from=intval($from);
	$text=fzr($text);
	$ly=intval($ly);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
    mysql_query("INSERT INTO  `".$mysql_head."w_black` (`wname`,`wdomain`,`rank`,`zt`,`date`,`from`,`text`,`ly`)VALUES ('$wname','$wdomain','$rank','$zt','$date','$from','$text','$ly')",$linka);
}
function IsWBlack($dm,$from,$safe=1){
	if($safe!=0){
	$dm=fzr($dm);
	$from=intval($from);
	}
	if($from!=3){
		$doaf=1;
	}else{
		$doaf=2;
	}
	include('./dorun/Run_Mysql.php');
	 $sqljc=mysql_query("SELECT `zt` FROM `".$mysql_head."w_black` WHERE `wdomain`='".$dm."' AND `from`='3'",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(isset($info->zt)){
		return true;
		}
	}
	if($doaf==1){
			 $sqljc=mysql_query("SELECT `zt` FROM `".$mysql_head."w_black` WHERE `wdomain`='".$dm."' AND `from`='".$from."'",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(isset($info->zt)){
		return true;
		}
	}
	}
	$cs=substr_count($dm,'.');
	if($cs>=20){
		$cs=20;
	}
	$csa=1;
	$dmab=$dm;
	while($csa<=$cs){
	$dma=strripos($dmab,'.');
	$dmaa=substr($dm,$dma);
	$sqljc=mysql_query("SELECT `zt` FROM `".$mysql_head."w_black` WHERE `wdomain`='".$dmaa."'",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(isset($info->zt)){
		return true;
		}
	}
	if($doaf==1){
			 $sqljc=mysql_query("SELECT `zt` FROM `".$mysql_head."w_black` WHERE `wdomain`='".$dm."' AND `from`='".$from."'",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(isset($info->zt)){
		return true;
		}
	}
	}
	$dmab=substr($dm,0,$dma+1);
	$csa=$csa+1;
	}
	return false;
}
function DelEBlack($id,$safe=1){
	if($safe!=0){
	$id=intval($id);
	}
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM `".$mysql_head."e_black`  where id='".$id."' ",$linka);
}
function NewEBlack($email,$text,$zt,$update,$ly=0,$safe=1){
	if($safe!=0){
	$email=fzr($email);
	$update=fzr($update);
	$zt=intval($zt);
	$text=fzr($text);
	$ly=intval($ly);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
    mysql_query("INSERT INTO  `".$mysql_head."e_black` (`email`,`text`,`zt`,`date`,`update`,`ly`)VALUES ('$email','$text','$zt','$date','$update','$ly')",$linka);
}
function IsEBlack($address,$safe=1){
	if($safe!=0){
	$address=fzr($address);
	}
	include('./dorun/Run_Mysql.php');
	 $sqljc=mysql_query("SELECT `zt` FROM `".$mysql_head."e_black` WHERE `email`='".$address."'",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(isset($info->zt)){
		return true;
		}
	  }
	return false;
}
function IsECanStop($email,$safe=1){ //未完成！！！！！
	if($safe!=0){
	$email=fzr($email);
	}
	include('./dorun/Run_Mysql.php');
	 $sqljc=mysql_query("SELECT `id` FROM `".$mysql_head."userzt` WHERE `email`='".$address."'",$linka);
    if($info=mysql_fetch_object($sqljc)){
        if(!isset($info->id)){
		$remsg['jg']='cant';
		return  $remsg;
		}
		$remsg['jg']='can';
		return  $remsg;
	  }else{
	    $remsg['jg']='cant';
		return  $remsg;
	  }
}
function IsBelive($dm,$Iuid,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$dm=fzr($dm);
	$Iuid=intval($Iuid);
	}
	include('./dorun/Run_Mysql.php');
	$sqljc=mysql_query("SELECT `id` FROM `".$mysql_head."btsu_w_belivelist` WHERE `wdomain`='".$dm."' AND `zt`='1' ",$linka);
	if(!empty($sqljc)){
	  if($info=mysql_fetch_object($sqljc)){
        if(isset($info->id)){
		$remsg['jg']='true';
		$remsg['wid']=$info->id;
		return  $remsg;
		}
	  }
	}
	if($Iuid==0){
		$remsg['jg']='false';
		$remsg['wid']='0';
		return  $remsg;
	}
	$sqljc=mysql_query("SELECT `id` FROM `".$mysql_head."btsu_userzt` WHERE `dm`='".$dm."' AND `zt`='1' AND `Iuid`='".$Iuid."' AND `from`='2' ",$linka);
	if(!empty($sqljc)){
	  if($info=mysql_fetch_object($sqljc)){
        if(isset($info->id)){
		$remsg['jg']='true';
		$remsg['zid']=$info->id;
		return  $remsg;
		}
	  }
	}
	$remsg['jg']='false';
	$remsg['wid']='0';
	return  $remsg;
}
function NewBelive($dm,$wname,$rank=1,$zt=2,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$dm=fzr($dm);
	$wname=str_safe_d($wname,2);
	$rank=intval($rank);
	$zt=intval($zt);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
    mysql_query("INSERT INTO  `".$mysql_head."w_belivelist` (`wname`,`wdomain`,`rank`,`zt`,`date``)VALUES ('$wname','$dm','$rank','$zt','$date')",$linka);
}
function SetBelive($email,$dm,$isbelive,$zt=1,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$dm=fzr($dm);
	$email=fzr($email);
	$isbelive=intval($isbelive);
	$zt=intval($zt);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
    mysql_query("update `".$mysql_head."btsu_userzt` set `isbelive`='".$isbelive."' where `email`='".$email."' AND `dm`='".$dm."' AND `from`='2' AND `zt`='".$zt."' ",$linka);
}
function DelBelive($dm,$safe=1){
	if($safe!=0){
	$dm=YZdm($dm);
	$dm=fzr($dm);
	}
	$date=time();
	include('./dorun/Run_Mysql.php');
    mysql_query("DELETE FROM `".$mysql_head."w_belivelist`  where `dm`='".$dm."' ",$linka);
}