<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
if(!isset($InBtsuAdmin)){
	  exit;
  }else{
  if($InBtsuAdmin!='1'){
  exit;
  }
  }
if(isset($_GET['dwname'])){
$dwname=$_GET['dwname'];
$dwname=fzr($dwname);
}else{
$dwname='ErrorZCloudname';
}
if(isset($_GET['do'])){
	$domy=$_GET['do'];
	switch($domy){
		case "del":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			if(isset($_SESSION['BtsuDel'])){
			if($_SESSION['BtsuDel']=='allzc'){
			DelZCloud($Muid,0);
			}
			}
		break;
		case "delx":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			$_SESSION['BtsuDel']='allzc';
			$tmod='BUError';
	        $btsuerrormsg='您确定继续进行删除'.$dwname.'操作么？该操作不可恢复！';
			$gourl='?msg=btszcloud&do=del&id='.$Muid.'&page='.$_GET['page'].'&dusername='.$dwname;
			 $bkurl='javascript:history.go(-1)';
			?>
			 <div class="bg-warning">
			<h1><strong>
			<?php
			 echo $btsuerrormsg;
	  ?>
  <a href="<?php echo $gourl; ?>" >[继续]</a>&nbsp;
  <a href="<?php echo $bkurl; ?>" >[后退]</a></strong></h1></div>
  <?php
			exit;
		break;
		case "stop":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			StopZCloud($Muid,0);
		break;
		case "run":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			BeginZCloud($Muid,0);
		break;
		case "zd":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			ZDZCloud($Muid,0);
		break;
		case "bd":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			BDZCloud($Muid,0);
		break;
		case "ZCAdd":
			if(!isset($_POST['name'],$_POST['api'],$_POST['Rank'],$_POST['zt'],$_POST['zb'])){
			break;
		    }
			$AddError='2';
			if($_POST['name']==""){
				$AddError='1';
				$btsuerrormsg='站云名称不能为空!';
			}
			if($_POST['api']==""){
				$AddError='1';
				$btsuerrormsg='站云API地址不能为空!';
			}
			if($_POST['Rank']==""){
				$AddError='1';
				$btsuerrormsg='站云Rank不能为空!';
			}
			if($_POST['zt']==""){
				$AddError='1';
				$btsuerrormsg='站云状态不能为空!';
			}
			if($_POST['zb']==""){
				$AddError='1';
				$btsuerrormsg='站云主备不能为空!';
			}
			if($AddError=='1'){
				$bkurl='javascript:history.go(-1)';
				echo $btsuerrormsg;
				?>
				<strong><a class="btn btn-primary" href="<?php echo $bkurl; ?>" >[返回]</a></strong>
				<?php
				exit;
			}
			if(isset($_POST['url'])){
				if($_POST['url']==""){
					$url='http://www.btsnowball.org/ErrorZCloudURL/';
				}else{
					$url=fzr($_POST['url']);
				}
			}else{
				$url='http://www.btsnowball.org/ErrorZCloudURL/';
			}
			if(isset($_POST['ms'])){
				if($_POST['ms']==""){
					$ms='手动添加:无';
				}else{
					$ms=fzr($_POST['ms']);
				}
			}else{
				$url='手动添加:无';
			}
			$name=fzr($_POST['name']);
			$api=fzr($_POST['api']);
			$rank=intval($_POST['Rank']);
			$zt=intval($_POST['zt']);
			$zb=intval($_POST['zb']);
				NewZCloud($name,$api,$url,$rank,$zt,$zb,$ms,0);
		break;
		default:
	    break;
	}
}
if(isset($_SESSION['BtsuDel'])){
$_SESSION['BtsuDel']=='Un';
}
if(!isset($_GET['page'])){
	$nuba=0;
	$nubb=30;
	$page=1;
}else{
	$page=intval($_GET['page']);
	if($page<=1){
		$page=1;
	}
	$nuba=$page*30-30;
	$nubb=30;
}
$sqllist=mysqli_query($linkai,"SELECT * FROM `".$mysql_head."zcloud` limit ".$nuba.",".$nubb." ");
$dolist='1';
if($infolist=mysqli_fetch_object($sqllist)){
        if($infolist==""){
		echo '没有更多记录！';
		$dolist='2';
		}
	}else{
		echo '没有更多记录！';
		$dolist='2';
	}
