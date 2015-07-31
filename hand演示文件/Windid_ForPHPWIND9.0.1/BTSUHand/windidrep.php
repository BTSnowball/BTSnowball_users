<?php
session_start();
include("config/handconfig.php");
if(isset($_SESSION['windreg'],$_SESSION['wrsuc'])){
	include("fuc/handfuc_a.php");
	require_once '/windid_client/src/windid/WindidApi.php';
	$windid = WindidApi::api('user');
	unset($_SESSION['wrsuc']);
	$_SESSION['op']='btsnowballsync'; //FOR PHPWIND9.0.1 ONLY
	$_SESSION['user']=$_SESSION['windreg'];
	$ucsynlogin = $windid->synLogin($_SESSION['windreg']);
    echo $ucsynlogin;
	?>
	<script language="javascript" type="text/javascript">
                window.location.href="<?php echo 'http://'.$HWdoamin; ?>"; 
    </script>
	<?PHP
}else{
	?>
	<script language="javascript" type="text/javascript">
                window.location.href="<?php echo 'http://'.$HWdoamin; ?>"; 
    </script>
	<?PHP
}