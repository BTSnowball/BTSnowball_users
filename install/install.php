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
    <title>安装BTSnowball_Users官方版Vista_V0.7.0.0_20150717</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/btsu_ui.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
  if(!defined('IN_BTSUE_INS')){
  define('IN_BTSUE_INS', TRUE);
  }
  if(!isset($_GET['setup'])){
	  $setup=2;
  }else{
	  $setup=trim($_GET['setup']);
  }
  ?>
  <body>
 <div class="container-fluid hdbg" id="head">
 <div class="row hdbg">
  <div class="col-md-1 hdbg">&nbsp;</div>
  <div class="col-md-2 hdbg"><img src="../config/Weblogo.png" class="img-responsive"></img></div>
  <div class="col-md-9 hdbg">&nbsp;</div>
 </div>
 </div>
 <div class="container-fluid" id="lgjc">
 &nbsp;
 </div>
  <?php
  switch($setup){
	  case '2':
		  include('include/s2.php');
	  break;
	  case '3':
		  include('include/s3.php');
	  break;
	  case '4':
		  include('include/s4.php');
	  break;
	  case '5':
		  include('include/s5.php');
	  break;
	  case '6':
		  include('include/s6.php');
	  break;
	  case '7':
		  include('include/s7.php');
	  break;
	  case '8':
		  include('include/s8.php');
	  break;
	  default:
		  echo 'Error!';
	  exit;
	  break;
  }
  ?>
  <div class="container-fluid text-center" id="lgjcc">
  <center><p><img src="../img/btsnowball_jh.png" class="img-responsive"></img></p></center>
  </div>
  <div class="container-fluid text-center" id="lgjcfoot">
  <center><a href="http://www.btsnowball.org">BTSnowball.Org</a>版权所有</center>
  </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/btsu_js.js"></script>
  </body>
</html>