<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(isset($_SESSION['op'])){
$op=$_SESSION['op'];
$user=$_SESSION['user'];
}
require './src/wekit.php';
$_SESSION['op']=$op;
$_SESSION['user']=$user;
$components = array('router' => array());
Wekit::run('windidnotify', $components);
?>