if($dolist=='1'){
?>
 <div class="bg-warning">
 您所加载的BTSnowBall站云列表
 </div>
 <br />
 <table class="table table-hover">
  <tr>
  <td>序号</td><td>云名称</td><td>API地址</td><td>Rank</td><td>主/被</td><td>状态</td><td>描述</td><td>执行</td><td>操作</td>
  </tr>
<?php
$donum=1;
do{
?>
  <tr>
  <td><?php echo $donum; ?></td><td><a href="http://<?php echo $infolist->url; ?>"><?php echo $infolist->name; ?></a></td><td>
  <?php 
  echo $infolist->api;
  ?>
  </td><td>
<?php
  echo $infolist->rank;
		  ?>
		  </td><td>
<?php 
$zb=$infolist->zb;
		    if($zb=='1'){
				?>
<a class="btn btn-success" href="?msg=btszcloud&do=bd&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">
				<?php
	  echo '主动';
	  }elseif($zb=='2'){
?>
<a class="btn btn-info" href="?msg=btszcloud&do=zd&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">
<?php
		  echo '被动';
		  }else{
			  ?>
<a class="btn btn-warning" href="?msg=btszcloud&do=yc&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">
<?php
			  echo '异常/未知';
		  }
?>
</a>
</td><td>
<?php
  $zt=$infolist->zt;
  if($zt=='1'){
	  echo '正常';
	  }elseif($zt=='2'){
		  echo '禁用';
		  }else{
			  echo '异常';
		  }
		  ?>
		  </td><td>
  <?php 
 echo $infolist->ms;
  ?>
		  </td><td>
<a class="btn btn-success" target="_blank" href="?msg=runzc&do=dorun&mode=1&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">引导黑名单</a><a class="btn btn-info" target="_blank" href="?msg=runzc&do=dorun&mode=2&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">引导新历史</a>
		  </td><td>
<?php
if($zt=='1'){
?>
<a class="btn btn-warning" href="?msg=btszcloud&do=stop&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">禁用</a> <a class="btn btn-danger" href="?msg=btszcloud&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>&dwname=<?php echo $infolist->name; ?>">删除</a>
<?php
	  }elseif($zt=='2'){
?>
<a class="btn btn-success" href="?msg=btszcloud&do=run&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">启用</a> <a class="btn btn-danger" href="?msg=btszcloud&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>&dwname=<?php echo $infolist->name; ?>">删除</a>
<?php
		  }else{
?>
 <a class="btn btn-danger" href="?msg=btszcloud&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>&dwname=<?php echo $infolist->name; ?>">删除</a>
<?php
		  }
		  ?>
  </td>
  </tr>
<?php
$donum=$donum+1;
}while($infolist=mysqli_fetch_object($sqllist));
?>
</table>
<?php
}
?>
&nbsp;页面跳转:
<a class="btn btn-success" href="?msg=btszcloud&page=<?php echo $page-1; ?>">上一页</a>
<a class="btn btn-success" href="?msg=btszcloud&page=<?php echo $page+1; ?>">下一页</a><br />
<h3><strong>手动添加一个站云</strong></h3>
<form name="GFAdd" method="post" action="AdminBtsu.php?msg=btszcloud&do=ZCAdd">
  <div class="form-group">
    <label for="name">站云名称</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="输入要添加的站云名称。">
  </div>
   <div class="form-group">
    <label for="api">API地址</label>
    <input type="text" class="form-control" id="api" name="api" placeholder="输入要添加的站云API地址。">
	<br />
  </div>
  <div class="form-group">
    <label for="url">站云主页地址</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="输入要添加的站云主页地址。">
	<br />
  </div>
  <div class="radio">
  Rank:
<label class="radio-inline">
  <input type="radio" name="Rank" id="Rank" value="1" checked> 1
</label>
<label class="radio-inline">
  <input type="radio" name="Rank" id="Rank" value="2"> 2
</label>
<label class="radio-inline">
  <input type="radio" name="Rank" id="Rank" value="3"> 3
</label>
<label class="radio-inline">
  <input type="radio" name="Rank" id="Rank" value="4"> 4
</label>
<label class="radio-inline">
  <input type="radio" name="Rank" id="Rank" value="5"> 5
</label>
<label class="radio-inline">
  <input type="radio" name="Rank" id="Rank" value="6"> 6
</label>
<label class="radio-inline">
  <input type="radio" name="Rank" id="Rank" value="7"> 7
</label>
  </div>
<div class="radio">
 预置状态:
<label class="radio-inline">
  <input type="radio" name="zt" id="zt" value="1" checked> 正常
</label>
<label class="radio-inline">
  <input type="radio" name="zt" id="zt" value="2"> 禁用
</label>
<label class="radio-inline">
  <input type="radio" name="zt" id="zt" value="3"> 异常
</label>
</div>
<div class="radio">
 主动/被动:
<label class="radio-inline">
  <input type="radio" name="zb" id="zb" value="1" checked> 主动
</label>
<label class="radio-inline">
  <input type="radio" name="zb" id="zb" value="2"> 被动
</label>
</div>
<div>
描述:
<textarea class="form-control" name="ms" rows="3" placeholder="描述信息"></textarea>
</div>
  <br /><button type="submit" class="btn btn-default">添加</button>
</form>
<div>
*注意：一定要确保所添加的数据提供云是可靠的。当不可靠的信息直接写入您的数据库后果不可预测。<br />
BTSnowBall的官方非盈利数据云是:<br />
API1:ServerA.ZC.Cloud.BTSnowBall.org<br />
API2:ServerB.ZC.Cloud.BTSnowBall.org<br />
API3:ServerC.ZC.Cloud.BTSnowBall.org<br />
①官方云如遇引导失败可能是同时引导的网站过多或是社区正在整理审查数据。官方云不会停止服务。<br />
</div>