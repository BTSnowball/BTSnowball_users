<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
//error_reporting(0);
/*引导程序启动*/
$run='1';//1-启动 2-停止
$irunlock='1';
$pgaq='1';//根据配置选择
if($run!='1'){
	echo 'STOP！';
	exit;
}
unset($run);
if(!defined('IN_BTSUE')){
define('IN_BTSUE', TRUE);
}
include('./dorun/Run_Mysql_i.php');
//global $linka;
	include_once('config/Web_config.php');
	include_once($WBuHand.'handrun.php');
	include_once('fuc/fuc_a.php');
	include_once('fuc/fuc_b.php');
	include_once('fuc/fuc_c.php');
	include_once('fuc/fuc_o.php');
switch($pgaq){
	case "1":
		include_once('fuc/GetPost_Safe_a.php');
	break;
	case "2":
		include_once('fuc/GetPost_Safe_b.php');
	break;
	default:
	break;
}
$pluswz='run';
include('btsuplus.php');