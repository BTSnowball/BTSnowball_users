<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)、
*/
session_start();
include_once('run.php');
if(!isset($_GET["doid"])){
	$doid=""; //万一有插件要启动呢
}else{
$doid=$_GET["doid"];
}
$pluswz='btsuapih';
include('btsuplus.php');
if($doid==""){
	exit;
}
switch($doid){
	case "0": //反转
	    if(!isset($_GET["bh"],$_GET["dm"],$_GET["Iyzma"],$_GET["Iyzmb"],$_GET["Iyzmc"],$_GET["Iyzmd"],$_GET["Ibh"],$_GET['ToKen'],$_GET['kla'])){
			echo 'Error-BTSUConnect';
			exit;
		}
		$Ibh=intval($_GET["bh"]);
	    $Udm=YZdm($_GET["dm"]);
		$Cuser=fzr($_GET["user"]);
		$Ubh=$_GET["Ibh"];
		$Uyzma=$_GET["Iyzma"];
		$Uyzmb=$_GET["Iyzmb"];
		$Uyzmc=$_GET["Iyzmc"];
		$Uyzmd=$_GET["Iyzmd"];
		$Ukla=$_GET["kla"];
		if(empty($Ubh)){
			echo "empty!1";
			exit;
		}
		if(empty($Udm)){
			echo "empty!2";
			exit;
		}
		if(empty($Uyzma)){
			echo "empty!3";
			exit;
		}
		if(empty($Uyzmb)){
			echo "empty!4";
			exit;
		}
		if(empty($Uyzmc)){
			echo "empty!5";
			exit;
		}
		if(empty($Uyzmd)){
			echo "empty!6";
			exit;
		}
		if(empty($Ibh)){
			echo "empty!7";
			exit;
		}
		$sqlyz=mysqli_query($linkai,"SELECT date FROM `".$mysql_head."bh_list` WHERE `Ibh`='".$Ibh."' AND `zt`='1' AND `user`='".$Cuser."' AND `dm`='".$Udm."' ");
	    if($info=mysqli_fetch_object($sqlyz)){
        if($info==""){
		echo "error!!";
		exit;
		}
		}else{
			return 'PHP/MYSQL-Error!';
		}
		$timeI=$info->date;
		$timeN=time();
		$timeC=$timeN-$timeI;
		if($timeC>300){
			echo "Faild";
			//exit;
		}
		$Iyzm=CKIyzm($Ibh,$Udm,1);
		if($Iyzm['Debug']!='Success'){
			echo 'ErrorIY!';
			exit;
			}
		$ZToken=sha1(md5($Iyzm['yzma'].$Iyzm['yzmb']).md5($Iyzm['yzmc'].$Iyzm['yzmd'].$Ibh));
		$UToken=$_GET['ToKen'];
		if($UToken!=$ZToken){
			echo 'ErrorQX';
			exit;
		}
		if(!(mysqli_query($linkai,"update ".$mysql_head."bh_list set zt='2' where Ibh='".$Ibh."' AND dm='".$Udm."' "))){
			echo "error1";
			exit;
		}
		if(!(mysqli_query($linkai,"update ".$mysql_head."yzm_list set zt='2' where bh='".$Ibh."' AND ss='1'  "))){
			echo "error2";
			exit;
		}
		if(!(mysqli_query($linkai,"update ".$mysql_head."yzm_list set zt='2' where bh='".$Ibh."' AND ss='2' "))){
			echo "error3";
			exit;
		}
		if(!(mysqli_query($linkai,"update ".$mysql_head."yzm_list set zt='2' where bh='".$Ibh."' AND ss='3' "))){
			echo "error4";
			exit;
		}
		if(!(mysqli_query($linkai,"update ".$mysql_head."yzm_list set zt='2' where bh='".$Ibh."' AND ss='4' "))){
			echo "error5";
			exit;
		}
		UPbh($Ibh,$Ubh,$Udm);
		WUyzm(1,$Ibh,$Uyzma,$Udm);
		WUyzm(2,$Ibh,$Uyzmb,$Udm);
		WUyzm(3,$Ibh,$Uyzmc,$Udm);
		WUyzm(4,$Ibh,$Uyzmd,$Udm);
		echo 'BTSuser:'.$Ukla.':BTsuserover';
	break;
	case "1":
		$Ubh=$_GET["bh"];
	    $Udm=$_GET["dm"];
		$Uyzma=$_GET["yzma"];
		$Uyzmb=$_GET["yzmb"];
		$Uyzmc=$_GET["yzmc"];
		$Uyzmd=$_GET["yzmd"];
		$Uuser=$_GET["user"];
		$Ukla=intval($_GET["kla"]);
		if(IsWBlack($Udm,1,1)){
			exit('Forbid!(Veson BTSnowBall_User 1.0');
		}
		$Dcurl='http://'.$Udm.'/btsuser/map/';
		$Uaddress=BCurlKey($Dcurl);
		$Uaddressx=json_decode($Uaddress);
		$maperror='s';
		 if(!isset($Uaddressx->dourl)){
	         $btsuerrormsg='ERROR！读取目标网站的MAP信息错误！';
			 $maperror='e';
		 }else{
			 $dourl=$Uaddressx->dourl;
		 }
		 if($maperror=='e'){
			 $tmod='BUError';
			 include('intem.php');
			 exit;
		 }
		 if(!isset($Uaddressx->apiurl)){
	         $btsuerrormsg='ERROR！读取目标网站的MAP信息错误！';
			 $maperror='e';
		 }else{
			 $apiurl=$Uaddressx->apiurl;
		 }
		 if(!isset($Uaddressx->Version)){
	         $Version='BTSnowBallOrgA';
		 }else{
			 $Version=$Uaddressx->Version;
		 }
		 if(!isset($Uaddressx->URLrep)){
	         $UURLrep='http://';
		 }else{
			 $UURLrep=$Uaddressx->URLrep;
		 }
		 if($maperror=='e'){
			 $tmod='BUError';
			 include('intem.php');
			 exit;
		 }
		/*
		$Dcurl='http://'.$Udm.'/btsuser/map/';
		$Uaddress=BCurlKey($Dcurl);
		$Uaddressx=explode('|',$Uaddress);
		unset($Uaddress);
		foreach($Uaddressx as $UaddX){
			$UaddXX=explode('[:]',$UaddX);
			if(!isset($UaddXX[1])){
				exit('BTS Connect Error!(Veson BTSnowBall_User 1.0');
			}
			$$UaddXX[0]=$UaddXX[1];
		}
				*/
		unset($Uaddressx);
		if(isset($dourl)&&isset($apiurl)){
		$Uaddra=$dourl;
		$Uaddrb=$apiurl;
		unset($dourl,$apiurl);
		if(empty($Uaddra)||empty($Uaddrb)){
			exit('BTS Connect Error!(Veson BTSU 1.0');
		}
		}else{
			exit('BTS Connect Error!(Veson BTSU 1.0');
		}
		$kla=intval(rand(1111,99999999));
		$Acurl=$UURLrep.$Udm.$Uaddrb.'?doid=3&bh='.$Ubh.'&dm='.$WDomain.'&kla='.$kla;
		$yzjg=BCurlKey($Acurl);
		if($yzjg!=$kla){
			echo '#0000A002';
			exit;
		}
		$Ibh=Cbh($Udm,$Uuser);
		SURIbh($Uaddra,$Uaddrb,$Ibh,$Udm,$UURLrep);
		$Iyzma=Cyzm($Udm,$Ibh);
		$Iyzmb=Cyzm($Udm,$Ibh);
		$Iyzmc=Cyzm($Udm,$Ibh);
		$Iyzmd=Cyzm($Udm,$Ibh);
		$ToKen=sha1(md5($Uyzma.$Uyzmb).md5($Uyzmc.$Uyzmd.$Ubh));
		$kla=intval(rand(9999,999999999));
		$Bcurl=$UURLrep.$Udm.$Uaddrb.'?doid=0&bh='.$Ubh.'&dm='.$WDomain.'&ToKen='.$ToKen.'&user='.$Uuser.'&Ibh='.$Ibh.'&Iyzma='.$Iyzma.'&Iyzmb='.$Iyzmb.'&Iyzmc='.$Iyzmc.'&Iyzmd='.$Iyzmd.'&kla='.$kla;//校验并交换验证信息
		$yzjgB=BCurlKey($Bcurl);
		if($yzjgB!=$kla){
			echo 'BTSuser:'.'Error-#000A0010'.':BTsuserover';
			DELbh($Ibh,$Udm);
			DELIyzm($Ibh,$Iyzma);
			DELIyzm($Ibh,$Iyzmb);
			DELIyzm($Ibh,$Iyzmc);
			DELIyzm($Ibh,$Iyzmd);
			exit;
		}
		UPbh($Ibh,$Ubh,$Udm);
		SZIbh(2,$Ibh,$Udm);
		WUyzm(1,$Ibh,$Uyzma,$Udm);
		WUyzm(2,$Ibh,$Uyzmb,$Udm);
		WUyzm(3,$Ibh,$Uyzmc,$Udm);
		WUyzm(4,$Ibh,$Uyzmd,$Udm);
		SZIyzm(2,$Ibh,$Iyzma,1);
		SZIyzm(2,$Ibh,$Iyzmb,2);
		SZIyzm(2,$Ibh,$Iyzmc,3);
		SZIyzm(2,$Ibh,$Iyzmd,4);
		echo 'BTSuser:'.$Ukla.':BTsuserover';
	break;
	case "2":
		if(!isset($_GET["bh"]) || !isset($_GET['ToKen'])){
		echo 'ErrorEmpty!';
		exit;
	    }
		$Ubh=intval(trim($_GET["bh"]));
	    $Ibh=UIbh($Ubh,2,2);
		$bhmsg=BtsQbh($Ibh,1,2,2);
		if($bhmsg["jg"]=="Faild"){
			echo "bhfaild";
			exit;
		}
		$Udm=$bhmsg["dm"];
		$Uuser=$bhmsg["user"];
		$etime=CKTUbh($Ubh,2,2);
		if($etime=="error!" || $etime>=1200){
			echo "Failed!-TimedOut".$etime;
			exit;
		}
		$Uyzm=CKUyzm($Ibh,$Udm);
		if($Uyzm['Debug']!='Success'){
			echo 'ErrorUY!';
			exit;
			}
		$Iyzm=CKIyzm($Ibh,$Udm);
		if($Iyzm['Debug']!='Success'){
			echo 'ErrorIY!';
			exit;
			}
		$ZToKen=sha1(md5($Uyzm['yzma'].$Uyzm['yzmb']).md5($Iyzm['yzma'].$Iyzm['yzmb'].$Ibh));
		$UToken=$_GET['ToKen'];
		if($UToken!=$ZToKen){
			echo 'ErrorQX';
			exit;
		}
		$INr=IINreg($Uuser,$Udm);
		$IINr=$INr["in"];
		if($IINr=="2"){
		echo 'BTSuser:pass:BTsuserover';
		}else{
		include("$WHand");
		echo 'BTSuser:'.$NeedM.':BTsuserover';
		}
	break;
	case "3":
		if(!isset($_GET["bh"],$_GET["dm"],$_GET['kla'])){
		echo 'error';
		exit;
	    }
		$bh=intval($_GET["bh"]);
	    $dm=$_GET["dm"];
		$Ukla=$_GET['kla'];
		$ckjg=CKbh($bh,$dm,1);
		if($ckjg!=$bh){
		$Ukla='error';
		}
		echo 'BTSuser:'.$Ukla.':BTsuserover';
	break;
	case "4":
		$msggs='1';
		if(!isset($_GET["bh"]) || !isset($_GET["ToKen"]) || !isset($_POST["res"]) || !isset($_POST["key"])){
		$msggs='2';
		if(!isset($_POST["POST_ARY"])){
		echo 'BTSuser:Error:BTsuserover';
		exit;
		}
		if(!is_array($_POST["POST_ARY"])){
		echo 'BTSuser:Error:BTsuserover';
		exit;
		}
	    }
		$Ubh=$_GET["bh"];
	    $Ibh=UIbh($Ubh,2);
		$bhmsg=BtsQbh($Ibh,1,2,2);
		if($bhmsg["jg"]=="Faild"){
			echo "bhfaild";
			exit;
		}
		$Udm=$bhmsg["dm"];
		$etime=CKTUbh($Ubh,2,2);
		if($etime=="error!" || $etime>=1200){
			echo "Failed!-TimedOut".$etime;
			exit;
		}
		$Uyzm=CKUyzm($Ibh,$Udm);
		if($Uyzm['Debug']!='Success'){
			echo 'ErrorUY!';
			exit;
			}
		$Iyzm=CKIyzm($Ibh,$Udm);
		if($Iyzm['Debug']!='Success'){
			echo 'ErrorIY!';
			exit;
			}
		$ToKen=sha1(md5($Uyzm['yzma'].$Uyzm['yzmc']).md5($Iyzm['yzma'].$Iyzm['yzmc'].$Ibh));
		if($ToKen!=trim($_GET['ToKen'])){
		echo 'BTSuser:Error:BTsuserover';
		exit;
		}
		if($msggs=='1'){
		$res=trim($_POST["res"]);
		$key=trim($_POST["key"]);
		if($res=="cant"){
			echo 'BTSuser:success:BTsuserover';
			break;
		}
		if($key=='email'){
				if(IsEBlack($res)){
				echo 'BTSuser:EmailForbidden:BTsuserover';
			    break;
				}
			}
		SETres($Ibh,$key,$res,1);
		}else{
			$amun=count($_POST["POST_ARY"]);
			if($amun%2!=0){
			echo 'BTSuser:Error:BTsuserover';
		    exit;
			}
			$posarr=$_POST["POST_ARY"];
			$num=0;
			do{
				$key=$posarr["$num"];
				$num=$num+1;
				$res=$posarr["$num"];
				if($key=='email'){
				if(IsEBlack($res)){
				echo 'BTSuser:EmailForbidden:BTsuserover';
			    break;
				}
			}
			SETres($Ibh,$key,$res,1);
			$num=$num+1;
			}while($num<$amun);
		}
		if($key=="ans"){
		$token="allsuccess";
		}else{
			$token="success";
		}
		echo 'BTSuser:'.$token.':BTsuserover';
	break;
	case "5":
		echo 'BTSuser:'.$Wname.':BTsuserover';
	break;  //为什么没有plus项；因为api文件中最好不要出现主动型插件，有最多也是被动型
	case "10":
		if(!isset($_GET['bh'],$_GET['token'])){
		echo 'BTSuser:Error:BTsuserover';
		exit;
	    }
	break;
	case "11":
	break;
	default:
	break;
}
include_once('waste.php');
$pluswz='btsuapif';
include('btsuplus.php');