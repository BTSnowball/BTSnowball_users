<?php
/*For WORDPRESS 
【BTSPL】
BY. SFXH
*/
if(!defined('IN_BTSUE')) {
	exit('CK Faild!');
}
define('WP_USE_THEMES', true);
include("config/handconfig.php");
include("fuc/handfuc_a.php");
//include("../btsuser/client_api.php");
function handdl($username,$password,$fs=1,$rid=2){
	require( '../wp-load.php' );
	global $wpdb;
	$username=addslashes($username);
	include("config/handconfig.php");
	if($wpcanemail==1){
	if(isEmail($username)){
		$dlfs='2';
	}else{
		$dlfs='0';
	}
	}else{
		$dlfs='3';
	}
	if($fs==1){
         global $wp_hasher;
         if ( empty($wp_hasher) ) {
         require_once( '../wp-includes/class-phpass.php');
         $wp_hasher = new PasswordHash(8, TRUE);
 } 
		 if($dlfs==2){
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 if(!$user_id){
			 if($rid!=1){
			 return 'FALSE';
			 }else{
				 $remsg['jg']="FALSE";
				 $remsg['username']=$username;
				 $remsg['txt']='用户不存在,或者被删除';
				 return $remsg;
			 }
		 }
		 if($dlfs==2){
		 $user_pass = $wpdb->get_var("SELECT user_pass FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_pass = $wpdb->get_var("SELECT user_pass FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 $chekup = $wp_hasher->CheckPassword($password,$user_pass);
		 if($chekup){
		 wp_set_auth_cookie($user_id,true,false);
         wp_set_current_user($user_id);
		 }else{
			 if($rid!=1){
			 return 'FALSE';
			 }else{
				 $remsg['jg']="FALSE";
				 $remsg['username']=$username;
				 $remsg['txt']='Password Error!';
				 return $remsg;
			 }
		 }
		 $user_email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE ID='$user_id' ");
		 if($rid!=1){
					return $user_id;
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user_id;
						$remsg['username']=$username;
						$remsg['email']=$user_email;
						$remsg['txt']='登陆成功';
						return $remsg;
					}
	}else if($fs==2){
			 if($dlfs==2){
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 if(!$user_id){
			 if($rid!=1){
			 return 'FALSE';
			 }else{
				 $remsg['jg']="FALSE";
				 $remsg['username']=$username;
				 $remsg['txt']='用户不存在,或者被删除';
				 return $remsg;
			 }
		 }
		 wp_set_auth_cookie($user_id,true,false);
         wp_set_current_user($user_id);
		 $user_email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE ID='$user_id' ");
		 if($rid!=1){
					return 'TRUE';
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user_id;
						$remsg['username']=$username;
						$remsg['email']=$user_email;
						$remsg['txt']='登陆成功';
						return $remsg;
					}
	}else if($fs==3){
			 if($dlfs==2){
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 if(!$user_id){
			 if($rid!=1){
			 return 'FALSE';
			 }else{
				 $remsg['jg']="FALSE";
				 $remsg['username']=$username;
				 $remsg['txt']='用户不存在,或者被删除';
				 return $remsg;
			 }
		 }
		 wp_set_auth_cookie($user_id,true,false);
         wp_set_current_user($user_id);
		 $user_email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE ID='$user_id' ");
		 if($rid!=1){
					return $user_id;
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user_id;
						$remsg['username']=$username;
						$remsg['email']=$user_email;
						$remsg['txt']='登陆成功';
						return $remsg;
					}
	}else if($fs==4){
		 if($dlfs==2){
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 if(!$user_id){
			 if($rid!=1){
			 return 'FALSE';
			 }else{
				 $remsg['jg']="FALSE";
				 $remsg['username']=$username;
				 $remsg['txt']='用户不存在,或者被删除';
				 return $remsg;
			 }
		 }
		 $user_email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE ID='$user_id' ");
		 if($rid!=1){
					return $user_id;
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user_id;
						$remsg['username']=$username;
						$remsg['email']=$user_email;
						$remsg['txt']='登陆成功';
						return $remsg;
					}
	}else if($fs==5){
		 global $wp_hasher;
         if ( empty($wp_hasher) ) {
         require_once( '../wp-includes/class-phpass.php');
         $wp_hasher = new PasswordHash(8, TRUE);
 } 
         if(isEmail($username)){
		 $dlfs='2';
	     }else{
		 $dlfs='0';
	     }
		 if($dlfs==2){
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 if(!$user_id){
			 if($rid!=1){
			 return 'FALSE';
			 }else{
				 $remsg['jg']="FALSE";
				 $remsg['username']=$dlfs;
				 $remsg['txt']='用户不存在,或者被删除';
				 return $remsg;
			 }
		 }
		 if($dlfs==2){
		 $user_pass = $wpdb->get_var("SELECT user_pass FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_pass = $wpdb->get_var("SELECT user_pass FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 $chekup = $wp_hasher->CheckPassword($password,$user_pass);
		 if($chekup){
		 wp_set_auth_cookie($user_id,true,false);
         wp_set_current_user($user_id);
		 }else{
			 if($rid!=1){
			 return 'FALSE';
			 }else{
				 $remsg['jg']="FALSE";
				 $remsg['username']=$username;
				 $remsg['txt']='Password Error!';
				 return $remsg;
			 }
		 }
		 $user_email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE ID='$user_id' ");
		 if($rid!=1){
					return $user_id;
					}else{
						$remsg['jg']="TRUE";
						$remsg['uid']=$user_id;
						$remsg['username']=$username;
						$remsg['email']=$user_email;
						$remsg['txt']='登陆成功';
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
	$username=addslashes($user);
	require( '../wp-load.php' );
	global $wpdb;
	if($wpcanemail===1){
	if(isEmail($user)){
		$dlfs='2';
	}else{
		$dlfs='0';
	}
	}else{
		$dlfs='3';
	}
	if($dlfs===2){
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $user_id = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login='$username' ");
		 }
		 if(!$user_id){
			 return '用户不存在';
		 }
	switch($qxa){
		case "nickname":
			if($dlfs===2){
		 $nickname = $wpdb->get_var("SELECT user_nicename FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $nickname = $wpdb->get_var("SELECT user_nicename FROM $wpdb->users WHERE user_login='$username' ");
		 }
			return $nickname;
			break;
		case "username":
			if($dlfs===2){
		 $username = $wpdb->get_var("SELECT user_login FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $username = $wpdb->get_var("SELECT user_login FROM $wpdb->users WHERE user_login='$username' ");
		 }
			return $username;
			break;
		case "email":
			if($dlfs===2){
		 $email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE user_email='$username' ");
		 }else{
		 $email = $wpdb->get_var("SELECT user_email FROM $wpdb->users WHERE user_login='$username' ");
		 }
			return $email;
		    break;
		default:
			return "cant";
			break;
	}
}
function handreg($username,$email,$password){
	error_reporting(~E_ALL);
	require( '../wp-load.php' );
	global $wpdb;
	$username=addslashes($username);
	$email=addslashes($email);
	$password=addslashes($password);
	$user_ida = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$email' ");
	if($user_ida){
		$remsg['msg']='该 Email 已经被注册';
				$remsg['jg']='-6';
				return $remsg;
	}
	unset($user_ida);
	$user_idb = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_email='$username' ");
	if($user_idb){
		$remsg['msg']='用户名已经存在';
				$remsg['jg']='-3';
				return $remsg;
	}
	$user_meta = array(
		'user_login' => $username,
		'user_pass' => $password,
		'display_name' => $username,
		'user_nicename' => $username,
		'nickname' => $username,
		'user_email' => $email
	);
	$user_id = wp_insert_user($user_meta);
	if(!is_wp_error($user_id)){
	update_user_meta($user_id,'btsnowball_userid',$user_id);
	wp_set_auth_cookie($user_id,true,false);
    wp_set_current_user($user_id);
	$remsg['msg']='注册成功';
				$remsg['jg']='1';
				$remsg['uid']=$user_id;
				return $remsg;
	}else{
		$remsg['msg']='未定义';
				$remsg['jg']='-7';
				return $remsg;
	}
}
function CKIuid(){
	return '0';
}