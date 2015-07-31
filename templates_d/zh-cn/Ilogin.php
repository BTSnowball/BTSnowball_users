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
    <title>用您在其它网站的帐号登录<?php echo $WebTxt; ?>_使用BTSnowball_User协议直接登录</title>

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
 <div class="container-fluid" id="lgjc">
 &nbsp;
 </div>
 <div class="container-fluid text-center">
 <h4><strong>欢迎！请输入您要登录使用的帐号的用户名连接至（<a href="<?php echo $WDomain; ?>" target="_blank"><?php echo $WebTxt; ?></a>）:</strong></h4><br />
 </div>
 <div class="container-fluid text-center" id="ulogin">
 <form class="form-inline" name="BULogin" action="btsudo.php">
  <div class="form-group">
    <label for="BtsuName2">Username:</label>
    <input type="text" name="username" class="form-control" id="BtsuName2" placeholder="Username" >
  </div>
  <div class="form-group">
    <label for="Btsuset2">@@</label>
    <input type="txt" name="serdm" class="form-control" id="Btsuset2" placeholder="btsnowball.org" >
  </div>
  <button type="button" onClick="BTSULogin()" class="btn btn-primary">&nbsp;&nbsp;授权&登陆&nbsp;&nbsp;</button>
    <div class="form-group">
  <input id="doid" type="hidden" name="doid" value="1">
  <input id="doid" type="hidden" name="BTSnowBallUsername" value="">
  </div>
</form>
 </div>
  <div class="container-fluid text-center" id="lgjcb">
  &nbsp;
  </div>
  <div class="container-fluid text-center">
  <div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-6">
  本站账号还可以登录:
  <?php 
  $ckfri=CHKFri(4,1);
  if($ckfri['jg']=='success'){
	  $sl=0;
	  do{
		  $sl=$sl+1;
		  ?>
		  <a href="http://<?php echo $SDomain; ?>?to=<?php echo $ckfri["$sl"]; ?>" class="btn btn-link">
		  <?php
		  $sl=$sl+1;
          echo $ckfri["$sl"];
		  ?>
		  </a>
		  <?php
	  }while($sl<$ckfri['cs']);
  }
  $ckfri=CHKGFri(4,1);
  if($ckfri['jg']=='success'){
	  $sl=0;
	  do{
		  $sl=$sl+1;
		  ?>
		  <a href="http://<?php echo $SDomain; ?>?to=<?php echo $ckfri["$sl"]; ?>" class="btn btn-link">
		  <?php
		  $sl=$sl+1;
          echo $ckfri["$sl"];
		  ?>
		  </a>
		  <?php
	  }while($sl<$ckfri['cs']);
  }
  ?>
  </div>
   <div class="col-md-3">&nbsp;</div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-6 bg-warning">
  ①将用户名填写到Username栏。所在网站的地址填写到@@后面。Example:Username@@Btsnowball.org<br />
  ②点击【登陆&授权】按钮跳转到相应网站进行授权登陆。<br />
  <em>*若不清楚对方网站是否支持BTSnowBall(BTSU)协议或是否与本站匹配可以先点击检测按钮。</em>
  </div>
  <div class="col-md-3">&nbsp;</div>
  </div>
  </div>
  <div class="container-fluid text-center" id="lgjcc">
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
	<?php
	if(isset($helpbtsu)){
		if($helpbtsu=='1'){
			$Wapiurl='http://ServerA.PublicApi.BTSnowball.Org/?do=helpbtsu';
            $datemsg=BCurlKey($Wapiurl);
            $datearr=json_decode($datemsg,true);
            if(!is_array($datearr)){
            }else{
				$Wapiurlb=$datearr[0];
				$helpmsg=BCurlKey($Wapiurlb);
				echo $helpmsg;
			}
		}
	}
	?>
  </body>
</html>