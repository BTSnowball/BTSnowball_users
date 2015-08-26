<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
$isdoclean=rand(0,10000);
if($isdoclean<=$wastedo){
$wstim=time();
$swtim=$wstim-$wastetime;
mysqli_query($linkai,"delete FROM `".$mysql_head."bh_list` WHERE `date`<'".$swtim."' ");
mysqli_query($linkai,"delete FROM `".$mysql_head."yzm_list` WHERE `date`<'".$swtim."' ");
mysqli_query($linkai,"delete FROM `".$mysql_head."reslist` WHERE `date`<'".$swtim."' ");
mysqli_query($linkai,"delete FROM `".$mysql_head."waterhub` WHERE `date`<'".$swtim."' ");
}