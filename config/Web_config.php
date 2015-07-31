<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
//这是设置文件
$Wname="BTSnowball_Users_Example"; //设置您的网站名，这个将会作为返回数据传递给其它网站
$Wlogo="Http://***.***/***/***.png";//设置您的网站LOGO地址，LOGO尽可能小用户请求时将会刷新。
$WDomain="www.example.***";//将自动索引http://你的域名/BTSUSER/下的API文件务必正确注意不要写http://
$SDomain="www.example.***";//本站域名_一般与WDomain相同
$WebTxt="一个搭载了BTSnowball_的超级应用"; //网站介绍文字
$WHanddir="../BTSUHand/";  //BTSUHand文件的相对路径，一般无需更改。
$WBuHand="buhand/forall/";  //Hand加载补充筛选器，这个目前不需要改。
$JumpCos="1";  //1 or 0
$temp="zh-cn";  //模版选择，默认为zh-cn。我们需要翻译英文版
$helpbtsu='1';  //是否向BTSnowball.Org反馈运行状态帮助BTSnowball进行改进 1为开启 2为关闭
//=======================站云登入信息基础
$btsuadminemail='admin@admin.com';  //您的网站/应用管理员邮箱地址。必须修改，用以联系管理员
$btsuzckey='all';  //当自动提交至站云时有光网站/应用的关键字。
//=======================程序版本 不要改，会导致其它节点对您节点的误判导致匹配失败
$devname="TheOtherRise";
$devv="0.7.0";
$BTSnowball_isvista='1';  // 1- Alpha 2- RC 3-AB
//=======================
$BTSUVersion="1.0";  //执行的协议版本
$URLrep="http://";  //URL修正参数。用以让其它连接者能够对贵网站的URL进行修正。例如贵网站希望修正后是https://A.$WDomain则填写https://A.更改此参数需要您对将改变的协议有一定的了解
//=======================
$wastetime=259200;  //垃圾判定时间
$wastedo=10;  //垃圾清理触发几率（千分之），清理垃圾将导致到达判定时间的bh值被清空
//=======================EMAILSEND设置（非常重要）
$mailfs='2'; //1-mail() 2-SMTP 3-预留 4-STOP
$smtpserver = "smtp.cloud.btsnowball.org";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "pubcloud@btsnowball.com";//SMTP服务器的用户邮箱
$smtpuser = "pubcloud@btsnowball.com";//SMTP服务器的用户帐号
$smtppass = "pubcloud";//SMTP服务器的用户密码
$mailcloud = "public.mailserver.btsclouds.org";//公有MAILSERVER地址，提交遵循BTSnowball_Users_Mail分支规章。截止本程序发布该值为预留，站云官方启用时方可生效。官方将要架设的公共服务器是public.mailserver.btsclouds.org和public.mailserver.btsnowball.org