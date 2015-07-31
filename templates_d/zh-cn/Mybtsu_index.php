<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
?>
<div class="container-fluid" id="adminindex">
 <div class="row">
  <div class="col-md-1">&nbsp;</div>
  <div class="col-md-10 aibg"><img src="img/ADMBC.PNG" class="img-responsive"></img></div>
  <div class="col-md-1">&nbsp;</div>
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