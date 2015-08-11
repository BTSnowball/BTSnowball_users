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
 <h4><strong>欢迎！即将登入（<a href="<?php echo $WDomain; ?>" target="_blank"><?php echo $WebTxt; ?></a>）由于您将来源网站设为了不信任所以需要二次校验:</strong></h4><br />
 </div>
 <div class="container-fluid text-center" id="ulogin">
 <form class="form-inline" name="BUULogin" action="" method="post">
  <div class="form-group">
    <label for="BtsuName2">请输入密码/临时密码:</label>
    <input type="text" name="btsubimm" class="form-control" id="BtsuName2" placeholder="密码或临时密码" >
  </div>
  <div class="form-group">
 <?php
$_SESSION['BtsUserpw']=rand(9,999999);
$_SESSION['BtsUserpwdate']=time();
$_SESSION['BtsUbiallow']='ok';
?>
 <input type="button" class="btn btn-success" id="btn" value="获取临时密码并发送到您的注册邮箱" /> 
<script type="text/javascript"> 
var wait=60; 
function time(o) { 
if (wait == 0) { 
o.removeAttribute("disabled"); 
o.value="获取临时密码并发送到您的注册邮箱"; 
wait = 60; 
} else { 
o.setAttribute("disabled", true); 
o.value="重新发送(" + wait + ")"; 
wait--; 
setTimeout(function() { 
time(o) 
}, 
1000) 
} 
} 
document.getElementById("btn").onclick=function(){
$.ajax({ 
type: "get", 
url: "btsudo.php", 
data: "doid=5" //操作成功后的操作！msg是后台传过来的值 
}); 
time(this);} 
</script>
  </div>
    <button type="submit" class="btn btn-primary">登入</button>
    <div class="form-group">
  </div><br />
  <div class="checkbox text-center">
    <label>
      <input type="checkbox" name="wisbeliveb" value="yes" /> 将原帐号所在网站设为<font color="red">信任</font>
    </label>
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
  登陆即将完成请您输入验证计算结果。
  <em>*您的登陆用户名将自动与您在本站的身份绑定，您在本站的身份信息将通过EMAIL发送至您的邮箱。包括您的用户名及密码</em>

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