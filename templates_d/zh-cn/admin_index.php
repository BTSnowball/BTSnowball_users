<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
if(isset($_GET['do'])){
	$dow=$_GET['do'];
	switch($dow){
		case "cpa":
			$adminuscc='2';
			if(!isset($_POST['opm'],$_POST['npm'],$_SESSION['AdminBtsuU'])){
			break;
		}
			if(strlen(trim($_POST['npm']))<=7){
				echo '新密码长度不得小于7!';
				break;
			}
			$oldpassword=md5(trim($_POST['opm']));
		    $newpassword=md5(trim($_POST['npm']));
			$adminusername=trim($_SESSION['AdminBtsuU']);
			$sqladminc=mysqli_query($linkai,"SELECT * FROM `".$mysql_head."admin` WHERE `adminname`='".$adminusername."' AND `zt`='1' ");
$adminuscc='2';
if($infoadminc=mysqli_fetch_object($sqladminc)){
	if($infoadminc==""){
		}else{
			$infopassc=$infoadminc->password;
			if($infopassc===$oldpassword){
				$adminuscc='1';
			}else{
				echo '旧密码不正确！';
			}
			unset($infopass);
			unset($password);
		}
	}else{
		$adminuscc='2';
	}
			break;
		default:
	    break;
	}
	unset($dow);
	if($adminuscc==='1'){
		mysqli_query($linkai,"update ".$mysql_head."admin set password='".$newpassword."' where adminname='".$adminusername."' ");
		echo '更改成功';
	}
}
?>
<div class="container-fluid aibg" id="adminindex">
 <div class="row aibg">
  <div class="col-md-1 aibg">&nbsp;</div>
  <div class="col-md-10 aibg"><img src="img/ADMBC.PNG" class="img-responsive"></img></div>
  <div class="col-md-1 aibg">&nbsp;</div>
 </div>
 </div>
 <div class="container-fluid" >
 <div class="row">
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-10"><br />
  最新官方消息：
  <?php
  $Wapiurl='http://ServerA.PublicApi.BTSnowball.Org/?do=germsg';
$datemsg=BCurlKey($Wapiurl);
$datearr=json_decode($datemsg,true);
 if(!is_array($datearr)){
	 echo '<br />官方服务器可能过载了!稍后重新拉取.';
 }
 if($datearr[0]>=1){
	$numover=intval($datearr[0]);
 }else{
    $numover=0;
 }
 $numbegin=0;
 while($numbegin<$numover){
	 $numbegin=$numbegin+1;
	 ?>
	 <br /><a href="<?php echo $datearr["$numbegin"];$numbegin=$numbegin+1; ?>"><?php echo $datearr["$numbegin"]; ?></a>
	 <?php
 }
  ?>
    </div>
  <div class="col-md-1">&nbsp;</div>
 </div>
 </div>
 <div class="container-fluid" >
 <div class="row">
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-10"><br />
  <form class="form-inline" method="post" name="nnpm" action="AdminBtsu.php?msg=index&do=cpa">
  <div class="form-group">
    <label for="nps">新密码</label>
    <input type="password" class="form-control" id="nps" name="npm" placeholder="输入新密码">
  </div>
   <div class="form-group">
    <label for="ops">旧密码</label>
    <input type="password" class="form-control" id="ops" name="opm" placeholder="输入旧密码">
  </div>
  <button type="submit" class="btn btn-default">修改管理员密码</button>
</form>
  </div>
  <div class="col-md-1">&nbsp;</div>
 </div>
 </div>