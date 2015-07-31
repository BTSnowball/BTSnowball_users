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
 $lines = file('./include/install.sql');
 foreach ($lines as $line)
{
if (substr($line, 0, 2) == '--' || $line == '')
    continue;
$templine='';
$templine .= $line;
if (substr(trim($line), -1, 1) == ';')
{
    mysql_query($templine,$linka);
    $templine = '';
}
}
 include('../fuc/fuc_c.php');
 $churl='http://servera.zc.cloud.btsclouds.org/?msg=autoapi&servername='.urlencode($Wname).'&serverurl='.$WDomain.'&email='.urlencode($btsuadminemail).'&lug='.$temp.'&key='.urlencode($btsuzckey).'&txt='.urlencode($WebTxt);
 $churlb='http://servera.zc.cloud.btsnowball.org/?msg=autoapi&servername='.urlencode($Wname).'&serverurl='.$WDomain.'&email='.urlencode($btsuadminemail).'&lug='.$temp.'&key='.urlencode($btsuzckey).'&txt='.urlencode($WebTxt);
 ACurlKey($churl);
 ACurlKey($churlb); 
 ?>
<strong>数据库导入完成！</strong><br />
<em>如果导入出现问题您可以选择将./btsuser/install/include/install.sql文件直接在phpmyadmin中执行.执行前记得创建并清空好指定数据库<?php echo $mysql_dbname ?>。</em>
<br /><br />
<strong>站云数据同步更新完成。</strong><br />
<em>站云数据将帮助你的网站发现兄弟网站并进行交互，帮助你更新黑名单。首次引导请在ADMIN界面进行。默认站云是官方提供的，本云只提供有保障的基础数据您可以同时载入其它站云进行完善。具体请参见官方网站说明。</em>
<br /><br />
 <center>
 <a class="btn btn-primary" href="install.php?setup=8">&nbsp;&nbsp;下一步&nbsp;&nbsp;</a>
 </center>
 </div>
 <div class="col-md-3">&nbsp;</div>
 </div>
 </div>