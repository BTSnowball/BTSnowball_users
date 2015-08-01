<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)、
*/
session_start();
//本页可传入参数：liuser（待处理用户名）、doid（动作ID） ...
?>
<META http-equiv=Content-Type content="text/html; charset=UTF-8">
<?
include_once('run.php');
if(!isset($_GET["doid"])){
	$doid=""; //万一有插件要启动呢
}else{
$doid=$_GET["doid"];
}
$pluswz='btsudoh';
include('btsuplus.php');
if($doid==""){
	exit;
}
switch($doid){
	case "1":
		if(isset($_GET["BTSnowBallUsername"])){
		    $liuser=$_GET["BTSnowBallUsername"];
	    }elseif(isset($_POST["BTSnowBallUsername"])){
			$liuser=$_POST["BTSnowBallUsername"];
		}else{
			exit;
		}
	    if($liuser==""){
		exit;
		}
		$MyUser=0;
		if(!strstr($liuser,"@@")){
		$liuser=$liuser.$SDomain;//若为本站用户，直接切为本站登录。
		$MyUser=1;
		}
		$lidomain=GjieA($liuser,'@@',2);
		$lidun=GjieB($liuser,'@@',0);
		if(($lidun=="")or($lidomain=="")){
			    $tmod='BUError';
	            $btsuerrormsg='EMPTY!BTS Connect Error!(Veson BTSU 1.0)';
				include('intem.php');
				exit;
		}
		$IfCanC=IFRTSet($lidun,$lidomain);
		if($IfCanC['in']!='1'){
			    $tmod='BUError';
	            $btsuerrormsg='ERROR！该用户名被禁止登入或处于停用状态！';
				include('intem.php');
				exit;
		}
		unset($IfCanC);
		if(IsWBlack($lidomain,2,1)){
			    $tmod='BUError';
	            $btsuerrormsg='ERROR！该应用地址被禁止登入或处于停用状态！';
				include('intem.php');
				exit;
		}
		$Acurl='http://'.$lidomain.'/btsuser/map/';
		$Uaddress=BCurlKey($Acurl);
		$Uaddressx=json_decode($Uaddress);
		$maperror='s';
		 if(!isset($Uaddressx->dourl)){
	         $btsuerrormsg='ERROR！读取目标网站的MAP信息错误！';
			 $maperror='e';
		 }else{
			 $dourl=$Uaddressx->dourl;
		 }
		 if($maperror=='e'){
			 $tmod='BUError';
			 include('intem.php');
			 exit;
		 }
		 if(!isset($Uaddressx->apiurl)){
	         $btsuerrormsg='ERROR！读取目标网站的MAP信息错误！';
			 $maperror='e';
		 }else{
			 $apiurl=$Uaddressx->apiurl;
		 }
		 if(!isset($Uaddressx->Version)){
	         $Version='BTSnowBallOrgA';
		 }else{
			 $Version=$Uaddressx->Version;
		 }
		 if(!isset($Uaddressx->URLrep)){
	         $UURLrep='http://';
		 }else{
			 $UURLrep=$Uaddressx->URLrep;
		 }
		 if($maperror=='e'){
			 $tmod='BUError';
			 include('intem.php');
			 exit;
		 }
		/*
		$Uaddressx=explode('|',$Uaddress);
		unset($Uaddress);
		foreach($Uaddressx as $UaddX){
			$UaddXX=explode('[:]',$UaddX);
			if(!isset($UaddXX[1])){
				$tmod='BUError';
	            $btsuerrormsg='BTS Connect Error!(Veson BTSU 1.0)';
				include('intem.php');
				exit;
			}
			$$UaddXX[0]=$UaddXX[1];
		}
		*/
		unset($Uaddressx);
		if(isset($dourl)&&isset($apiurl)){
		$Uaddra=$dourl;
		$Uaddrb=$apiurl;
		unset($dourl,$apiurl);
		if(empty($Uaddra)||empty($Uaddrb)){
			$tmod='BUError';
	        $btsuerrormsg='BTS Connect Error!(Veson BTSU 1.0)';
			include('intem.php');
			exit;
		}
		$bh=Cbh($lidomain,$lidun);
		SURIbh($Uaddra,$Uaddrb,$bh,$lidomain,$UURLrep);
		}else{
			$tmod='BUError';
	        $btsuerrormsg='BTS Connect Error!(Veson BTSU 1.0)';
			include('intem.php');
			exit;
		}
		$yzma=Cyzm($lidomain,$bh);
		$yzmb=Cyzm($lidomain,$bh);
		$yzmc=Cyzm($lidomain,$bh);
		$yzmd=Cyzm($lidomain,$bh);
		$kla=intval(rand(9999,999999999));
		$Bcurl=$UURLrep.$lidomain.$Uaddrb.'?doid=1&bh='.$bh.'&yzma='.$yzma.'&yzmb='.$yzmb.'&yzmc='.$yzmc.'&yzmd='.$yzmd.'&dm='.$WDomain.'&kla='.$kla.'&user='.$lidun;
        $yzjg=BCurlKey($Bcurl);
		if($yzjg==$kla){
			echo utf8str('CONNECTING....TO'.$lidomain.'');
			$Uyzm=CKUyzm($bh,$lidomain);
			if($Uyzm['Debug']!='Success'){
			$tmod='BUError';
	        $btsuerrormsg='危险错误!-通信出错#0000A002（可能：①服务器DNS被篡改 ②对方服务器DNS被篡改 ③非法的信息格式/编码 ④未知错误）';
			include('intem.php');
			exit;
			}
			$Ubh=UIbh($bh,1);
			$ToKen=sha1(md5($yzma.$yzmb).md5($Uyzm['yzma'].$Uyzm['yzmb'].$Ubh));
			?>
			<script language="javascript" type="text/javascript">
           window.location.href="<?php echo $UURLrep.$lidomain.$Uaddra.'?doid=2&bh='.$bh.'&ToKen='.$ToKen; ?>"; 
            </script>
			<?
			//&backurl="+window.location.href二次开发根据需要或可改动
		}else{
			$tmod='BUError';
	        $btsuerrormsg='Error!-通信失败#0000A001';
			include('intem.php');
			mysql_query("DELETE FROM ".$mysql_head."bh_list  where Ibh='".$bh."' AND dm='".$lidomain."' ",$linka);
			mysql_query("DELETE FROM ".$mysql_head."yzm_list  where bh='".$bh."' AND yzm='".$yzma."' ",$linka);
			mysql_query("DELETE FROM ".$mysql_head."yzm_list  where bh='".$bh."' AND yzm='".$yzmb."' ",$linka);
			mysql_query("DELETE FROM ".$mysql_head."yzm_list  where bh='".$bh."' AND yzm='".$yzmc."' ",$linka);
			mysql_query("DELETE FROM ".$mysql_head."yzm_list  where bh='".$bh."' AND yzm='".$yzmd."' ",$linka);
			exit;
		}
	break;
	case "2":
		if(!isset($_GET["bh"]) || !isset($_GET['ToKen'])){
		echo 'ErrorEmpty';
		exit;
	    }
		$Ubh=intval(trim($_GET["bh"]));
		$etime=CKTUbh($Ubh,2,2);
		if($etime=="error!" || $etime>=600){
			$tmod='BUError';
	        $btsuerrormsg='请求已超时！';
			include('intem.php');
			exit;
		}
		$_SESSION['FirstT']=$Ubh;
		$Ibh=UIbh($Ubh,2);
		$bhmsg=BtsQbh($Ibh,1,2,2);
		if($bhmsg["jg"]=="Faild"){
			$tmod='BUError';
	        $btsuerrormsg='数据读取失败！（可能：①数据交换失败 ②存在危险数据 ③非法请求）请重试，连续出现该问题请联系系统管理员。';
			include('intem.php');
			exit;
		}
		$Udm=$bhmsg["dm"];
		$_SESSION['Udourl']=$bhmsg['dourl'];
		$_SESSION['Uapiurl']=$bhmsg['apiurl'];
		$_SESSION['URLrep']=$bhmsg['urlrep'];
		$Uuser=$bhmsg["user"];
		$Uyzm=CKUyzm($Ibh,$Udm);
		if($Uyzm['Debug']!='Success'){
			$tmod='BUError';
	        $btsuerrormsg='危险错误!-通信出错#0000A003（可能：①服务器DNS被篡改 ②对方服务器DNS被篡改 ③非法的信息格式/编码 ④未知错误）';
			include('intem.php');
			exit;
			}
		$Iyzm=CKIyzm($Ibh,$Udm);
		if($Iyzm['Debug']!='Success'){
			$tmod='BUError';
	        $btsuerrormsg='危险错误!-通信出错#0000A004（可能：①服务器DNS被篡改 ②对方服务器DNS被篡改 ③非法的信息格式/编码 ④未知错误）';
			include('intem.php');
			exit;
			}
		$_SESSION["Uyzm"]=$Uyzm;
		$_SESSION["Iyzm"]=$Iyzm;
		$ZToken=sha1(md5($Uyzm['yzma'].$Uyzm['yzmb']).md5($Iyzm['yzma'].$Iyzm['yzmb'].$Ibh));
		$UToken=$_GET['ToKen'];
		if($UToken!=$ZToken){
			$tmod='BUError';
	        $btsuerrormsg='非法请求！进站失败，请求未被授权!';
			include('intem.php');
			exit;
		}
		include("$WHand");
		$HandUE="1";
		include("$WHandislogin");
		if(!isset($btsuee)){
			$btsuee='0';
		}
		if($btsuee=='1'){
			$tmod='BUError';
			if(!isset($btsuerrormsg)){
	        $btsuerrormsg='非法请求或未知错误！请联系系统管理员!';
			}
			include('intem.php');
			exit;
		}
		if($Handislogin=="1"){
			if($HandUEYZ=="1"){
				$ULoginIN="1";
			}else{
				$ULoginIN="2";
			}
		}else{
			$ULoginIN="2";
		}//用户是否已经登录
		//echo $Uyzm['yzma'].'|'.$Uyzm['yzmb'].'|'.$Uyzm['yzmc'].'|'.$Uyzm['yzmd'].'|'.$Uyzm['Debug'].'|'.$etime;
		$ToKen=sha1(md5($Iyzm['yzma'].$Iyzm['yzmb']).md5($Uyzm['yzma'].$Uyzm['yzmb'].$Ubh));
		$Acurl=$bhmsg['urlrep'].$Udm.$bhmsg['apiurl'].'?doid=2&bh='.$Ibh.'&ToKen='.$ToKen;
        $cajg=BCurlKey($Acurl);
		if($cajg=="pass"){
			$btsupost="2";
			$_SESSION["btsupost"]="2";
		}else{
			$btsupost="1";
			$_SESSION["btsupost"]="1";
		    $cajgarr=explode(",",$cajg);
		}
		$_SESSION["dlzt"]='3';
		$_SESSION["bz"]='3';
		$_SESSION["Uuser"]=$Uuser;
		$_SESSION["Ibh"]=$Ibh;
		$_SESSION["Ubh"]=$Ubh;
		$_SESSION["Udm"]=$Udm;
		$_SESSION["time"]=time();
		if($btsupost=="1"){
        /*
		?>
		以下信息将被提供给<?php echo $Udm; ?>用户名:<?php echo $Uuser; ?><br />
		<?
		$qxlist='begin';
		foreach($cajgarr as $cajga){
			if(JXUxq($cajga)["bz"]=="error"){
				continue;
			}
			$qxth=JXUxq($cajga)["bz"];
			echo $qxth.'|';
			$qxlist=$qxlist.','.$qxth;
		}		
		$_SESSION["qxlist"]=$cajg;
        */
		}else{
			/*
			?>
		您即将使用:<?php echo $Uuser; ?>登录<?php echo $Udm; ?>
			<?
			*/
			$_SESSION["qxlist"]="pass";
		}
		if($ULoginIN=="2"){
		$_SESSION["ULogin"]="2";
		/*
		?>
		验证结果
		<form method="post" action="?doid=3">  
        密码：<input type="password" name="pwd" value="123456" />
		请计算<img src="jsm.php"/>：<input type="text" name="jyjg" value="" />  
        <input type="submit" value="登陆&授权" />  
        </form>
		<?
        */
		$tmod='Ulogin';
		include('intem.php');
		}else if($ULoginIN=="1"){
			$_SESSION["jyjg"]="OK";
			$_SESSION["ULogin"]="1";
			if($btsupost=="1"){
		    $_SESSION["qxlist"]=$cajg;
			}
			/*
			//为SYNC准备的代码 开发中。。。暂时没时间弄稍等
			?>
			<script language="javascript" type="text/javascript">
           window.location.href="?doid=3"; 
            </script>
			<?
			*/

			?>
			您即将使用:<?php echo $Uuser; ?>登录<?php echo $Udm; ?>
			<a href="?doid=3">确认</a>
			<?

		}
	break;
	case "3":
		if(isset($_SESSION['FirstT'])){
		if($_SESSION['FirstT']!=$_SESSION["Ubh"]){
			$tmod='BUError';
	        $btsuerrormsg='非法请求！-#FR0001';
			include('intem.php');
			exit;
		}
		unset($_SESSION['FirstT']);
	    }else{
		$tmod='BUError';
	        $btsuerrormsg='非法请求！-#FR0002';
			include('intem.php');
			exit;
		}
		if($_SESSION["bz"]!='3'){
		$tmod='BUError';
	        $btsuerrormsg='非法请求！-#BZ0001';
			include('intem.php');
			exit;
	    }
		//++++1
		if($_SESSION["dlzt"]!='3'){
		$tmod='BUError';
	        $btsuerrormsg='危险错误！步骤状态与系统状态不同步！';
			include('intem.php');
		exit;
	    }
		$timeq=$_SESSION["time"];
		$timenow=time();
		$timec=$timenow-$timeq;
		if($timec >600){
			$tmod='BUError';
			$btsuerrormsg='操作已超时！';
			include('intem.php');
			exit;
		}
		if($_SESSION["jyjg"]!="OK"){
		if($_SESSION["jyjg"]!=intval($_POST["jyjg"])){
			$_SESSION["jyjg"]=rand(0,99999);//将计算结果破坏掉，并且回回都破坏。
			$tmod='BUError';
		    $btsuerrormsg='验证计算错误!';
			include('intem.php');
			exit;
	    }
		}
		$_SESSION["jyjg"]=rand(0,99999);
		$username=$_SESSION["Uuser"];
		if($_SESSION["ULogin"]!="1"){
		$password=$_POST["pwd"];
		}
		include("$WHand");
		if($_SESSION["ULogin"]!="1"){
		include("$WHandlogin");
		if(!isset($btsuee)){
			$btsuee='0';
		}
		if($btsuee=='1'){
			$tmod='BUError';
			if(!isset($btsuerrormsg)){
	        $btsuerrormsg='非法请求或未知错误！请联系系统管理员!';
			}
			include('intem.php');
			exit;
		}
		if($handdljg!="TRUE"){
		$tmod='BUError';
		$btsuerrormsg='登陆失败!';
		include('intem.php');
		exit;
		}
		}
		$Iyzm=$_SESSION["Iyzm"];
		$Uyzm=$_SESSION["Uyzm"];
		$qxlist=$_SESSION["qxlist"];
		$Ibh=$_SESSION["Ibh"];
		$Ubh=$_SESSION["Ubh"];
		$Udourl=$_SESSION['Udourl'];
		$Uapiurl=$_SESSION['Uapiurl'];
		$ToKen=sha1(md5($Iyzm['yzma'].$Iyzm['yzmc']).md5($Uyzm['yzma'].$Uyzm['yzmc'].$Ubh));
		if($_SESSION["btsupost"]!="2"){
		$qxarr=explode(",",$qxlist);
		foreach($qxarr as $qxa){  //待优化
			$reqxa=handqx($qxa,$username,$hdbname);
			if($reqxa=="error"){
				continue;
			}
			if($qxa=='email'){ //未测试！！！！记得测试
				if(IsEBlack($reqxa)){
					$tmod='BUError';
		            $btsuerrormsg='您的注册地址已经被封禁!';
		            include('intem.php');
		            exit;
				}
				$Ccurl=$_SESSION["URLrep"].$_SESSION["Udm"].$Uapiurl.'?doid=4&bh='.$Ibh.'&ToKen='.$ToKen;
			        $csdata['res']=$reqxa;
			        $csdata['key']=$qxa;
                    $csjg=CCurlKey($Ccurl,$csdata);
			        $csgoon=2;
					continue;
			}//未测试！！！！记得测试
			$csgoon=2;
			do{   //经过深思熟虑，在用户1数据传输阶段采用POST。其实想简单点，理由就是虽然很少真的用到POST的优势，但不能在必要的时候无法发生。
			if (isset($reqxa{1000})) {
				$rexqxb=substr($reqxa,0,1000);
				$rexqxa=substr($reqxa,1000);
				$csgoon=1;
				$Ccurl=$_SESSION["URLrep"].$_SESSION["Udm"].$Uapiurl.'?doid=4&bh='.$Ibh.'&ToKen='.$ToKen;
				$csdata['res']=$reqxb;
				$csdata['key']=$qxa;
				$csjg=CCurlKey($Ccurl,$csdata);
				}else{
			    $Ccurl=$_SESSION["URLrep"].$_SESSION["Udm"].$Uapiurl.'?doid=4&bh='.$Ibh.'&ToKen='.$ToKen;
			    $csdata['res']=$reqxa;
			    $csdata['key']=$qxa;
                $csjg=CCurlKey($Ccurl,$csdata);
			    $csgoon=2;
				}
			}while($csgoon==1);
		}
		}
		$Ccurl=$_SESSION["URLrep"].$_SESSION["Udm"].$Uapiurl.'?doid=4&bh='.$Ibh.'&ToKen='.$ToKen;
		$csdata['res']='success';
		$csdata['key']='ans';
		$csjg=CCurlKey($Ccurl,$csdata);
		if($csjg=="allsuccess"){
			$Iyzmd=$Iyzm['yzmd'];
			$Uyzmc=$Uyzm['yzmc'];
			$Uyzmd=$Uyzm['yzmd'];
			$token=sha1(md5($Iyzm['yzma'].$Iyzm['yzmc']).md5($Uyzm['yzma'].$Uyzm['yzmd'].$Ubh));
			$Udm=$_SESSION["Udm"];
			$INST=IINTSet($username,$Udm);
			$IINST=$INST['in'];
			if($IINST=='1'){
				$IIemail=handqx('email',$username,$hdbname);
				SETuzt($username,'BTSUser',$Udm,1,1,0,0,$IIemail,1);
			}else if($IINST=='3'){
				$tmod='BUError';
		        $btsuerrormsg='您被禁止由本站登出至'.$Udm;
		        include('intem.php');
		        exit;
			}
			if($WDomain!=$Udm && $SDomain!=$Udm){
			$iffriend=IINFSet($Udm,'1');
			if($iffriend['in']=='1'){
				$Ncurl=$_SESSION["URLrep"].$Udm.$Uapiurl.'?doid=5';
				$Uwname=BCurlKey($Ncurl);
				$Uwname=trim($Uwname);
				SETfriend($Uwname,$Udm,1);
			}
			}
			echo utf8str('正在建立返回通信【不要关闭浏览器】....TO'.$Udm.'');
			$UURLrep=$_SESSION["URLrep"];
			?>
			<script language="javascript" type="text/javascript">
           window.location.href="<?php echo $UURLrep.$Udm.$Udourl.'?doid=4&bh='.$Ibh.'&token='.$token; ?>"; 
            </script>
			<?
		}
	break;
	case "4":
		if(!isset($_GET["bh"])){
		    $tmod='BUError';
		    $btsuerrormsg='非法请求！';
		    include('intem.php');
		    exit;
	    }
		$Ubh=intval(trim($_GET["bh"]));
		$etime=CKTUbh($Ubh,2,2);
		if($etime=="error!" || $etime>=900){
			$tmod='BUError';
		    $btsuerrormsg='操作已超时！';
		    include('intem.php');
		    exit;
		}
		$Ibh=UIbh($Ubh,2);
		$bhmsg=BtsQbh($Ibh,1,2,2);
		if($bhmsg["jg"]=="Faild"){
			$tmod='BUError';
		    $btsuerrormsg='危险错误！授权不匹配,操作被拒绝！';
		    include('intem.php');
		    exit;
		}
		$Udm=$bhmsg["dm"];
		$Uyzm=CKUyzm($Ibh,$Udm);
		$Iyzm=CKIyzm($Ibh,$Udm);
		$Itoken=sha1(md5($Uyzm['yzma'].$Uyzm['yzmc']).md5($Iyzm['yzma'].$Iyzm['yzmd'].$Ibh));
		if(trim($_GET["token"])!=$Itoken){
			$tmod='BUError';
		    $btsuerrormsg='危险错误！操作被拒绝！';
		    include('intem.php');
		    exit;
		}
		$Yans=QCres($Ibh,"ans");
		if($Yans["jg"]!="success"){
			$tmod='BUError';
		    $btsuerrormsg='危险错误！数据读取失败,操作被拒绝！';
		    include('intem.php');
		    exit;
		}
		$_SESSION["Udm"]=$Udm;
		include("$WHand");
		$username=$bhmsg["user"];
		$INr=IINreg($username,$Udm);
		$IINr=$INr["in"];
		switch($IINr){
			case "1":
				if(!isset($_SESSION['btsuregyz'],$_POST['jyjg'])){
				$_SESSION['btsuregyz']='will';
                $_SESSION["jyjg"]=rand(0,99999);
			    }
				if($_SESSION['btsuregyz']=='reg'){
				$_SESSION['btsuregyz']='done';
				if($_POST['jyjg']!=$_SESSION["jyjg"]){
				$_SESSION["jyjg"]=rand(0,99999);
				$_SESSION['btsuregyz']='reg';
				$tmod='IIlogin';
		        include('intem.php');
		        exit;
				}
			    }else{
				$_SESSION["jyjg"]=rand(0,99999);
				$_SESSION['btsuregyz']='reg';
				$tmod='IIlogin';
		        include('intem.php');
		        exit;
				}
			    $qxarr=explode(",",$NeedM);
				$regml="";
				foreach($qxarr as $qxa){  //待优化
			    $reqxa=QCres($Ibh,$qxa);
			    if($reqxa["jg"]!="success"){
					$rval="NUL";
					include($WHandkeydo);
					if(!isset($btsuee)){
			$btsuee='0';
		}
					if($btsuee=='1'){
			        $tmod='BUError';
			        if(!isset($btsuerrormsg)){
	                $btsuerrormsg='非法请求或未知错误！请联系系统管理员!';
			         }
			        include('intem.php');
			        exit;
		            }
				continue;
			     }
				 $rval=$reqxa["val"];
				 include($WHandkeydo);
				 if(!isset($btsuee)){
			$btsuee='0';
		}
				 if($btsuee=='1'){
			     $tmod='BUError';
			     if(!isset($btsuerrormsg)){
	             $btsuerrormsg='非法请求或未知错误！请联系系统管理员!';
			     }
			     include('intem.php');
			     exit;
		         }
				}
				$pass=$Iyzm['yzmd'].time();
				$passs=md5($pass);
				$password=substr($pass,1,17);
				include($WHandreg);
				if(!isset($btsuee)){
			$btsuee='0';
		}
				if($btsuee=='1'){
			$tmod='BUError';
			if(!isset($btsuerrormsg)){
	        $btsuerrormsg='非法请求或未知错误！请联系系统管理员!';
			}
			include('intem.php');
			exit;
		}
				if(isset($Userbd)){
					if($Userbd=='1'){
						$tmod='UserBD';
		                include('intem.php');
						exit;
					}
					exit;
				}
				SETuzt($Iusername,$Uusername,$Udm,2,1,$Iuid,1,$email,1);
				if($WDomain!=$Udm && $SDomain!=$Udm){
				$iffriend=IINFSet($Udm,'2');
			    if($iffriend['in']=='1'){
				$Ncurl='http://'.$Udm.$bhmsg['apiurl'].'?doid=5';
				$Uwname=BCurlKey($Ncurl);
				$Uwname=trim($Uwname);
				SETfriend($Uwname,$Udm,2);
			    }
				}
				echo 'Username & Password of ['.$SDomain.'] has been send to your emailaddress!';
				$mailto=$email;
				$mailtitle='您在'.$Wname.'['.$SDomain.']的独立用户名和密码';
				$mailtxt='您已经成功使用BTSnowBall_Users协议登陆了'.$Wname.'['.$SDomain.']。在这里您除了可以继续使用BTSnowBall_Users方式登陆'.$Wname.'['.$SDomain.']以外我们还为您生成了一个独立的登陆用户名和密码以备不时之需。<br />您的用户名是:'.$Iusername.'<br />您的密码是:'.$password.'<br />此致<br />'.$Wname.'['.$SDomain.']&BTSnowBall项目社区[BTSnowBall.Org]';
				include('dorun/Run_Mail.php');
				?>
				<script language="javascript" type="text/javascript">
                window.location.href="<?php echo $URLrep.$WDomain; ?>"; 
                </script>
				<?
			break;
			case "2":
				echo "login!";
			    //handdl($username,'SDSDASF',2);
				$password='SDSDASF';
				$fs="2";
				$username=$INr["Iusername"];
				include("$WHandlogin");
				if(!isset($btsuee)){
			$btsuee='0';
		}
				if($btsuee=='1'){
			$tmod='BUError';
			if(!isset($btsuerrormsg)){
	        $btsuerrormsg='非法请求或未知错误！请联系系统管理员!';
			}
			include('intem.php');
			exit;
		}
				if($handdljg!="TRUE"){
					$tmod='BUError';
		            $btsuerrormsg='登陆失败！';
		            include('intem.php');
		            exit;
				}
				?>
				<script language="javascript" type="text/javascript">
                window.location.href="<?php echo $URLrep.$WDomain; ?>"; 
                </script>
				<?
			break;
			case "3":
				$tmod='BUError';
		        $btsuerrormsg='请求被拒绝！';
		        include('intem.php');
		        exit;
			break;
			default:
	        break;
		}
		break;
	case "plus":
		$plusname="none";
		if(isset($_GET["plus"])){
			$plusname=$_GET["plus"];
		}
		if(isset($_SESSION["plus"])){
			$plusname=$_SESSION["plus"];
		}
		include('order/plus_map.php');
		if(!isset($btsuee)){
			$btsuee='0';
		}
		if($btsuee=='1'){
			$tmod='BUError';
			if(!isset($btsuerrormsg)){
	        $btsuerrormsg='非法请求或未知错误！请联系系统管理员!';
			}
			include('intem.php');
			exit;
		}
	break;
	default:
	break;
}
include_once('waste.php');
$pluswz='btsudof';
include('btsuplus.php');