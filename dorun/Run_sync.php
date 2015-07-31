<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
//为SYNC准备的代码 开发中。。。暂时没时间弄稍等
if(!defined('IN_BTSUE')) {
	exit('CK Faild!');
}
if(!isset($syncid)){
	$syncid=2;
}else{
	$syncid=intval($syncid);
}
if(!isset($syncusername)){
	$syncusername=$username;
}
$sqlsync=mysql_query("SELECT wdomain FROM `".$mysql_head."w_friend` WHERE `Sync`='".$syncid."' ",$linka);
while($info=mysql_fetch_object($sqlsync)){
	$syncudm=$info->wdomain;
	$syncumap='http://'.$syncudm.'/btsuser/map/';
	$syncadd=BCurlKey($syncumap);
	$syncaddx=json_decode($syncadd);
	if(!isset($syncaddx->dourl)){
		continue;
	}
	$syncudourl=$syncaddx->dourl;
	if(!isset($syncaddx->URLrep)){
	         $SyncUURLrep='http://';
		 }else{
			 $SyncUURLrep=$syncaddx->URLrep;
		 }
	$syncurl=$SyncUURLrep.$syncudm.$syncudourl.'?doid=1&BTSnowBallUsername='.$syncusername.'@@'.$SDomain;
	?>
	<script type="text/javascript" src="<?php echo $syncurl; ?>"></script>
	<?php
}