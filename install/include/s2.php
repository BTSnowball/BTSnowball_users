<?php
if(!defined('IN_BTSUE_INS')) {
	exit('CK Faild!');
}
?>
<div class="container-fluid text-center">
 <h4><strong>开始安装BTSnowball_Users的准备工作</strong></h4><br />
 </div>
 <div class="container-fluid text-center">
 <div class="row">
 <div class="col-md-3">&nbsp;</div>
 <div class="col-md-6">
 <br />
 您现在即将安装的版本是VISTA_V0.7.0.0_20150717版<br />
 作为预览版的该版我们没有提供傻瓜式的安装向导，本向导将引导您一步一步手动化完成BTSnowball_Vista_V0.7.0.0_20150717(PHP/MYSQL)<br />
 现在我们线做一些准备工作：<br />
 ①检查您的系统环境：<br />
 我们建议您采用LAMP或WIMP环境搭配，其中MYSQL数据库建议版本为5.0+ PHP环境建议版版本为5.2+<br />
 ②检查您的PHP环境:
 在该版本中您必须开启以下扩展<br />
 MYSQL_<br />
 CURL<br />
 GD2<br />
 ③请做好目录权限安全工作。手动配置btsuser/config/下的如下文件:<br />
 MYSQL_CONFIG.PHP<br />
 Web_config.php<br />
 打开文件后有说明2注释，无注释内容如果你不知道那是做什么的请不要动。<br />
 如果您不了解您要改动的东西的实际作用轻点查看详细说明！<br /><br />
 <center>
 <a class="btn btn-success" href="install.php?setup=3">&nbsp;&nbsp;查看说明&nbsp;&nbsp;</a>
 <a class="btn btn-primary" href="install.php?setup=4">&nbsp;&nbsp;下一步&nbsp;&nbsp;</a>
 </center>
 </div>
 <div class="col-md-3">&nbsp;</div>
 </div>
 </div>