  <?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
  echo '正在校验....ZClod引擎版本:BTSnowBall_CloudRunner_V0.1.1<br />';
  if(!isset($InBtsuAdmin)){
	  echo 'ERRORA';
	  exit;
  }else{
  if($InBtsuAdmin!='1'){
	  echo 'ERRORB';
  exit;
  }
  }
  $zcrun=2;
  $do=trim($_GET['do']);
  switch($do){
	 case "dorun":
		 $zcrun=1;
	 break;
	 default:
		 echo '无效的指令!';
		 exit;
	 break;
	 }
  if($zcrun==1){
	  if(isset($_GET['id'])){
	    $zcid=intval(trim($_GET['id']));
	    $sqlzc=mysql_query("SELECT `id`,`api` FROM `".$mysql_head."zcloud` WHERE `id`='".$zcid."' ",$linka);
        if($infozc=mysql_fetch_object($sqlzc)){
        if($infozc==""){
		echo '非法请求/记录异常！引导失败！';
		exit;
		}
		$_SESSION['zcapi']=$infozc->api;
		$_SESSION['zcid']=$infozc->id;
	    }else{
		echo '非法请求/记录异常！引导失！';
		exit;
	    }
      }
	  if(isset($_GET['mode'])){
		  $mode=trim($_GET['mode']);
	  }else{
		  $mode=1;
	  }
     switch($mode){
	 case "1":
	 ?>
	 <title>引导....MODE1-单个引导...@<?php echo $_SESSION['zcapi']; ?></title>
	 <?php
     if(!isset($_SESSION['zcapi'])){
		 echo '服务器内部错误，请检查SESSION是否正常！';
		 exit;
	 }
	 $timenow=time();
	 $apiurl=$_SESSION['zcapi'];
	 $zcid=$_SESSION['zcid'];
	 //-----TAGBEGIN
	  if(!isset($_GET['tag'])){
	 $Wapiurl='http://'.$apiurl.'?setp=0&msg=black';
	 $datemsg=BCurlKey($Wapiurl);
	 $dateobj=json_decode($datemsg);
	 if(isset($dateobj->txt)){
		 echo '<p>Message:'.$dateobj->txt.'</p>';
	 }
		 ?>
     <a class="btn btn-info" href="?msg=runzc&do=dorun&mode=1&id=<?php echo $_SESSION['zcid']; ?>&page=<?php echo $_GET['page']; ?>&tag=all">以TAG值为all继续</a><br />OR<br />
	 <form name="tag" method="get" action="AdminBtsu.php">
	 <div class="form-group">
     <label for="tag">TAG:</label>
     <input type="text" class="form-control" id="tag" name="tag" placeholder="Example:all">
     </div>
	 <input type="hidden" name="msg" value="runzc">
	 <input type="hidden" name="do" value="dorun">
	 <input type="hidden" name="mode" value="1">
	 <input type="hidden" name="id" value="<?php echo $_SESSION['zcid']; ?>">
	 <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
	 <br /><button type="submit" class="btn btn-default">继续0</button>
	 </form>
	 <?php
	 	 exit;
	 }else{
		 $tag=trim($_GET['tag']);
	 }
	 //----------TAGEDN
	 $Wapiurl='http://'.$apiurl.'?setp=1&msg=wblack&tag='.$tag;
	 $datemsg=BCurlKey($Wapiurl);
	 $dateobj=json_decode($datemsg);
	 if(!isset($dateobj->num)){
		 echo 'BTSnowBall站云返回数据异常,可能是该站云正在整理数据\暂停服务\服务器过忙。请择时重试。';
		 exit;
	 }
	 if(isset($dateobj->txt)){
		 echo '<p>Message:'.$dateobj->txt.'</p>';
	 }
	 echo '该云总计提供应用黑名单数量为:'.$dateobj->num.';分'.$dateobj->page.'组提供;版本为'.$dateobj->ves;
	 $wpage=intval($dateobj->page);
	 $nwpage=1;
	 do{
	 $Wapiurl='http://'.$apiurl.'?setp=2&msg=wblack&tag='.$tag.'&page='.$nwpage;
	 $datemsg=BCurlKey($Wapiurl);
	 echo '<br />正在引导第'.$nwpage.'组数据....';
	 $nwpage=$nwpage+1;
	 $datearr=json_decode($datemsg,true);
	 if(!is_array($datearr)){
		 echo '返回数据出现严重错误，载入终止';
		 exit;
	 }
	 foreach($datearr as $wbadd){
		 $wbaddmsg=explode("|",$wbadd);
		 if(!isset($wbaddmsg[4])){
			 continue;
		 }
		 $wname=$wbaddmsg[0];
		 if($wname==""){
			 continue;
		 }
		 $wdomain=$wbaddmsg[1];
		 if($wdomain==""){
			 continue;
		 }
		 $wzt=$wbaddmsg[2];
		 if($wzt==""){
			 continue;
		 }
		 $from=$wbaddmsg[3];
		 if($from==""){
			 $from='3';
		 }
		 $text=$wbaddmsg[4];
		 if(!IsWBlack($wdomain,$from)){
		 NewWBlack($wname,$wdomain,'4',$wzt,$from,$text,$zcid,1);
		 }
	 }
	 }while($nwpage<=$wpage);
	 echo '<br />'.'应用黑名单引导完成!100%...<br />正在索引地址黑名单引导...wait..'.'<br />';
	 $Wapiurl='http://'.$apiurl.'?setp=1&msg=eblack&tag='.$tag;
	 $datemsg=BCurlKey($Wapiurl);
	 $dateobj=json_decode($datemsg);
	 if(!isset($dateobj->num)){
		 echo 'BTSnowBall站云返回数据异常,可能是该站云正在整理数据\暂停服务\服务器过忙。请择时重试。';
		 exit;
	 }
	 echo '该云总计提供地址黑名单数量为:'.$dateobj->num.';分'.$dateobj->page.'组提供;版本为'.$dateobj->ves;
	 $wpage=intval($dateobj->page);
	 $nwpage=1;
	 do{
	 $Wapiurl='http://'.$apiurl.'?setp=2&msg=eblack&tag='.$tag.'&page='.$nwpage;
	 $datemsg=BCurlKey($Wapiurl);
	 echo '<br />正在引导第'.$nwpage.'组数据....';
	 $nwpage=$nwpage+1;
	 $datearr=json_decode($datemsg,true);
	 if(!is_array($datearr)){
		 echo '返回数据出现严重错误，载入终止';
		 exit;
	 }
	 foreach($datearr as $ebadd){
		 $ebaddmsg=explode("|",$ebadd);
		 if(!isset($ebaddmsg[2])){
			 continue;
		 }
		 $email=$ebaddmsg[0];
		 if($email==""){
			 continue;
		 }
		 $update=$ebaddmsg[1];
		 if($update==""){
			 continue;
		 }
		 $text=$ebaddmsg[2];
		 if($text==""){
			 continue;
		 }
		 if(!IsEBlack($email,1)){
		 NewEBlack($email,$text,1,$update,$zcid,0);
		 }
	 }
	 }while($nwpage<=$wpage);
	  echo '<br />'.'地址黑名单引导完成!100%...<br />本次索引结束！'.'<br />';
	 break;
	 case "2":
	 ?>
	 <title>引导....MODE2-单个引导...@<?php echo $_SESSION['zcapi']; ?></title>
	 <?php
	 $timenow=time();
	 $apiurl=$_SESSION['zcapi'];
	 $zcid=$_SESSION['zcid'];
	 if(!isset($_SESSION['zcapi'])){
		 echo '服务器内部错误，请检查SESSION是否正常！';
		 exit;
	 }
	 if(!isset($_GET['tag'])){
	 $Wapiurl='http://'.$apiurl.'?setp=0&msg=wfriend';
	 $datemsg=BCurlKey($Wapiurl);
	 $dateobj=json_decode($datemsg);
	 if(isset($dateobj->txt)){
		 echo '<p>Message:'.$dateobj->txt.'</p>';
	 }
		 ?>
     <a class="btn btn-info" href="?msg=runzc&do=dorun&mode=2&id=<?php echo $_SESSION['zcid']; ?>&page=<?php echo $_GET['page']; ?>&tag=all">以TAG值为all继续</a><br />OR<br />
	 <form name="tag" method="get" action="AdminBtsu.php">
	 <div class="form-group">
     <label for="tag">TAG:</label>
     <input type="text" class="form-control" id="tag" name="tag" placeholder="Example:all">
     </div>
	 <input type="hidden" name="msg" value="runzc">
	 <input type="hidden" name="do" value="dorun">
	 <input type="hidden" name="mode" value="2">
	 <input type="hidden" name="id" value="<?php echo $_SESSION['zcid']; ?>">
	 <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
	 <br /><button type="submit" class="btn btn-default">继续0</button>
	 </form>
	 <?php
	 	 exit;
	 }else{
		 $tag=trim($_GET['tag']);
	 }
	 $Wapiurl='http://'.$apiurl.'?setp=1&msg=wfriend&tag='.$tag;
	 $datemsg=BCurlKey($Wapiurl);
	 $dateobj=json_decode($datemsg);
	 if(!isset($dateobj->num)){
		 echo 'BTSnowBall站云返回数据异常,可能是该站云正在整理数据\暂停服务\服务器过忙。请择时重试。';
		 exit;
	 }
	 if(isset($dateobj->txt)){
		 echo '<p>Message:'.$dateobj->txt.'</p>';
	 }
	 echo '该云总计提供历史应用名单数量为:'.$dateobj->num.';分'.$dateobj->page.'组提供;版本为'.$dateobj->ves;
	 $wpage=intval($dateobj->page);
	 $nwpage=1;
	 do{
	 $Wapiurl='http://'.$apiurl.'?setp=2&msg=wfriend&page='.$nwpage.'&tag='.$tag;
	 $datemsg=BCurlKey($Wapiurl);
	 echo '<br />正在引导第'.$nwpage.'组数据....';
	 $nwpage=$nwpage+1;
	 $datearr=json_decode($datemsg,true);
	 if(!is_array($datearr)){
		 echo '返回数据出现严重错误，载入终止';
		 exit;
	 }
	 foreach($datearr as $wbadd){
		 $wbaddmsg=explode("|",$wbadd);
		 if(!isset($wbaddmsg[4])){
			 continue;
		 }
		 $wname=$wbaddmsg[0];
		 if($wname==""){
			 continue;
		 }
		 $wdomain=$wbaddmsg[1];
		 if($wdomain==""){
			 continue;
		 }
		 $wzt=$wbaddmsg[2];
		 if($wzt==""){
			 continue;
		 }
		 $from=$wbaddmsg[3];
		 if($from==""){
			 $from='3';
		 }
		 $txt=$wbaddmsg[4];
		 if(!IsFri($wdomain,$from)){
		 NewFri($wname,$wdomain,'4',$wzt,$from,$txt);
		 }
	 }
	 }while($nwpage<=$wpage);
	 echo '<br />'.'新的历史应用名单引导完成!100%...<br />'.'<br />';
	 break;
	 default:
		 exit;
	 break;
	 }
}