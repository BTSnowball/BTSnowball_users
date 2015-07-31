<?php
if(!defined('IN_BTSUE_INS')) {
	exit('CK Faild!');
}
?>
<div class="container-fluid text-center">
 <h4><strong>即将执行！</strong></h4><br />
 </div>
 <div class="container-fluid text-center">
 <div class="row">
 <div class="col-md-3">&nbsp;</div>
 <div class="col-md-6">
 <br />
 <?php
 include('../config/MYSQL_CONFIG.php');
 include('../config/Web_config.php');
 echo '确认将安装至数据库:'.$mysql_dbname.'@'.$mysql_host.'by'.$mysql_user.'['.$mysql_pass.']<br />';
 echo '确认您的网站名称是:'.$Wname.'<br />网站地址是：'.$WDomain.'|'.$SDomain.'<br />网站介绍是：'.$WebTxt.'<br />';
 ?>
<strong>请确保数据库已经建立并清空!</strong><br />
<strong>准备好了后点击下一步将执行安装并同步信息至站云。其它网站/应用将能主动发现您的网站（推荐）。<br />单击仅执行将执行安装但不同步至站云（供白盒）。</strong>
<br /><br />
 <center>
 <a class="btn btn-primary" href="install.php?setup=5">&nbsp;&nbsp;下一步&nbsp;&nbsp;</a>&nbsp;<a class="btn btn-default" href="install.php?setup=6">&nbsp;&nbsp;仅执行&nbsp;&nbsp;</a>
 </center>
 </div>
 <div class="col-md-3">&nbsp;</div>
 </div>
 </div>