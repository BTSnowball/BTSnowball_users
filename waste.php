<?php
/*
+BTSnowball_Users!
+BTSnowball.Org������ӭ���ļ���
+����Ʒ��ѭApache lincense V2.0��������BTSpl��������μ�lincense&txt�ļ���������ļ�
+Copyright (c) 2015 ��Ȩ��������Ӧ��������ߡ������˺�BTSnowball_Org���������Ա
+ Author list:������(Lin Youzhe)
*/
$isdoclean=rand(0,10000);
if($isdoclean<=$wastedo){
$wstim=time();
$swtim=$wstim-$wastetime;
mysql_query("delete FROM `".$mysql_head."bh_list` WHERE `date`<'".$swtim."' ",$linka);
mysql_query("delete FROM `".$mysql_head."yzm_list` WHERE `date`<'".$swtim."' ",$linka);
mysql_query("delete FROM `".$mysql_head."reslist` WHERE `date`<'".$swtim."' ",$linka);
}