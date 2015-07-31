<?php
if(!defined('IN_BTSUE')) {
	exit('CK Faild!');
}
include_once('hand.php');
if(!isset($username)){
	echo "Faild!1un";
	exit;
}
if(!isset($email)){
	echo "Faild!2";
	exit;
}
if(!isset($password)){
	echo "Faild!3";
	exit;
}
$docait='2';
/*UC邮箱绑定*/
if(isset($_SESSION["btsbd"],$_POST["pwd"],$_SESSION["email"],$_SESSION["Ibh"],$_SESSION["username"])){
if($_SESSION["btsbd"]=='1'){
	unset($_SESSION["btsbd"]);
		$Uusername=$_SESSION["username"];
		$email=$_SESSION["email"];
		$password=$_POST["pwd"];
		$Ibh=$_SESSION["Ibh"];
		$Udm=$_SESSION["Udm"];
		$bdjg=handdl($email,$password,5,1);
		if(!isset($bdjg["jg"])){
	    echo 'Faild!1bd'.$bdjg.$email;
	    exit;
         }
		$bdzj=$bdjg["jg"];
		if($bdzj=="TRUE"){
			$Iuid=$bdjg["uid"];
			$Iusername=$bdjg['username'];
			$docait='1';
		}else{
			echo 'faild####'.$bdjg["username"];
			exit;
		}
}
}
/*UC邮箱绑定结束*/
if(isset($_SESSION["btsreg"],$_POST["pwd"],$_POST["email"],$_SESSION["Ibh"],$_POST["username"])){
	if($_SESSION["btsreg"]=='1'){
		unset($_SESSION["btsreg"]);
		$Uusername=$_SESSION["username"];
		$Ibh=$_SESSION["Ibh"];
		$Udm=$_SESSION["Udm"];
		$password=addslashes(trim($_POST["pwd"]));
		$email=addslashes(trim($_POST["email"]));
		$Iusername=addslashes(trim($_POST["username"]));
		if(!isEmail($email)){
			echo 'EmailAddress Error!';
			$docait='3';
		}
		if(empty($password) || empty($Iusername)){
			echo 'Empty Username or Password!';
			$docait='3';
		}
		if($docait!=3){
		$regjg=handreg($Iusername,$email,$password);
		if($regjg["jg"]!='1'){
		echo "Error".utf8str($regjg['msg']);
	    $docait='4';
		}else{
		$Iuid=$regjg["uid"];
		$docait='1';
		handdl($Iusername,$password,2,1);
		}
		}
	}
}
if($docait!='1'){
	if($docait=='2'){
    $regjg=handreg($username,$email,$password);
	}
if($regjg["jg"]!='1'){
	 if($regjg["jg"]==-6){
	    $_SESSION["btsbd"]='1';
		$_SESSION["username"]=$username;
		$_SESSION["email"]=$email;
		$_SESSION["Ibh"]=$Ibh;
		$_SESSION["plus"]='Discuzbd';
		//绑定开始
		$bdmsg='您的EMAIL已经存在，本站不允许重复Email,请绑定EMAIL原属用户名。密码忘记请使用取回密码。';
		$Userbd='1';
		$uncan='3';
		/*
		?>
		您的EMAIL已经存在，本站不允许重复Email,请绑定EMAIL原属用户名。密码忘记请使用取回密码。
		<form method="post" action="">   
        密码：<input type="password" name="pwd" value="123456" /> 
        <input type="submit" value="绑定" />  
        </form>
		<?
		*/
     }else if($regjg["jg"]>=-5 && $regjg["jg"]<=-1){
		$_SESSION["btsreg"]='1';
		$_SESSION["Ibh"]=$Ibh;
		$_SESSION["username"]=$username;
		$_SESSION["plus"]='DiscuzReg';
		$bdmsg=utf8str($regjg['msg']).'||您需要在本站使用合法的用户名&邮箱注册并绑定一个用户';
		$Userbd='1';
		$uncan='5';
		/*
		?>
		||您需要在本站使用合法的用户名&邮箱注册并绑定一个用户
		<form method="post" action=""> 
		用户名：<input type="text" name="username" value="<?php echo $username; ?>" /> 
		邮箱：<input type="text" name="email" value="<?php echo $email; ?>" /> 
        密码：<input type="password" name="pwd" value="101010bts" /> 
        <input type="submit" value="绑定" />  
        </form>
		<?
		*/	
	}else{
	    echo "Faild!4".utf8str($regjg['msg']);
	    exit;
	}
}else{
$Iuid=$regjg['uid'];
$Iusername=$username;
$Uusername=$username;
}
}