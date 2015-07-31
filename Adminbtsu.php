<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)、
*/
session_start();
?>
<META http-equiv=Content-Type content="text/html; charset=UTF-8">
<?
include_once('run.php');
if(!isset($_SESSION['AdminBtsuLI'],$_SESSION['AdminBtsuU'],$_SESSION['AdminBtsuGroup'])){
	$doyz='1';
}else{
	if($_SESSION['AdminBtsuLI']=='1'){
		$doyz='2';
		$_SESSION['AdminBtsuLI']='1';
		$_SESSION['AdminBtsuU']=$_SESSION['AdminBtsuU'];
		$_SESSION['AdminBtsuGroup']=$_SESSION['AdminBtsuGroup'];
	}else{
		$doyz='1';
	}
}
if($doyz=='1'){
if(!isset($_POST['username'],$_POST['password'],$_POST['jyjg'])){
	            $tmod='BUError';
	            $btsuerrormsg='请输入用户名和密码！';
				include('intem.php');
				exit;
}
if($_SESSION["jyjg"]!="AdminBtsuOK"){
		if($_SESSION["jyjg"]!=intval($_POST["jyjg"])){
			$tmod='BUError';
		    $btsuerrormsg='验证计算错误!';
			include('intem.php');
			exit;
	    }
		}
$username=fzr(trim($_POST['username']));
$password=md5(trim($_POST['password']));
$sqladmin=mysql_query("SELECT * FROM `".$mysql_head."admin` WHERE `adminname`='".$username."' AND `zt`='1' ",$linka);
$adminusc='2';
if($infoadmin=mysql_fetch_object($sqladmin)){
	if($infoadmin==""){
		$adminusc='2';
		}else{
			$infopass=$infoadmin->password;
			if($infopass===$password){
				$adminusc='1';
				$admingroup=$infoadmin->group;
			}
			unset($infopass);
			unset($password);
		}
	}else{
		$adminusc='2';
	}
if($adminusc!='1'){
	$tmod='BUError';
		    $btsuerrormsg='登陆失败！';
			include('intem.php');
			exit;
}
$_SESSION['AdminBtsuLI']='1';
$_SESSION['AdminBtsuGroup']=$admingroup;
$_SESSION['AdminBtsuU']=$username;
unset($username);
}
if(isset($_GET['logout'])){
	if($_GET['logout']=='logout'){
	$_SESSION['AdminBtsuLI']='2';
	$_SESSION['AdminBtsuGroup']='2';
	$_SESSION['AdminBtsuU']='2';
	unset($_SESSION['AdminBtsuLI']);
    unset($_SESSION['AdminBtsuGroup']);
	unset($_SESSION['AdminBtsuU']);
	?>
			<script language="javascript" type="text/javascript">
           window.location.href="LoginADMIN.php"; 
            </script>
	<?
	}
}
if(!isset($_GET['msg'])){
	$msg='index';
 }else{
	$msg=trim($_GET['msg']);
 }
 switch($msg){
	 case "list":
		 $dhlight='2';
	 break;
	 case "GFlist":
		 $dhlight='3';
	 break;
	 case "history":
		 $dhlight='4';
	 break;
	 case "btszcloud":
		 $dhlight='5';
	 break;
	 case "wblack":
		 $dhlight='6';
	 break;
	 case "eblack":
		 $dhlight='7';
	 break;
	 case "runzc":
		 $InBtsuAdmin='1';
		 echo 'BTSnowBall站云引擎载入中....<br />';
		 include('zcloud/zcrun.php');
	 exit;
	 break;
	 default:
		 $dhlight='1';
	 break;
 }
$InBtsuAdmin='1';
if(isset($_SESSION['AdminBtsuGroup'])){
$admingroup=$_SESSION['AdminBtsuGroup'];
}else{
$admingroup=999;
}
$tmod='AdminBtsu';
include('intem.php');