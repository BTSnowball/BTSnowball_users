<?php
/*
+BTSnowball_Users!
+BTSnowball.Org������ӭ���ļ���
+����Ʒ��ѭApache lincense V2.0��������BTSpl��������μ�lincense&txt�ļ���������ļ�
+Copyright (c) 2015 ��Ȩ��������Ӧ��������ߡ������˺�BTSnowball_Org���������Ա
+ Author list:������(Lin Youzhe)
*/
//ΪSYNC׼���Ĵ��� �����С�������ʱûʱ��Ū�Ե�
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