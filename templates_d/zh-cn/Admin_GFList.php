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
$dwname='ErrorUsername';
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
			if($_SESSION['BtsuDel']=='allogf'){
			DelGoodFri($Muid,0);
			}
			}
		break;
		case "delx":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			$_SESSION['BtsuDel']='allogf';
			$tmod='BUError';
	        $btsuerrormsg='您确定继续进行删除'.$dwname.'操作么？该操作不可恢复！';
			$gourl='?msg=GFlist&do=del&id='.$Muid.'&page='.$_GET['page'].'&dusername='.$dwname;
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
			StopGoodFri($Muid,0);
		break;
		case "run":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			BeginGoodFri($Muid,0);
		break;
		case "GFAdd":
			if(!isset($_POST['wname'],$_POST['wdomain'],$_POST['Rank'],$_POST['zt'],$_POST['from'])){
			break;
		    }
			if(isset($_POST['ly'])){
				if($_POST['ly']==""){
					$ly='手动添加';
				}else{
					$ly=fzr($_POST['ly']);
				}
			}else{
				$ly='手动添加';
			}
			if(isset($_POST['bz'])){
				if($_POST['bz']==""){
					$bz='无';
				}else{
					$bz=fzr($_POST['bz']);
				}
			}else{
				$bz='无';
			}
			$AddError='2';
			if($_POST['wname']==""){
				$AddError='1';
				$btsuerrormsg='应用名不能为空!';
			}
			if($_POST['wdomain']==""){
				$AddError='1';
				$btsuerrormsg='应用域名不能为空!';
			}
			if($_POST['Rank']==""){
				$AddError='1';
				$btsuerrormsg='应用Rank不能为空!';
			}
			if($_POST['zt']==""){
				$AddError='1';
				$btsuerrormsg='应用状态不能为空!';
			}
			if($_POST['from']==""){
				$AddError='1';
				$btsuerrormsg='应用流向不能为空!';
			}
			if($AddError=='1'){
				$bkurl='javascript:history.go(-1)';
				echo $btsuerrormsg;
				?>
				<strong><a class="btn btn-primary" href="<?php echo $bkurl; ?>" >[返回]</a></strong>
				<?php
				exit;
			}
			$wname=fzr($_POST['wname']);
			$wdomain=fzr($_POST['wdomain']);
			$rank=intval($_POST['Rank']);
			$zt=intval($_POST['zt']);
			$from=intval($_POST['from']);
			if($from!=5){
				NewGoodFri($wname,$wdomain,$rank,$zt,$from,$ly,$bz,0);
			}else{
				NewGoodFri($wname,$wdomain,$rank,$zt,'1',$ly,$bz,0);
				NewGoodFri($wname,$wdomain,$rank,$zt,'2',$ly,$bz,0);
			}
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
$sqllist=mysqli_query($linkai,"SELECT * FROM `".$mysql_head."w_goodfriend` limit ".$nuba.",".$nubb." ");
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
 本站联盟应用的名单及总体情况.
 </div>
 <br />
 <table class="table table-hover table-condensed">
  <tr>
  <td>序号</td><td>应用名</td><td>域名</td><td>Rank</td><td>分值</td><td>状态</td><td>流向</td><td>来源</td><td>备注</td><td>操作</td>
  </tr>
<?php
$donum=1;
do{
?>
  <tr>
  <td><?php echo $donum; ?></td><td><?php echo $infolist->wname; ?></td><td>
  <?php 
  echo $infolist->wdomain;
  ?>
  </td><td>
<?php
  echo $infolist->rank;
		  ?>
		  </td><td><?php echo $infolist->fz; ?></td><td>
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
  $bdfrom=$infolist->from; 
  if($bdfrom=='1'){
	  echo '绑出';
  }elseif($bdfrom=='2'){
	  echo '绑入';
  }elseif($bdfrom=='3'){
	  echo '未知';
  }elseif($bdfrom=='4'){
	  echo '双向'; //双向仅为预留并未启用
  }else{
	  echo '异常';
  }
  ?>
		  </td><td>
		  <?php
  echo $infolist->ly;
		  ?>
		  </td><td>
		  <?php
  echo $infolist->bz;
		  ?>
		  </td><td>
<?php
if($zt=='1'){
?>
<a class="btn btn-warning" href="?msg=GFlist&do=stop&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">禁用</a> <a class="btn btn-danger" href="?msg=GFlist&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>&dwname=<?php echo $infolist->wname; ?>">删除</a>
<?php
	  }elseif($zt=='2'){
?>
<a class="btn btn-success" href="?msg=GFlist&do=run&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">启用</a> <a class="btn btn-danger" href="?msg=GFlist&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>&dwname=<?php echo $infolist->wname; ?>">删除</a>
<?php
		  }else{
?>
 <a class="btn btn-danger" href="?msg=GFlist&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>&dwname=<?php echo $infolist->wname; ?>">删除</a>
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
<a class="btn btn-success" href="?msg=GFlist&page=<?php echo $page-1; ?>">上一页</a>
<a class="btn btn-success" href="?msg=GFlist&page=<?php echo $page+1; ?>">下一页</a><br />
<h3><strong>添加一个新的联盟应用</strong></h3>
<form name="GFAdd" method="post" action="AdminBtsu.php?msg=GFlist&do=GFAdd">
  <div class="form-group">
    <label for="wname">应用名</label>
    <input type="text" class="form-control" id="wname" name="wname" placeholder="输入要添加的应用名称。">
  </div>
   <div class="form-group">
    <label for="wdomain">应用域名</label>
    <input type="text" class="form-control" id="wdomain" name="wdomain" placeholder="输入要添加的应用域名。">
	<br />*该域名是可以和对方的引擎通信的域名。http://【您所填写的域名】/btsuser/ 就是对方的通信接口。
  </div>
  <div class="form-group">
    <label for="ly">来源</label>
    <input type="text" class="form-control" id="ly" name="ly" placeholder="默认为手动添加。如有特殊指定请在此输入。" value="">
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
 流向:
<label class="radio-inline">
  <input type="radio" name="from" id="fromt" value="1"> 绑出
</label>
<label class="radio-inline">
  <input type="radio" name="from" id="from" value="2"> 绑入
</label>
<label class="radio-inline">
  <input type="radio" name="from" id="from" value="3"> 未知
</label>
<label class="radio-inline">
  <input type="radio" name="from" id="from" value="5" checked> 双向
</label>
</div>
<div>
备注:
<textarea class="form-control" name="bz" rows="3" placeholder="为了您的用户体验请您严格核对以上信息真实准确。该操作将向数据库直接置入以上信息。"></textarea>
</div>
  <br /><button type="submit" class="btn btn-default">添加</button>
</form>