<?php
include('./config/MySQL_CONFIG.php');
$linka=mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die("数据库连接失败".mysql_error());
mysql_select_db($mysql_dbname,$linka);
mysql_query("set names utf8");
