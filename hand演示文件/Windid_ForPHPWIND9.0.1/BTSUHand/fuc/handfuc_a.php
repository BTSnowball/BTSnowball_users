<?php
function isEmail($email) {
if ((strpos($email, '..') !== false) or (!preg_match('/^(.+)@([^@]+)$/', $email, $matches))){
    return false;
}
$ejg=strstr($email, '.');
if(!$ejg || trim($ejg)=='.'){
	return false;
}
$localPart = $matches[1];
$hostname = $matches[2];
if ((strlen($localPart) > 64) || (strlen($hostname) > 255))
return false;

$atext = 'a-zA-Z0-9\x21\x23\x24\x25\x26\x27\x2a\x2b\x2d\x2f\x3d\x3f\x5e\x5f\x60\x7b\x7c\x7d\x7e';
if (preg_match('/^[' . $atext . ']+(\x2e+[' . $atext . ']+)*$/', $localPart)) {
return true;
}
$noWsCtl    = '\x01-\x08\x0b\x0c\x0e-\x1f\x7f';
$qtext      = $noWsCtl . '\x21\x23-\x5b\x5d-\x7e';
$ws         = '\x20\x09';
if (preg_match('/^\x22([' . $ws . $qtext . '])*[$ws]?\x22$/', $localPart)) {
return true;
}
return false;
}
function windidMsg($code) { 
  $msg = array( 
    '1'=>'操作成功', 
    '0'=>'操作失败', 
     
    '-1'=>'用户名为空', 
    '-2'=>'用户名长度错误', 
    '-3'=>'用户名含有非法字符', 
    '-4'=>'用户名含有禁用字符', 
    '-5'=>'用户名已经存在', 
    '-6'=>'邮箱为空', 
    '-7'=>'非法邮箱地址', 
    '-8'=>'邮箱不在白名单中', 
    '-9'=>'邮箱在黑名单中', 
    '-10'=>'邮箱地址已被注册', 
    '-11'=>'密码长度错误', 
    '-12'=>'密码含有非法字符', 
    '-13'=>'原密码错误', 
    '-14'=>'帐号不存在', 
    '-20'=>'两次输入的密码不一致', 
             
    '-30'=>'私信长度错误', 
         
    '-40'=>'学校为空', 
    '-42'=>'学校地区为空', 
    '-42'=>'学校类型为空', 
   
     '-80'=>'上传失败', 
     '-81'=>'上传类型错误', 
     '-82'=>'上传文件太小', 
     '-83'=>'上传文件太大', 
     '-84'=>'上传文件错误', 
     
      '-90'=>'连接超时', 
      '-91'=>'类名错误', 
      '-92'=>'方法错误', 
      '-93'=>'服务器错误',       
    ); 
    return isset($msg[$code]) ? $msg[$code] : $code; 
}
function showMsg($message = 'success') {
    echo $message;
    exit();
}