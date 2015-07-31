<?php
include($hand.'config/MySQL_CONFIG.php');
$linkb=mysql_connect($hand_mysql_host,$hand_mysql_user,$hand_mysql_pass) or die("数据库连接失败".mysql_error());
mysql_select_db($hand_mysql_dbname,$linkb);
mysql_query("set names utf8");