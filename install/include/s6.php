<?php
if(!defined('IN_BTSUE_INS')) {
	exit('CK Faild!');
}
?>
<div class="container-fluid text-center">
 <h4><strong>执行安装！</strong></h4><br />
 </div>
 <div class="container-fluid text-center">
 <div class="row">
 <div class="col-md-3">&nbsp;</div>
 <div class="col-md-6">
 <br />
 <?php
 include('../config/MYSQL_CONFIG.php');
 include('../config/Web_config.php');
$linka=mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("数据库连接失败".mysql_error());
mysql_select_db($mysql_dbname,$linka);
mysql_query("set names utf8");
$dbfile="./include/install.sql"; 
$content=file_get_contents($dbfile); 
//获取创建的数据 
//去掉注释 
$content=preg_replace("/--.*\n/iU","",$content); 
//替换前缀 


$carr=array(); 
$iarr=array(); 
//提取create 
preg_match_all("/Create table .*\(.*\).*\;/iUs",$content,$carr); 
$carr=$carr[0]; 
foreach($carr as $c) 
{ 
@mysql_query($c,$linka); 
} 

//提取insert 
preg_match_all("/INSERT INTO .*\(.*\)\;/iUs",$content,$iarr); 
$iarr=$iarr[0]; 
//插入数据 
foreach($iarr as $c) 
{ 
@mysql_query($c,$linka); 
}
 
 ?>
<strong>数据库导入完成！如果您需要同步至站云，请点击下一步。否则请点击跳过。</strong><br />
<em>如果导入出现问题您可以选择将./btsuser/install/include/install.sql文件直接在phpmyadmin中执行.执行前记得创建并清空好指定数据库<?php echo $mysql_dbname ?>。</em>
<br /><br />
 <center>
 <a class="btn btn-primary" href="install.php?setup=7">&nbsp;&nbsp;下一步&nbsp;&nbsp;</a>&nbsp;<a class="btn btn-default" href="install.php?setup=8">&nbsp;&nbsp;跳过&nbsp;&nbsp;</a>
 </center>
 </div>
 <div class="col-md-3">&nbsp;</div>
 </div>
 </div>