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
    <title>管理您在<?php echo $Wname; ?>的BTSUser信息-<?php echo $WebTxt; ?></title>

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
  <body>
 <div class="container-fluid hdbg" id="head">
 <div class="row hdbg">
  <div class="col-md-1 hdbg">&nbsp;</div>
  <div class="col-md-2 hdbg"><img src="config/Weblogo.png" class="img-responsive"></img></div>
  <div class="col-md-9 hdbg">&nbsp;</div>
 </div>
 </div>
  <div class="container-fluid" id="lgje">
 &nbsp;
 </div>
 <div class="container-fluid">
 <div class="row">
 <div class="col-md-2">
 <ul class="nav nav-pills nav-stacked">
  <li role="presentation" <?php if($dhlight=='1'){ ?>class="active" <?php } ?>><a href="?msg=index">欢迎</a></li>
  <li role="presentation" <?php if($dhlight=='2'){ ?>class="active" <?php } ?>><a href="?msg=list">我的绑定</a></li>
  <li role="presentation"><a href="#">帮助关于</a></li>
  <li role="presentation"><a href="?logout=logout">登出</a></li>
</ul>
 </div>
 <div class="col-md-8">
<?php
 switch($msg){
	case "list":
		include('templates_d/'.$temp.'/MyBtsu_mylist.php');
	break;
	case "index":
		include('templates_d/'.$temp.'/MyBtsu_index.php');
	break;
	default:
	break;
 }
?>
 </div>
 <div class="col-md-2">&nbsp;</div>
 </div>
 <div>
 <center><p><img src="img/btsnowball_jh.png" class="img-responsive"></img></p></center>
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