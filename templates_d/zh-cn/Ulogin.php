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
    <title>用户登录开放平台 --<?php echo $WebTxt; ?></title>

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
 <h4><strong>使用<a href="<?php echo $WDomain; ?>" target="_blank"><?php echo $Wname; ?></a>帐号登录<a class="title-app" href="http://<?php echo $Udm; ?>"><?php echo $Udm; ?></a></strong></h4><br />
 </div>
 <div class="container-fluid text-center" id="ulogin">
 <div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-3">
  <form class="form-horizontal"  id="login-form" method="post" action="?doid=3">
  <div class="form-group">
    <label for="username3" class="col-sm-4 control-label">帐号</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="username3" disabled="disabled" placeholder="<?php echo $Uuser; ?>" name="username"  value="<?php echo $Uuser; ?>">
    </div>
  </div>
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
      <button type="submit" class="btn btn-primary">授权并登录</button>
	  <a href="http://<?php echo $Udm; ?>/btsuser/Ilogin.php?backbh=<?php echo $Ubh; ?>" class="btn btn-default" >取消并返回</a>
    </div>
  </div>
  </div>
  <div class="col-md-3 text-left">
  <h5><strong>允许 <a  href="http://<?php echo $Udm; ?>"><?php echo $Udm; ?></a> 进行以下操作：</strong></h5>
  <ul class="functions">
<?php
	if($btsupost=="1"){
	$qxlist='begin';
	$qxcant='';
	?>
	<li>
    <label>
    <input type="checkbox" checked="checked" disabled="disabled" value="true"><span>获取您的基本信息</span></label></li>
	<?php
		foreach($cajgarr as $cajga){
			if(JXUxq($cajga)["bz"]=="error"){
				continue;
			}
			$qxmsg=JXUxq($cajga);
			$qxth=$qxmsg["bz"];
			$qxlx=$qxmsg["lx"];
			$qxhn=$qxmsg["xq"];
			if(!in_array($qxhn, $BTSUIsICan)){
				$qxcant=$qxcant.'<br />*'.$qxth;
				continue;
			}
			if(in_array($qxhn, $BTSUIsUNms)){
				$qxlist=$qxlist.','.$qxth;
				continue;
			}
			switch($qxlx){
			case '1':
			?>
			<li>
            <label>
            <input type="checkbox" checked="checked" disabled="disabled" value="true"><span>获取您的 <?php echo $qxth; ?></span></label></li>
			<?php
			break;
			case '2':
			?>
			<li>
            <label>
            <input type="checkbox" checked="checked"  value="true"><span>获取您的 <?php echo $qxth; ?></span></label></li>
			<?php
			break;
			case '3':
			?>
			<li>
            <label>
            <input type="checkbox" checked="checked"  value="false"><span>获取您的 <?php echo $qxth; ?></span></label></li>
			<?php
			break;
			default:
				continue;
	        break;
			}
			$qxlist=$qxlist.','.$qxth;
		}
		$_SESSION["qxlist"]=$cajg;
		?>
		<br /><br /></ul>
		<h5><strong>对方网站要求的以下信息不能输出:<span class="opi-packup" id="toggle-list"></strong></h5><br />
		<?php
		echo $qxcant.'<br />';
	}else{
		echo '您已经授权过！';
	}
 ?>
<?php
/*
<li>
<input type="checkbox" value="true" name="sex" id="send-news" class="opicon-feed" checked="checked">
<span>性别</span>
</li>
*/
?>
</form>
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
  <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>注意：请检查本页面必须在<?php echo $WDomain; ?>域名下再输入密码并登陆！<br />*<?php echo $WDomain; ?>与您的用户名所在网站地址一致。
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