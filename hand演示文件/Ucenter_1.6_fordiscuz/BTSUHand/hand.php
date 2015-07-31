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
include("config_ucenter.php");
include("uc_client/client.php");
include("../btsuser/client_api.php");
//$username='csa';
//$password='123456';
//$res=uc_user_login($username, $password,0,0);
//echo $res['0'];
//$uid=$res['0'];
//echo uc_user_synlogin($uid);
//echo 'end';
function handdl($username,$password,$fs=1,$rid=2){
	$username=addslashes($username);
	if(isEmail($username)){
		$dlfs='2';
	}else{
		$dlfs='0';
	}
	if($fs==1){
		$res=uc_user_login($username, $password,$dlfs,0);
		if($res['0']<=0){
			//RES
		  if($res['0'] == -1) {
			  if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='用户不存在,或者被删除';
						return $remsg;
					}
          } elseif($res['0'] == -2) {
			  if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='密码错';
						return $remsg;
					}
          } else {
			  if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='未定义';
						return $remsg;
					}
          }
		  //RES
		}else{
		  $uid=$res['0'];
		  $username=$res['1'];
		  $uemail=$res['3'];
		  echo uc_user_synlogin($uid);
		  if($rid!=1){
					return 'TRUE';
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$uid;
						$remsg['username']=$username;
						$remsg['email']=$uemail;
						$remsg['txt']='登陆成功';
						return $remsg;
					}
		}
	}else if($fs==2){
		if($dlfs=='2'){
			 $umsgi=QCBDUser($username,4,'none');
			 $username=$umsgi['Iusername'];
		}
		if($data = uc_get_user($username)) {
	    //list($uid, $username, $email) = $data;
		$uid=$data['0'];
		echo uc_user_synlogin($uid);
		if($rid!=1){
					return "TRUE";
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$uid;
						$remsg['username']=$username;
						$remsg['email']='cant';
						$remsg['txt']='登陆成功';
						return $remsg;
					}
        } else {
			if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='用户不存在';
						return $remsg;
					}
        }
	}else if($fs==3){
		if($dlfs=='2'){
			 $umsgi=QCBDUser($username,4,'none');
			 $username=$umsgi['Iusername'];
		}
		 if($data = uc_get_user($username)) {
	    //list($uid, $username, $email) = $data;
		$uid=$data['0'];
		echo uc_user_synlogin($uid);
		if($rid!=1){
					return $uid;
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$uid;
						$remsg['username']=$username;
						$remsg['email']=$uemail;
						$remsg['txt']='登陆成功';
						return $remsg;
					}
        } else {
	    if($rid!=1){
					return "FALSE";
					}else{
						$remsg['jg']="FALSE";
						$remsg['username']=$username;
						$remsg['txt']='用户不存在';
						return $remsg;
					}
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
function handqx($qxa,$user,$hdbname){ 
	/*如果将权限检查函数强制为根据USERNAME/EMAIL中的某一个检查则必须在handlogin中将将传入的值进行统一*/
	$qxa=trim($qxa);
	$user=addslashes($user);
	if($data = uc_get_user($user)) {
		list($uid, $username, $email) = $data;
	}else{
		return '用户不存在';
	}
	switch($qxa){
		case "nickname":
			return $username;
			break;
		case "username":
			return $username;
			break;
		case "email":
			return $email;
		    break;
		default:
			return "cant";
			break;
	}
}
function handreg($username,$email,$password){
	error_reporting(~E_ALL);
	$username=addslashes($username);
	$email=addslashes($email);
	$password=addslashes($password);
	$uid = uc_user_register($username, $password, $email);
    if($uid <= 0) {
	if($uid == -6) {
		        $remsg['msg']='该 Email 已经被注册';
				$remsg['jg']='-6';
				return $remsg;
	} elseif($uid == -2) {
		        $remsg['msg']='包含不允许注册的词语';
				$remsg['jg']='-2';
				return $remsg;
	} elseif($uid == -3) {
		        $remsg['msg']='用户名已经存在';
				$remsg['jg']='-3';
				return $remsg;
	} elseif($uid == -4) {
		        $remsg['msg']='Email 格式有误';
				$remsg['jg']='-4';
				return $remsg;
	} elseif($uid == -5) {
		        $remsg['msg']='Email 不允许注册';
				$remsg['jg']='-5';
				return $remsg;
	} elseif($uid == -1) {
		        $remsg['msg']='用户名不合法';
				$remsg['jg']='-1';
				return $remsg;	        
	} else {
				$remsg['msg']='未定义';
				$remsg['jg']='-7';
				return $remsg;
	}
    } else {
	            $remsg['msg']='注册成功';
				$remsg['jg']='1';
				$remsg['uid']=$uid;
				include('./dorun/Run_Mysql.php');
	            mysql_query("insert into ".$mysql_head."common_member(uid,username,adminid) values('$uid','$username','0')",$linka);
	            mysql_query("insert into ".$mysql_head."common_member_count(uid) values('$uid')",$linka);
				return $remsg;
    }
	/*
	mysqli_query($dbc,"INSERT INTO pre_common_member(uid,username,adminid) VALUES ('$uid','$login_user_name','0')") and 
                  mysqli_query($dbc,"INSERT INTO pre_common_member_count (uid) values ('$uid')")
				  */
}
function CKIuid(){
	return '0';
}