<?php
include("config/handconfig.php");
function handdl($username,$password,$fs=1,$rid=2){
	require_once("../global.php");
	$username=str_safe_e($username);
	$password=str_safe_e($password);
		//yixiagaiziyuanwen
	$loginAccount	= strtolower(stripslashes(trim($username)));


			$loginPassword	= stripslashes($password);

			if( strlen($loginAccount) < 2 )
			{
				return "账号无效";
			}
				
			if( strlen($loginPassword) < 6 || strlen($loginPassword) > 26 || substr_count($loginPassword," ") > 0 )
			{
				return "密码无效";
			}

			$loginType = "nickname";

			if( emailCheck($loginAccount) )
			{
				$loginType = "email";
			}
			else
			{
				if( checkNickname($loginAccount) != "" )
				{
					return "账号不合法";
				}
			}

			$DB = database();

			$userInfo = PHPSay::getMemberInfo($DB,$loginType,$loginAccount);

			if( empty($userInfo['uid']) )
			{
				return "账号不存在";
			}
			else
			{
				if($fs==1){
				if( md5($loginPassword) == $userInfo['password'] )
				{
					loginCookie($PHPSayConfig['ppsecure'],$userInfo['uid'],$userInfo['nickname'],$userInfo['groupid']);

					if($rid!=1){
					return "TRUE";
					}else{
						$remsg["jg"]="TRUE";
						$remsg["uid"]=$userInfo['uid'];
						return $remsg;
					}
				}
				else
				{
					if( $userInfo['password'] == "" )
					{
						return "该账号不支持密码登录";
					}
					else
					{
						return "账号与密码不匹配";
					}
				}
				}else if($fs==2){
					loginCookie($PHPSayConfig['ppsecure'],$userInfo['uid'],$userInfo['nickname'],$userInfo['groupid']);


					if($rid!=1){
					return "TRUE";
					}else{
						$remsg["jg"]="TRUE";
						$remsg["uid"]=$userInfo['uid'];
						return $remsg;
					}
				}else if($fs==3){
					   $reid=$userInfo['uid'];
					   if($rid!=1){
					   return $userInfo['uid'];
					   }else{
						$remsg["jg"]="TRUE";
						$remsg["uid"]=$userInfo['uid'];
						return $remsg;
					   }
				}
			}

			$DB->close();
}
function handqx($qxa,$user,$hdbname){
	$qxa=trim($qxa);
	switch($qxa){
		case "nickname":
			$user=str_safe_e($user);
			include('dorun/Run_Mysql.php');
			mysql_select_db($hdbname,$linka);
			mysql_query("set names utf8");
			$sql=mysql_query("SELECT `nickname` FROM `phpsay_member` WHERE `email`='".$user."' ",$linka);
	        $info=mysql_fetch_object($sql);
						if($info==""){
		                return $user."SELECT `nickname` FROM `phpsay_member` WHERE `email`='".$user."' ".$linkb;
		                }
			$remail=$info->nickname;
			return $remail;
			break;
		case "username":
			return $user;
			break;
		case "email":
			$user=str_safe_e($user);
			include('/dorun/Run_Mysql.php');
			mysql_select_db($hdbname,$linka);
			mysql_query("set names utf8");
			@$sql=mysql_query("SELECT email FROM `phpsay_member` WHERE `nickname`='".$user."' ",$linka);
	        @$info=mysql_fetch_object($sql);
						if($info==""){
		                return $user;
		                }
			$remail=$info->email;
			return $remail;
		    break;
		default:
			return "cant";
			break;
	}
}
function handreg($nickname,$email,$password){
	        require_once("../global.php");
			error_reporting(~E_ALL);
	        $email	= strtolower(stripslashes(trim($email)));

			$nickname = filterCode($nickname,true);

			$password	= stripslashes($password);

			if( !emailCheck($email) )
			{
				$remsg["msg"]="邮件地址不正确1".$email;
				$remsg["jg"]="2";
				return $remsg;
			}

			$nicknameError = checkNickname($nickname);

			if( $nicknameError != "" )
			{
				$remsg["msg"]=$nicknameError;
				$remsg["jg"]="2";
				return $remsg;
			}

			if( substr_count($password," ") > 0 )
			{
				$remsg["msg"]="密码不能使用空格2";
				$remsg["jg"]="2";
				return $remsg;
			}

			if( strlen($password) < 6 || strlen($password) > 26 )
			{
				$remsg["msg"]="密码长度不合法3";
				$remsg["jg"]="2";
				return $remsg;
			}

			$DB = database();

			if( PHPSay::getMemberCount($DB,"email",$email) != 0 )
			{
				$remsg["msg"]="邮件地址已被占用,请进行帐号绑定4";
				$remsg["jg"]="3";
				return $remsg;
			}
			else
			{
				if( PHPSay::getMemberCount($DB,"nickname",$nickname) != 0 )
				{
					$remsg["msg"]="昵称已被占用,请进行帐号绑定5";
				    $remsg["jg"]="3";
				    return $remsg;
				}
				else
				{
					$userID = PHPSay::memberJoin($DB,$nickname,$email,md5($password),"");

					if ($userID > 0)
					{
						newAvatar($userID,"");

						loginCookie($PHPSayConfig['ppsecure'],$userID,$nickname,1);

						$remsg["msg"]="注册成功";
				        $remsg["jg"]="1";
				        return $remsg;
					}
					else
					{
						$remsg["msg"]="注册失败6";
				        $remsg["jg"]="2";
				        return $remsg;
					}
				}
			}

			$DB->close();
}
function CKIuid(){
	require_once("../global.php");
	if ( $loginInfo['uid'] > 0 )
			{
				return $loginInfo['uid'];
			}
	return "0";
}
?>