<?php
if(!defined('IN_BTSUE')) {
	exit('CK Faild!');
}
include_once("hand.php");
if(!isset($username)){
	echo "Faild!1";
	exit;
}
if(!isset($password)){
	echo "Faild!2";
	exit;
}
if(!isset($fs)){
	$fs="1";
}
if(!isset($rid)){
	$rid="1";
}
$handdlfh=handdl($username,$password,$fs,$rid);
//$username=$handdljg['username'];
echo $username;
echo $handdlfh['txt'];
if($rid==1){
$handdljg=$handdlfh['jg'];
$username=$handdlfh['username'];
}else{
$handdljg=$handdlfh;
}
