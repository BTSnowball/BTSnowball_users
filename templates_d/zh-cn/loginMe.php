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
    <title>登陆并管理您在<?php echo $Wname; ?>的BTSUser信息-<?php echo $WebTxt; ?></title>

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
 <h4><strong>欢迎！登陆并管理您在（<a href="<?php echo $WDomain; ?>" target="_blank"><?php echo $Wname; ?></a>)的BTSUser信息:</strong></h4><br />
 </div>
 <div class="container-fluid text-center" id="ulogin">
 <div class="row">
 <div class="col-md-4">&nbsp;</div>
 <div class="col-md-4">
 <form class="form-horizontal" name="MBULogin" method="post" action="MyBtsu.php">
<div class="form-group">
    <label for="inputUser1" class="col-sm-3 control-label">Username:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputUser1" name="username" placeholder="您的登陆标识">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-sm-3 control-label">Password:</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="您的密码">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="rbme"> 记住我（7天.注意！请不要在公共和不安全设备勾选）
        </label>
      </div>
    </div>
  </div>
   <div class="form-group">
    <label for="yzjsjg" class="col-sm-3 control-label">验证计算:</label>
	<div class="for-one">
    <div class="col-sm-6">
      <input type="text" class="form-control-yzm" name="jyjg" id="yzjsjg"  placeholder="请输入验证计算结果"  ></div><div class="col-sm-3"><img id="verify-img" src="http://buca.geili.in/btsuser/jsm.php" >
  </div></div></div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">登陆</button>
    </div>
  </div>
</form>
</div>
<div class="col-md-4">&nbsp;</div>
 </div>
  <div class="container-fluid text-center" id="lgjcb">
  &nbsp;
  </div>
  <div class="container-fluid text-center">
  <div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-6 bg-warning">
  ①使用您在本网站[<?php echo $Wname.'(';echo $WDomain.')'; ?>]的用户名及密码进行登陆。登陆后能够管理您在本网站的BTSU(BTSnowBall_User)信息。<br />
  <em>WARNING:请确认本页面在<?php echo $Wname; ?>的域名下再进行登陆。</em>
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
  </body>
</html>