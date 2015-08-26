<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
include('./config/MySQL_CONFIG.php');
//$linka=mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("数据库连接失败".mysql_error());
$linkai = mysqli_connect($mysql_host,$mysql_user,$mysql_pass) or die(mysqli_connect_error());
//mysql_select_db($mysql_dbname,$linka);
mysqli_select_db($linkai,$mysql_dbname) or die(mysqli_connect_error());
//mysql_query("set names utf8");
mysqli_query($linkai,"set names 'utf8'");
