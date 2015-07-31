<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
function ACurlKey($url){
$urlheadar=explode(':',$url);
if(!isset($urlheadar[1])){
	$url='http://'.$url;
	$urlhead='http';
}else{
	$urlhead=$urlheadar[0];
}
switch($urlhead){
	case 'http':
		$doc=1;
	break;
	case 'https':
		$doc=2;
	break;
	default:
		$doc=1;
	    $url='http://'.$url;
	break;
}
$curl = curl_init();
// 设置你需要抓取的URL
curl_setopt($curl, CURLOPT_URL, $url);
// 设置header
curl_setopt($curl, CURLOPT_HEADER, 0);
// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
if($doc==2){
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
}
// 运行cURL，请求网页
$data = curl_exec($curl);
// 关闭URL请求
curl_close($curl);
return trim($data);
}
function BCurlKey($url){
$urlheadar=explode(':',$url);
if(!isset($urlheadar[1])){
	$url='http://'.$url;
	$urlhead='http';
}else{
	$urlhead=$urlheadar[0];
}
switch($urlhead){
	case 'http':
		$doc=1;
	break;
	case 'https':
		$doc=2;
	break;
	default:
		$doc=1;
	    $url='http://'.$url;
	break;
}
$curl = curl_init();
// 设置你需要抓取的URL
curl_setopt($curl, CURLOPT_URL, $url);
// 设置header
curl_setopt($curl, CURLOPT_HEADER, 1);
// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
if($doc==2){
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
}
// 运行cURL，请求网页
$data = curl_exec($curl);
// 关闭URL请求
curl_close($curl);
// 获得的数据
$data = GjieA($data,'BTSuser:',8);
$data = Gjieb($data,':BTsuserover');
return trim($data);
}
function CCurlKey($url,$data){
$urlheadar=explode(':',$url);
if(!isset($urlheadar[1])){
	$url='http://'.$url;
	$urlhead='http';
}else{
	$urlhead=$urlheadar[0];
}
switch($urlhead){
	case 'http':
		$doc=1;
	break;
	case 'https':
		$doc=2;
	break;
	default:
		$doc=1;
	    $url='http://'.$url;
	break;
}
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
if($doc==2){
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
}
$returnc = curl_exec ( $ch );
curl_close ( $ch );
$returnc = GjieA($returnc,'BTSuser:',8);
$return = Gjieb($returnc,':BTsuserover');
return trim($return);
}
function btsMobil() {
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
		return true;
	}
	// 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset($_SERVER['HTTP_VIA'])) {
		// 找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	// 脑残法，判断手机发送的客户端标志,兼容性有待提高
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
	// 协议法，因为有可能不准确，放到最后判断
	if (isset($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}
function getdomain($url) { 
$host = strtolower ( $url ); 
if (strpos ( $host, '/' ) !== false) { 
$parse = @parse_url ( $host ); 
$host = $parse ['host']; 
} 
$topleveldomaindb = array ('com', 'edu', 'gov', 'int', 'mil', 'net', 'org', 'biz', 'info', 'pro', 'name', 'museum', 'coop', 'aero', 'xxx', 'idv', 'mobi', 'cc', 'me','in','io','gg','co' ); 
$str = ''; 
foreach ( $topleveldomaindb as $v ) { 
$str .= ($str ? '|' : '') . $v; 
} 

$matchstr = "[^\.]+\.(?:(" . $str . ")|\w{2}|((" . $str . ")\.\w{2}))$"; 
if (preg_match ( "/" . $matchstr . "/ies", $host, $matchs )) { 
$domain = $matchs ['0']; 
} else { 
$domain = $host; 
} 
return $domain; 
} 
function GetIP(){ 
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
$ip = getenv("HTTP_CLIENT_IP"); 
else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
$ip = getenv("HTTP_X_FORWARDED_FOR"); 
else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
$ip = getenv("REMOTE_ADDR"); 
else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
$ip = $_SERVER['REMOTE_ADDR']; 
else 
$ip = 'unknown'; 
return($ip); 
}
function btsuerror($msg,$dir=''){
	$tmod='BUError';
	$btsuerrormsg=$msg;
	include(trim($dir.'config/Web_config.php'));
	include(trim($dir.'intem.php'));
	exit;
}
function get_allfiles($path,&$files) {  
    if(is_dir($path)){  
        $dp = dir($path);  
        while ($file = $dp ->read()){  
            if($file !="." && $file !=".."){  
                get_allfiles($path."/".$file, $files);  
            }  
        }  
        $dp ->close();  
    }  
    if(is_file($path)){  
        $files[] =  $path;  
    }  
}      
function dirplus($dir){
	if(is_dir($dir)){
		$dirarr=scandir($dir);
		return $dirarr;
	}else{
		return false;
	}
}
function create_password($pw_length=8)   
{  
$randpwd = '';  
for ($i = 0; $i < $pw_length; $i++)  
{  
$randpwd .= chr(mt_rand(33, 126));  
}  
return $randpwd;  
}  