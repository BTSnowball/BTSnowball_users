<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/

if(isset($_GET['do'])){
	$domy=$_GET['do'];
	switch($domy){
		case "nobel":
			if(!isset($_GET['dm'])){
			break;
		    }
			$ddm=trim($_GET['dm']);
			$ddm=fzr($ddm);
			$qciue=QCBDUser($Iusername,1,$ddm,1);
			$email=$qciue['email'];
			SetBelive($email,$ddm,2);
		break;
		case "dobel":
			if(!isset($_GET['dm'])){
			break;
		    }
			$ddm=trim($_GET['dm']);
			$ddm=fzr($ddm);
			$qciue=QCBDUser($Iusername,1,$ddm,1);
			$email=$qciue['email'];
			SetBelive($email,$ddm,1,1,1);
		break;
		case "del":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			if(isset($_SESSION['BtsuDel'])){
			if($_SESSION['BtsuDel']=='allo'){
			DelUbIU($Muid,$Iusername);
			}
			}
		break;
		case "delx":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			$_SESSION['BtsuDel']='allo';
			$tmod='BUError';
	        $btsuerrormsg='您确定继续进行删除操作么？该操作不可恢复！';
			$gourl='?msg=list&do=del&id='.$Muid.'&page='.$_GET['page'];
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
			UpUbXX('zt','2','id',$Muid,'Iusername',$Iusername);
		break;
		case "run":
			if(!isset($_GET['id'])){
			break;
		    }
			$Muid=intval($_GET['id']);
			UpUbXX('zt','1','id',$Muid,'Iusername',$Iusername);
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
$sqllist=mysqli_query($linkai,"SELECT * FROM `".$mysql_head."userzt` WHERE `Iusername`='".$Iusername."' limit ".$nuba.",".$nubb." ");
$dolist='1';
if($infolist=mysqli_fetch_object($sqllist)){
        if($infolist==""){
		echo '没有更多记录！'.$Iusername.'1';
		$dolist='2';
		}
	}else{
		echo '没有更多记录！'.$Iusername.'2';
		$dolist='2';
	}
if($dolist=='1'){
?>
 <div class="bg-warning">
 查询你现有的绑定情况.
 </div>
 <br />
 <table class="table table-hover">
  <tr>
  <td>序号</td><td>绑定网站</td><td>流向</td><td>绑定用户名</td><td>绑定邮箱</td><td>状态</td><td>信任</td><td>操作</td>
  </tr>
<?php
$donum=1;
do{
?>
  <tr>
  <td><?php echo $donum; ?></td><td><?php echo $infolist->dm; ?></td><td>
  <?php 
  $bdfrom=$infolist->from; 
  if($bdfrom=='1'){
	  echo '绑出';
  }else{
	  echo '绑入';
  }
  ?>
  </td><td>
<?php
  $Uusername=$infolist->Uusername;
  if($Uusername=='BTSUser'){
	  echo '未知';
	  }else{
		  echo $Uusername; 
		  } 
		  ?>
		  </td><td><?php echo $infolist->email; ?></td><td>
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
  $bel=$infolist->isbelive;
  if($bdfrom=='1'){
	  ?>
	  <a class="btn btn-warning" href="#">无效</a>
	  <?php
  }elseif($bel=='1'){
	  ?>
	  <a class="btn btn-success" href="?msg=list&do=nobel&dm=<?php echo $infolist->dm; ?>&page=<?php echo $page; ?>">是</a>
	  <?php
		  }else{
		  ?>
	  <a class="btnbtn-danger" href="?msg=list&do=dobel&dm=<?php echo $infolist->dm; ?>&page=<?php echo $page; ?>">否</a>
			  <?php
		  }
?>
		  </td><td>
<?php
if($zt=='1'){
?>
<a class="btn btn-warning" href="?msg=list&do=stop&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">禁用</a> <a class="btn btn-danger" href="?msg=list&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">删除</a>
<?php
	  }elseif($zt=='2'){
?>
<a class="btn btn-success" href="?msg=list&do=run&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">启用</a> <a class="btn btn-danger" href="?msg=list&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">删除</a>
<?php
		  }else{
?>
 <a class="btn btn-danger" href="?msg=list&do=delx&id=<?php echo $infolist->id; ?>&page=<?php echo $page; ?>">删除</a>
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
<a href="?msg=list&page=<?php echo $page-1; ?>">上一页</a>
<a href="?msg=list&page=<?php echo $page+1; ?>">下一页</a>