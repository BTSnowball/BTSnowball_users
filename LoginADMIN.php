<?php
/*
+BTSnowball_Users!
+BTSnowball.Org������ӭ���ļ���
+����Ʒ��ѭApache lincense V2.0��������BTSpl��������μ�lincense&txt�ļ���������ļ�
+Copyright (c) 2015 ��Ȩ��������Ӧ��������ߡ������˺�BTSnowball_Org���������Ա
+ Author list:������(Lin Youzhe)
*/
session_start();
define('IN_BTSUE', TRUE);
include_once('config/Web_config.php');
include_once($WBuHand.'handrun.php');
$_SESSION["jyjg"]='';
include('templates_d/'.$temp.'/loginADMIN.php');