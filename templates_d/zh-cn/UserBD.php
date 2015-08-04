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
    <title>用户绑定 --<?php echo $WebTxt; ?></title>

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
 <div class="row hdbg" >
  <div class="col-md-1 hdbg">&nbsp;</div>
  <div class="col-md-2 hdbg"><img src="img/logo.png" class="img-responsive"></img></div>
  <div class="col-md-9 hdbg">&nbsp;</div>
 </div>
 </div>
 <div class="container-fluid" id="lgjc">
 &nbsp;
 </div>
 <div class="container-fluid text-center">
 <h4><strong>使将用户绑定至<?php echo $WebTxt; ?></strong></h4><br />
 </div>
 <div class="container-fluid text-center" id="ulogin">
 <div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-3">
  <form class="form-horizontal"  id="bd-form" action="" method="post">
  <?php
	if($uncan=='1'){
	?>
  <div class="form-group">
    <label for="ifwitchbtu1" class="col-sm-4 control-label">用户名:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu1"  placeholder="username" name="username"  value="">
    </div>
  </div>
  <?php
	}else if($uncan=='2'){
	?>
	 <div class="form-group">
    <label for="ifwitchbtu1" class="col-sm-4 control-label">Email：</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu1"  placeholder="EmailAddress" name="email" value="">
    </div>
    </div>
	<?php
	}else if($uncan=='3'){
	?>
	<div class="form-group">
    <label for="ifwitchbtu1" class="col-sm-4 control-label">用户名：</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu1"  placeholder="<?php echo $username; ?>" name="Dusername" value="<?php echo $username; ?>" disabled="disables">
    </div>
    </div>
	<?php
	}else if($uncan=='4'){
	?>
	<div class="form-group">
    <label for="ifwitchbtu1" class="col-sm-4 control-label">Email：</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu1"  placeholder="<?php echo $email; ?>" name="DEmail" value="<?php echo $email; ?>" disabled="disables">
    </div>
    </div>
	<?php
			}else if($uncan=='5'){
	?>
	<div class="form-group">
    <label for="ifwitchbtu1" class="col-sm-4 control-label">用户名：</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu1"  placeholder="Username" name="username" value="" >
    </div>
    </div>
	<div class="form-group">
    <label for="ifwitchbtu2" class="col-sm-4 control-label">Email：</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu2"  placeholder="<?php echo $email; ?>" name="email" value="<?php echo $email; ?>" >
    </div>
    </div>
	<?php
			}else if($uncan=='6'){
	?>
	<div class="form-group">
    <label for="ifwitchbtu1" class="col-sm-4 control-label">用户名：</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu1"  placeholder="Username" name="username" value="" >
    </div>
    </div>
	<div class="form-group">
    <label for="ifwitchbtu2" class="col-sm-4 control-label">Email：</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ifwitchbtu2"  placeholder="<?php echo $email; ?>" name="Demail" value="<?php echo $email; ?>" readonly="readonly">
    </div>
    </div>
    <?php
			}else{
				echo exit ('ERROR!');
			}
	?>


  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">密码:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="请输入密码" name="pwd">
    </div>
  </div>
 <div class="form-group">
    <label for="yzjsjg" class="col-sm-4 control-label">验证:</label>
	<div class="for-one">
    <div class="col-sm-8">
      <input type="text" class="form-control-yzm" name="jyjg" id="yzjsjg"  placeholder="请输入验证计算结果"  >验证计算：<img id="verify-img" src="jsm.php" >
  </div>
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">绑定并登陆</button>
	  <a href="http://<?php echo $WDomain; ?>/btsuser/Ilogin.php?backbh=<?php echo $Ubh; ?>" class="btn btn-default" >取消并返回</a>
	  </form>
    </div>
  </div>
  </div>
  <div class="col-md-3 text-left">
  <h5><strong>授权登陆过程遇到问题：</strong></h5>
  <?php echo $bdmsg; ?><br />
您需要进行用户绑定操作！<?php 
$_SESSION['BtsUserpw']=$username;
$_SESSION['BtsUserpwdate']=time();
$_SESSION['BtsUserpwemail']=$email;
if($uncan=='3'){ ?>您还可以: <br />
 <input type="button" id="btn" value="获取临时密码并发送到您的注册邮箱" /> 
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
<?php
  }
?>
 </div>
  <div class="col-md-3">&nbsp;</div>
 </div>
 </div>
  <div class="container-fluid text-center" id="lgjcb">
  &nbsp;
  </div>
  <div class="container-fluid text-center">
  <div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-6 bg-warning">
  <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>注意：请检查本页面必须在<?php echo $WDomain; ?>域名下再进行用户绑定操作！<br />*<?php echo $WDomain; ?>与您要登陆的网站地址一致。
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