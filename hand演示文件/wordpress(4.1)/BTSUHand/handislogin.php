<?php
if(!defined('IN_BTSUE')) {
	exit('CK Faild!');
}
include_once('hand.php');
$Handislogin='2';
require( '../wp-load.php' );
if ( is_user_logged_in() )
{
	$current_user = wp_get_current_user();
	$Iuid=$current_user->ID;
	$Handislogin="1";
if($HandUE=="1"){
	$LUser=$current_user->user_login;
	if($Uuser==$LUser){
		$HandUEYZ="1";
	}else{
		$HandUEYZ="2";
	}
}else{
    $HandUEYZ="2";
	}
}else{
	$Handislogin="2";
	$HandUEYZ="2";
}