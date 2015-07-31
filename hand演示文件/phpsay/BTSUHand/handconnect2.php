<?php
require_once("../global.php");
include_once("hand.php");
$btsuconnectto=$_GET["to"];
if ( $loginInfo['uid'] > 0 )
{
	$DB = database();
	$Iuid=$loginInfo['uid'];
    $userInfo = PHPSay::getMemberInfo($DB,"uid",$Iuid);
	$email=$userInfo['email'];
	$BtsuConnectUrl=$btsuconnectto.'/btsuser/btsudo.php?doid=1&liuser='.$email.'@@'.$HWdoamin;
	?>
	<script language="javascript" type="text/javascript">
           window.location.href="<?php echo 'http://'.$BtsuConnectUrl; ?>"; 
    </script>
	<?
}else{
	?>
	<script language="javascript" type="text/javascript">
           window.location.href="<?php echo 'http://'.$btsuconnectto; ?>"; 
    </script>
	<?
}