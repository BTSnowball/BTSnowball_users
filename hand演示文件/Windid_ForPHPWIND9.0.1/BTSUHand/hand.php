<?php
/*For Ucenter1.6.0/1.5.0
【GPL】
BY. SFXH
*/
if(!defined('IN_BTSUE')) {
	exit('CK Faild!');
}
include("config/handconfig.php");
include("fuc/handfuc_a.php");
include("../btsuser/client_api.php");
require_once '/windid_client/src/windid/WindidApi.php';
//$username='csa';
//$password='123456';
//$res=uc_user_login($username, $password,0,0);
//echo $res['0'];
//$uid=$res['0'];
//echo uc_user_synlogin($uid);
//echo 'end';
function handdl($username,$password,$fs=1,$rid=2){
	session_start();
	$username=fzr($username);
	$password=fzr($password);
	$windid = WindidApi::api('user');
	if(isEmail($username)){
		$dlfs='2';
	}else{
		$dlfs='0';
	}
	if($fs==1){
		if($dlfs==2){
		list($status, $user) = $windid->login($username,$password, 3);
		}else{
		list($status, $user) = $windid->login($username,$password, 2);
		}
		if($status<=0){
			if($rid!=1){
					return "FALSE";
			}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']=windidMsg($status);
						return $remsg;
			}
		}
		if($status==1){
			$_SESSION['op']='btsnowballsync'; //FOR PHPWIND9.0.1 ONLY
	        $_SESSION['user']=$user['uid'];//FOR PHPWIND9.0.1 ONLY
			$ucsynlogin = $windid->synLogin($user['uid']);
            echo $ucsynlogin;
			if($rid!=1){
					return 'TRUE';
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user['uid'];
						$remsg['username']=$user['username'];
						$remsg['email']=$user['email'];
						$remsg['txt']='登陆成功';
						return $remsg;
			}
		}
		if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='未定义';
						return $remsg;
		}
	}else if($fs==2){
		if($dlfs==2){
		$user = $windid->getUser($username,3);
		}else{
		$user = $windid->getUser($username,2);
		}
		if(isset($user['uid'])){
			$_SESSION['op']='btsnowballsync'; //FOR PHPWIND9.0.1 ONLY
	        $_SESSION['user']=$user['uid'];//FOR PHPWIND9.0.1 ONLY
			$ucsynlogin = $windid->synLogin($user['uid']);
            echo $ucsynlogin;
			if($rid!=1){
					return 'TRUE';
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user['uid'];
						$remsg['username']=$user['username'];
						$remsg['email']=$user['email'];
						$remsg['txt']='登陆成功';
						return $remsg;
			}
		}
		if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='登陆失败！用户不存在';
						return $remsg;
					}
	}else if($fs==3){
		if($dlfs==2){
		$user = $windid->getUser($username,3);
		}else{
		$user = $windid->getUser($username,2);
		}
		if(isset($user['uid'])){
			$_SESSION['op']='btsnowballsync'; //FOR PHPWIND9.0.1 ONLY
	        $_SESSION['user']=$user['uid'];//FOR PHPWIND9.0.1 ONLY
			$ucsynlogin = $windid->synLogin($user['uid']);
            echo $ucsynlogin;
			if($rid!=1){
					return $user['uid'];
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user['uid'];
						$remsg['username']=$user['username'];
						$remsg['email']=$user['email'];
						$remsg['txt']='登陆成功';
						return $remsg;
			}
		}
		if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='登陆失败！用户不存在';
						return $remsg;
					}
	}else if($fs==4){
		if($dlfs==2){
		$user = $windid->getUser($username,3);
		}else{
		$user = $windid->getUser($username,2);
		}
		if(isset($user['uid'])){
			if($rid!=1){
					return $user['uid'];
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user['uid'];
						$remsg['username']=$user['username'];
						$remsg['email']=$user['email'];
						$remsg['txt']='登陆成功';
						return $remsg;
			}
		}
		if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='登陆失败！用户不存在';
						return $remsg;
					}
	}else{
			if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='Faild!';
						return $remsg;
					}
	}
}
function handqx($qxa,$user,$hdbname='BTSUHand'){ 
	/*如果将权限检查函数强制为根据USERNAME/EMAIL中的某一个检查则必须在handlogin中将将传入的值进行统一*/
	$qxa=trim($qxa);
	$user=fzr($user);
	$windid = WindidApi::api('user');
	if(isEmail($user)){
		$dlfs='2';
	}else{
		$dlfs='0';
	}
	if($dlfs==2){
		$user = $windid->getUser($username,3);
		}else{
		$user = $windid->getUser($username,2);
		}
	switch($qxa){
		case "nickname":
			return $user['username'];
			break;
		case "username":
			return $user['username'];
			break;
		case "email":
			return $user['email'];
		    break;
		default:
			return "cant";
			break;
	}
}
function handreg($username,$email,$password,$fs=1){
	error_reporting(~E_ALL);
	$username=fzr($username);
	$email=fzr($email);
	$password=fzr($password);
	$windid = WindidApi::api('user');
	$result = $windid->register($username,$email,$password); 
	 if ($result < 1) {  //返回信息小于1，说明没有注册成功
          $msg=windidMsg($result);  //调用错误处理提示
          if($result=="-10"){
			  $remsg['msg']=$msg;
			  $remsg['jg']='-6';
			  return $remsg;
		  }elseif($result=="-4" || $result=="-3"){
			  $remsg['msg']=$msg;
			  $remsg['jg']='-2';
			  return $remsg;
		  }elseif($result=="-5"){
			  $remsg['msg']=$msg;
			  $remsg['jg']='-3';
			  return $remsg;
		  }elseif($result=="-7"){
			  $remsg['msg']=$msg;
			  $remsg['jg']='-4';
			  return $remsg;
		  }elseif($result=="-8" || $result=="-9"){
			  $remsg['msg']=$msg;
			  $remsg['jg']='-5';
			  return $remsg;
		  }elseif($result=="-2" || $result=="-1"){
			  $remsg['msg']=$msg;
			  $remsg['jg']='-1';
			  return $remsg;
		  }else{
			  $remsg['msg']=$msg;
			  $remsg['jg']='-7';
			  return $remsg;
		  }
     }else{
		 $remsg['msg']='注册成功';
		 $remsg['jg']='1';
		 $remsg['uid']=$result;
		 if($fs==2){
			$ucsynlogin = $windid->synLogin($result);
            echo $ucsynlogin;
		 }
		 return $remsg;
	 }
}
function CKIuid(){
	return '0';
}