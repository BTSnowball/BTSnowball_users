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
 <h3>MYSQL_CONFIG.PHP-说明:</h3><br />
该文件是驱动MYSQL链接的配置文件，在您将数据库连接设置为Mysql_方式时该配置文件有效。当前版本默认为Mysql_方式。<br />
<em>文件地址 ./btsuser/config/MYSQL_CONFIG.PHP</em><br />
$mysql_host -该值是您的数据库服务器地址。如果您的数据库就在本机上请填写127.0.0.1.请将3306端口开启为MYSQL数据库服务端口。 <br />	
$mysql_user -该值是您所指定的数据库用户名。例如root。<br />	
$mysql_pass -数据库用户名的密码。<br />	
$mysql_dbname -您为BTSnowball_Users创建的数据库名称。<br />	
$mysql_head -一般无需修改，这是数据库表的前缀"btsu_"。除非您把表前缀都改动掉了。<br /><br />
<h3>Web_config.php-说明:</h3><br />
该文件是核心配置文件，部分信息如果您勾选了加入官方站云将在本向导结束后和站云进行初始化同步。<br />
<em>文件地址 ./btsuser/config/Web_config.PHP</em><br />
$Wname -您的网站名称。必须修改<br />
$Wlogo -您的网站LOGO地址。 必须修改<br />
$WDomain -您的网站地址。其它网站将通过该地址对您的网站进行寻址。将通过在该地址后加/btsuser/对您的网站api进行寻址。仅为域名，不加http://或https://。必须修改并确保正确<br />
$SDomain -您的网站地址。一般与$WDomain值相同。<br />
$WebTxt -您的网站介绍。必须修改<br />
$WHanddir -您的网站HAND文件相对于主引擎的目录。默认是"../BTSUHand/"。<br />
$WBuHand -Hand信息挂载器。一般无需修改<br />
$JumpCos -默认为1，一般无需修改。<br />
$temp -选择模板文件。默认是系统自带的"zh-cn"中文模板。
$devname；$devv；$BTSnowball_isvista； -引擎相关信息，以便其它引擎对你的状态的识别。一般无需修改。<br />
$BTSUVersion -执行的BTSnowball_Users协议的版本。默认是1.0.<br />
$URLrep -您的地址的重构头参数。例如http://或https://。默认http://<br />
$wastetime -垃圾认定门槛。单位秒 一般无需修改。<br />
$wastedo -垃圾清理触发几率。千分之。默认是10<br />
----------------------------------------------以下是MAIL配置。用户在您应用的独立密码将通过邮箱的方式投递至用户的邮件地址，请根据所需要进行设置。截止V0.7.0.0发布时，mailcloud还未正式运行，正在寻求赞助商，故推荐SMTP方式。<br />
$mailfs -邮件投送方式。1-mail() 2-SMTP 3-mailcloud 4-STOP<br />
$smtpserver -SMTP服务器地址。<br />
$smtpserverport -SMTP服务器端口。<br />
$smtpusermail -所使用的邮箱地址。<br />
$smtpuser -所使用的邮箱地址用户名。<br />
$smtppass -所对应的密码。<br />
$mailcloud -mailcloud对应的提交地址。<br />
----------------------------------------------<br />
$dbchoose -您所选用的数据库。默认是Mysql<br />
$dbconnect -数据库连接方式。默认是Mysql_<br />
<br />
<strong>充分核对是否妥善修改好了配置文件后点击下一步</strong>
<br /><br />
 <center>
 <a class="btn btn-primary" href="install.php?setup=4">&nbsp;&nbsp;下一步&nbsp;&nbsp;</a>
 </center>
 </div>
 <div class="col-md-3">&nbsp;</div>
 </div>
 </div>