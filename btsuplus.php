<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)、
*/
if(!isset($irunlock)){
include_once('run.php');  //由于可能会重复引入，所以加入了once.鬼知道未来会被什么页面引呢
}
$runplus=2;
if(!isset($pluswz)){
	$runplus=2;
}else{
	$runplus=1;
}
if(isset($btsuplusnamepp)){
	$plusname=$btsuplusnamepp;
	include_once('order/plus_map.php');
	unset($plusname);
	$runplus=2;
}
if($runplus===1){
$plusdir='plus/'.$pluswz;
$plusarr=dirplus($plusdir);
if($plusarr!==false){
foreach($plusarr as $plusname){
	if(strpos($plusname,'.') !== false){
		continue;
    }
	$plusadd='plus/'.$pluswz.'/'.$plusname.'/btsnowballplus.php';
	if(!file_exists($plusadd)){
		continue;
	}
	include_once($plusadd);
}
}
}
unset($runplus);