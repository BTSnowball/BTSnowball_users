<?php
/*
+BTSnowball_Users!
+BTSnowball.Org������ӭ���ļ���
+����Ʒ��ѭApache lincense V2.0��������BTSpl��������μ�lincense&txt�ļ���������ļ�
+Copyright (c) 2015 ��Ȩ��������Ӧ��������ߡ������˺�BTSnowball_Org���������Ա
+ Author list:������(Lin Youzhe)��
*/
include_once('run.php');
function BTSUDeleteUser($umsg,$mid){
	switch($mid){
	case '1':
		$username=addslashes($umsg);
	    DelUbU($username);
		return 'Success';
	break;
	case '2':
		$uid=intval($umsg);
	    DelUbUid($uid);
		return 'Success';
	break;
	case '3':
		$email=addslashes($umsg);
	    DelUbM($email);
		return 'Success';
	default:
		return 'Faild!';
	break;
	}
}
function BTSUUpdateUser($umsg,$ubz,$mid,$bid){
	if($mid==$bid){
		return 'Faild!';
	}
	if($mid!='6' && $bid=='4'){
		return 'Faild!';
	}
	if($mid!='5' && $bid=='5'){
		return 'Faild!';
	}
	switch($mid){
	case '1':
		$mstp='Iusername';
		$Iusername=addslashes($umsg);
	break;
	case '2':
		$mstp='Uusername';
		$Uusername=addslashes($umsg);
	break;
	case '3':
		$mstp='Iuid';
		$Iuid=intval($umsg);
	break;
	case '4':
		$mstp='email';
		$email=addslashes($umsg);
	break;
	case '5':
		$mstp='zt';
		$zt=intval($umsg);
	break;
	case '6':
		$mstp='mmzt';
		$mmzt=intval($umsg);
	break;
	default:
		return 'Faild!';
	break;
	}
	switch($bid){
	case '1':
		$bytp='Iusername';
	    $byg=addslashes($ubz);
	break;
	case '2':
		$bytp='Iuid';
	    $byg=addslashes($ubz);
	break;
	case '3':
		$bytp='email';
	    $byg=addslashes($ubz);
	break;
	case '4':
		$bytp='zt';
	    $byg=intval($ubz);
	break;
	case '5':
		$bytp='mmzt';
	    $byg=intval($ubz);
	break;
	/*
	case '6':
		$bytp='id';
	    $byg=addslashes($ubz);
	break;
	*/
	default:
		return 'Faild!';
	break;
	}
	UpUbX($mstp,$umsg,$bytp,$byg);
	return 'Success';
}
function BTSUUpFriendFz($friend,$msg,$mid,$fs,$from){
	$friend=addslashes($friend);
	$finfo=QCFriend($friend,$from);
	if($finfo['jg']=='1'){
		switch($mid){
			case '1':
		    $ffz=$finfo['fz'];
			$msg=intval($msg);
			if($fs=='1'){
				$ffz=$ffz+$msg;
	        }else{
				$ffz=$ffz-$ffz;
	        }
			UpFbX('fz',$ffz,'id',$finfo['id']);
			break;
			case '2':
		    $ffz=$finfo['rank'];
			$msg=intval($msg);
			if($fs=='1'){
				$ffz=$ffz+$msg;
	        }else{
				$ffz=$ffz-$ffz;
	        }
			UpFbX('rank',$ffz,'id',$finfo['id']);
			break;
			default:
				return 'Faild';
	        break;
		}
	}else{
		return 'Faild';
	}
	return 'Success';
}