<?php
if(!defined('IN_BTSUE_INS')) {
	exit('CK Faild!');
}
?>
<div class="container-fluid text-center">
 <h4><strong>同步至默认站云！</strong></h4><br />
 </div>
 <div class="container-fluid text-center">
 <div class="row">
 <div class="col-md-3">&nbsp;</div>
 <div class="col-md-6">
 <br />
 <?php
 include('../fuc/fuc_c.php');
 include('../config/Web_config.php');
 $churl='http://servera.zc.cloud.btsclouds.org/?msg=autoapi&servername='.urlencode($Wname).'&serverurl='.$WDomain.'&email='.urlencode($btsuadminemail).'&lug='.$temp.'&key='.urlencode($btsuzckey).'&txt='.urlencode($WebTxt);
 $churlb='http://servera.zc.cloud.btsnowball.org/?msg=autoapi&servername='.urlencode($Wname).'&serverurl='.$WDomain.'&email='.urlencode($btsuadminemail).'&lug='.$temp.'&key='.urlencode($btsuzckey).'&txt='.urlencode($WebTxt);
 ACurlKey($churl);
 ACurlKey($churlb);
 
 ?>
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