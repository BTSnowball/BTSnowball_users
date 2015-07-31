<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>提示！--<?php echo $WebTxt; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/btsu_ui.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
  if(isset($_GET['bkurl'])){
	  $bkurl=$_GET['bkurl'];
  }else{
	  $bkurl='javascript:history.go(-1)';
  }
  if(isset($_GET['gourl'])){
	  $goon='1';
	  $gourl=$_GET['gourl'];
  }else{
	  $goon='2';
  }
  if(isset($gourla)){
	  $goon='1';
	  $gourl=$gourla;
  }else{
	  $goon='2';
  }
  ?>
  <body>
 <div class="container-fluid hdbg" id="head">
 <div class="row hdbg">
  <div class="col-md-1 hdbg">&nbsp;</div>
  <div class="col-md-2 hdbg"><img src="img/logo.png" class="img-responsive"></img></div>
  <div class="col-md-9 hdbg">&nbsp;</div>
 </div>
 </div>
 <div class="container-fluid" id="lgjc">
 &nbsp;
 </div>
  <div class="container-fluid text-center" id="lgjcb">
  &nbsp;
  </div>
  <div class="container-fluid text-center">
  <div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-6 bg-warning">
  <h1><strong><?php 
  echo $btsuerrormsg;
  if($goon=='1'){
	  ?>
  <a href="<?php echo $gourl; ?>" >[继续]</a>&nbsp;
	  <?php
  }
  ?><a href="<?php echo $bkurl; ?>" >[后退]</a></strong></h1>
  </div>
  <div class="col-md-3">&nbsp;</div>
  </div>
  </div>
  <div class="container-fluid text-center" id="lgjcd">
  &nbsp;
  </div>
  <div class="container-fluid text-center" id="lgjcfoot">
  本站执行<a href="http://www.btsnowball.org">BTSnowBall_Users协议</a>协议版本<a href="http://www.btsnowball.org"><?php echo $BTSUVersion; ?></a>引擎版本<a href="http://www.btsnowball.org"><?php echo $devv; ?></a>
  </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/btsu_js.js"></script>
  </body>
</html>