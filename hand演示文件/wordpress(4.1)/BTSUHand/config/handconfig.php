<?php
$NeedM="username,email";//需求信息的指令集
$hdbname="wpdb";//鉴于有些应用需要直接操作数据库。词值必须设置，若您的HAND无序用到可以随意写
$HWdoamin="wp.****.com";  //访问域名 一定要和btsuser设置一致
$HcWdoamin="wp.****.com";  //一般和HWdomain是一样的
//=====================Hand程序响应列表=====================
$BTSUIsICan=array();
$BTSUIsICan[]='nickname';
$BTSUIsICan[]='username';
$BTSUIsICan[]='email';
$BTSUIsUNms=array();
$BTSUIsUNms[]='nickname';
$BTSUIsUNms[]='username';
$BTSUIsUNms[]='email';
//==========================================================
$wpcanemail=2;  // 是否支持EMAIL自动拾取、1为支持
?>