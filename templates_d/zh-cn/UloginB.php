<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>	用户登录开放平台 --<?php echo $WebTxt; ?></title>
<link href="./images/web.css" rel="stylesheet" type="text/css" media="all">
</head>
<body style="*position:relative">
<!--导航栏-->
<div id="header">
<div id="navBar" class="site-nav rr">
<div class="navigation-wrapper" id="navigation" style="width: 980px;">
<div class="navigation navigation-new clearfix">
<div id="logo2">
<h1>
<a href="http://www.renren.com/" title="<?php echo $WebTxt; ?>">
<img alt="<?php echo $WebTxt; ?>" height="72" width="222" src="<?php echo $Wlogo; ?>">
</a>
</h1>
</div>
<div class="nav-body clearfix">
<h2 id="nav_title" class="nav-title" style="display: block;">开放授权平台[遵循BTSUV1.0]协议</h2>
<div class="nav-other" id="nav_other" style="display: block;">
<div class="menu">
<a id="reg_link" title="访问" stats="homenav_reg" href="http://<?php echo $WDomain; ?>">访问本网站</a>
</div>
<div class="menu" style="display:none;">
<div class="menu-title">
<strong>
<a href="http://<?php echo $WDomain; ?>" stats="homenav_login" title="访问">访问本网站</a>
</strong>
</div>
</div>
<div class="menu">
<a title="返回来源网站" stats="homenav_suggest" href="http://<?php echo $Udm; ?>">返回来源网站</a>
</div>
<div class="menu more">
<a title="帮助文档" stats="homenav_suggest" href="http://www.btsnowball.org/btsu/help/">帮助文档</a>
</div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
</div>
<!--end header-->

<div id="api-login" class="api-login" style="width: 575px;">
<div class="title">
<h1>使用<?php echo $Wname; ?>帐号登录<a class="title-app" href="http://<?php echo $Udm; ?>"><?php echo $Udm; ?></a></h1>
</div>
<form class="login-form" id="login-form" method="post" action="?doid=3">
<!--左边登陆部分-->
<div id="left" class="left">
<!--普通登陆--><div id="clogin" style="display: block;">
<dl class="uin">
<label class="input-focus-tips" id="rrid_tips" style="display: block;">&nbsp;</label>
<dt><label>帐号:</label></dt>
<dd>
<input class="api-rrid" onclick="" type="text" name="username" id="rrid" tabindex="1" autocomplete="off" value="<?php echo $Uuser; ?>"  disabled="disabled">
</dd>
</dl>
<dl class="pwd">
<label class="input-tips" id="rrpw_tips" style="display: block;">请输入密码</label>
<dt><label>密码:</label></dt>
<dd>
<input class="api-rrpw" type="password" name="pwd" id="rrpw" tabindex="2" autocomplete="off">
</dd>
</dl>
<div class="error-tips">
<span id="show_error"></span>
<a href="https://<?php echo $Udm; ?>">忘记密码了？</a>
<div class="clear"></div>
</div>
<dl class="code" id="verify_area" style="display: block;">
<label class="input-tips" id="icode_tips" style="display: block;">请输入验证计算结果</label>
<dd>
<input class="api-code" type="text" name="jyjg" id="icode" tabindex="3" autocomplete="off">
</dd>
<img id="verify-img" src="jsm.php" class="refresh-verify">
验证计算
</dl>
</div>
<!--快速登录-->

<!--授权登录、切换-->
<div>
<input id="submit" class="api-submit" type="submit" value="授权并登录" tabindex="4">   
<a href="<?php echo $Udm; ?>" class="login-cancel" id="login-cancel">取消</a>
<br>
</div>
</div>
<!--右边授权部分-->
<div class="right">
<div class="api-allow" style="height:auto" id="api-allow">
<p>允许 <a class="title-app" href="http://<?php echo $Udm; ?>"><?php echo $Udm; ?></a> 进行以下操作：<span class="opi-packup" id="toggle-list"></span></p>
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
		<br /><br />
		<p>对方网站要求的以下信息不能输出:<span class="opi-packup" id="toggle-list"></span></p>
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
</ul>
</div>


</div><div class="clear"></div>
</form>
<div class="clear"></div>
</div>

<br /><br />
<div id="api-login" class="api-login"  style="width: 575px;">
<strong>本站帐号还可以登录:</strong>
</div>

</body></html>