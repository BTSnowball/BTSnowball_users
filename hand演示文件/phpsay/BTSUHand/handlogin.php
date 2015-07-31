<?php
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
	$rid="2";
}
$handdljg=handdl($username,$password,$fs,$rid);
$Iusername=$username;
$Uusername=$username;