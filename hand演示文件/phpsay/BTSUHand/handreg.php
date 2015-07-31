<?php
include_once("hand.php");
if(!isset($nickname)){
	echo "Faild!1";
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
if(isset($_SESSION["btsbd"],$_POST["pwd"],$_SESSION["email"],$_SESSION["Ibh"],$_SESSION["nickname"])){
if($_SESSION["btsbd"]=="1"){
		$nickname=$_SESSION["nickname"];
		$email=$_SESSION["email"];
		$password=$_POST["pwd"];
		$Ibh=$_SESSION["Ibh"];
		$Udm=$_SESSION["Udm"];
		$bdjg=handdl($email,$password,1,1);
		if(!isset($bdjg["jg"])){
	    echo "Faild!1";
	    exit;
         }
		$bdzj=$bdjg["jg"];
		if($bdzj=="TRUE"){
			$Iuid=$bdjg["uid"];
			SETuzt($email,$username,$Udm,2,1,$Iuid,1,$email,1);
			?>
				<script language="javascript" type="text/javascript">
                window.location.href="<?php echo 'http://'.$WDomain; ?>"; 
                </script>
			<?
		}else{
			echo "faild#";
		}
}else{
	echo "error!";
}
}
$regjg=handreg($nickname,$email,$password);
$Iusername=$username;
$Uusername=$username;
if($regjg["jg"]!="1"){
	if($regjg["jg"]=="3"){
		$_SESSION["btsbd"]="1";
		$_SESSION["nickname"]=$nickname;
		$_SESSION["email"]=$email;
		$_SESSION["Ibh"]=$Ibh;
		$_SESSION["plus"]="phpsaybd";
		//绑定开始
		$bdmsg='您的EMAIL已经存在，本站不允许重复Email,请绑定EMAIL原属用户名。密码忘记请使用取回密码。';
		$Userbd='1';
		$uncan='4';
		/*
		?>
		<form method="post" action="">   
        密码：<input type="password" name="pwd" value="123456" /> 
        <input type="submit" value="绑定" />  
        </form>
		<?
		*/
	}else{
	echo "Faild!4".utf8str($regjg["msg"]);
	exit;
	}
}