<?php
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)
*/
/*-函数积木A(安全与安全操作组)*/
function intgl($var){
	$vare=intval($var);
	return $vare;
}
function html_safe_a($str){
    $html_string = array("&amp;", "&nbsp;", "'", '"', "<", ">", "\t", "\r");
    $html_clear = array("&", " ", "&#39;", "&quot;", "&lt;", "&gt;", "&nbsp; &nbsp; ", "");
    $js_string = array("/<script(.*)<\/script>/isU");
    $js_clear = array("");
    $frame_string = array("/<frame(.*)>/isU", "/<\/fram(.*)>/isU", "/<iframe(.*)>/isU", "/<\/ifram(.*)>/isU",);
    $frame_clear = array("", "", "", "");
    $style_string = array("/<style(.*)<\/style>/isU", "/<link(.*)>/isU", "/<\/link>/isU");
    $style_clear = array("", "", "");
    $str = trim($str);
    //过滤字符串
    $str = str_replace($html_string, $html_clear, $str);
    //过滤JS
    $str = preg_replace($js_string, $js_clear, $str);
    //过滤ifram
    $str = preg_replace($frame_string, $frame_clear, $str);
    //过滤style
    $str = preg_replace($style_string, $style_clear, $str);
    return $str;
}
/*著名的addslashes*/
function str_safe_a($string)      
{      
    if (!get_magic_quotes_gpc()) {      
return addslashes($string);      
    }      
    return $string;      
}
/** 
    * 安全过滤函数 
    * 
    * @param $string 
    * @return string 
*/ 
function str_safe_b($string) { 
    $string = str_replace('%20','',$string); 
    $string = str_replace('%27','',$string); 
    $string = str_replace('%2527','',$string); 
    $string = str_replace('*','',$string); 
    $string = str_replace('"','&quot;',$string); 
    $string = str_replace("'",'',$string); 
    $string = str_replace('"','',$string); 
    $string = str_replace(';','',$string); 
    $string = str_replace('<','&lt;',$string); 
    $string = str_replace('>','&gt;',$string); 
    $string = str_replace("{",'',$string); 
    $string = str_replace('}','',$string); 
    $string = str_replace('','',$string); 
    return $string; 
} 
/** 
    * 返回经addslashes处理过的字符串或数组 
    * @param $string 需要处理的字符串或数组 
    * @return mixed 
 */ 
function str_safe_c($string) { 
    if(!is_array($string)) return addslashes($string); 
    foreach($string as $key => $val) $string[$key] = new_addslashes($val); 
    return $string; 
} 
//对请求的字符串进行安全处理 
    /* 
    $safestep 
    0 为不处理， 
    1 为禁止不安全HTML内容(javascript等)， 
    2 完全禁止HTML内容，并替换部份不安全字符串（如：eval(、union、CONCAT(、--、等） 
 */ 
function str_safe_d($str, $safestep=-1){ 
    $safestep = ($safestep > -1) ? $safestep : 1; 
    if($safestep == 1){ 
    $str = preg_replace("#script:#i", "ｓｃｒｉｐｔ：", $str); 
    $str = preg_replace("#<[/]{0,1}(link|meta|ifr|fra|scr)[^>]*>#isU", '', $str); 
    $str = preg_replace("#[ ]{1,}#", ' ', $str); 
    return $str; 
    }else if($safestep == 2){ 
    $str = addslashes(htmlspecialchars(stripslashes($str))); 
    $str = preg_replace("#eval#i", 'ｅｖａｌ', $str); 
    $str = preg_replace("#union#i", 'ｕｎｉｏｎ', $str); 
    $str = preg_replace("#concat#i", 'ｃｏｎｃａｔ', $str); 
    $str = preg_replace("#--#", '－－', $str); 
    $str = preg_replace("#[ ]{1,}#", ' ', $str); 
    return $str; 
    }else{ 
    return $str; 
} 
} 
/*可能需要用到的严格的SQL内容检验*/
function str_safe_e($str){
	$str=str_safe_a($str);
	$str=str_safe_b($str);
	$str=str_safe_c($str);
	$str=str_safe_d($str,2);
	return $str;
}
/*可能用到的不严格但使用内容检验*/
function str_safe_f($str,$safestep=-1){
	$safestep = ($safestep > -1) ? $safestep : 1; 
    if($safestep == 2){ 
	$str=HTMLSpecialChars($str);
	}else if($safestep == 1){
	$str=Htmlentities($str);
	}
	$str=str_safe_a($str);
	return $str;
}
function str_safe_g($str){
	return strip_tags($str);//如果你想强制，请调用此函数，我给你内置了
}
function utf8_strcut($str, $start, $length=null) {   
 preg_match_all('/./us', $str, $match);   
 $chars = is_null($length)? array_slice($match[0], $start ) : array_slice($match[0], $start, $length);   
 
 unset($str);
 
 return implode('', $chars);   
}
function YZdm($str){
    $strlen = strlen($str);
	if($strlen<2 || $strlen>126)
	{
		return 'error';
	}
	$str=str_safe_e($str);
	return $str;
}
function dhtmlspecialchars($string) {
    if(is_array($string)) {
            foreach($string as $key => $val) {
                    $string[$key] = dhtmlspecialchars($val);
            }
    } else {
            $string = str_replace(array('&', '"', '<', '>'),
 array('&amp;', '&quot;', '&lt;', '&gt;'), $string);
            if(strpos($string, '&#') !== false) {
                    $string = preg_replace('/&((#(\d{3,5}|x[a-fA-F0-9]{4}));)/',
 '&\\1', $string);
            }
    }
    return $string;
}
function inject_check($sql_str)
{
   return preg_match('/select|insert|update|delete|\’|\`|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $sql_str);     // 进行关键字过滤
}
function fzr($str,$bm='UTF-8') {   //简单粗暴,但如果不在判定范围内必须指定。请各位开发者注意
$encode = mb_detect_encoding( $str, array('ASCII','UTF-8','GB2312','GBK','BIG5','JIS'));
if ( !$encode =='UTF-8' ){
if($encode!=FALSE){
$str = iconv('UTF-8',$encode,$str);
$str = iconv($encode,'UTF-8',$str);
}else{
	if($bm!='UTF-8'){
       $str = iconv('UTF-8',$bm,$str);
       $str = iconv($bm,'UTF-8',$str);
	}
}
}

$str = str_replace('0xbf27', '%BF%27', $str);
$str=str_safe_b($str);
$str=stripslashes($str);
$str=addslashes($str);
$str=mysql_real_escape_string($str);
$str=str_replace("_","\_",$str);
$str=str_replace("%","\%",$str);
return $str; 
}
function fzri($str,$bm='UTF-8') {   //简单粗暴,但如果不在判定范围内必须指定。请各位开发者注意
$encode = mb_detect_encoding( $str, array('ASCII','UTF-8','GB2312','GBK','BIG5','JIS'));
if ( !$encode =='UTF-8' ){
if($encode!=FALSE){
$str = iconv('UTF-8',$encode,$str);
$str = iconv($encode,'UTF-8',$str);
}else{
	if($bm!='UTF-8'){
       $str = iconv('UTF-8',$bm,$str);
       $str = iconv($bm,'UTF-8',$str);
	}
}
}

$str = str_replace('0xbf27', '%BF%27', $str);
$str=str_safe_b($str);
$str=stripslashes($str);
$str=addslashes($str);
$str=str_replace("_","\_",$str);
$str=str_replace("%","\%",$str);
return $str; 
}
function fzrb($str) { 
if (!get_magic_quotes_gpc()) { // 判断magic_quotes_gpc是否打开 
$str = addslashes($str); // 进行过滤 
} 
$str = str_replace('0xbf27', '%BF%27', $str); 
//$str = str_replace("_", "\_", $str); // 把 '_'过滤掉 
//$str = str_replace("%", "\%", $str); // 把 '%'过滤掉 我觉得没有人那么喜欢用% 不过不取消这行注释的话调用这个函数其实是多余了
return $str; 
} 

function post_check($post) { 
if (!get_magic_quotes_gpc()) { // 判断magic_quotes_gpc是否为打开 
$post = addslashes($post); // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤 
} 
$post = str_replace("_", "\_", $post); // 把 '_'过滤掉 
$post = str_replace("%", "\%", $post); // 把 '%'过滤掉 
$post = nl2br($post); // 回车转换 
$post = htmlspecialchars($post); // html标记转换 

return $post; 
}
function utf8str($str)
{   
$encode = mb_detect_encoding( $str, array('ASCII','UTF-8','GB2312','GBK'));
if ( !$encode =='UTF-8' ){
$str = iconv('UTF-8',$encode,$str);
}
return $str;
}
function gbk2str($str)
{   
$encode = mb_detect_encoding( $str, array('ASCII','UTF-8','GB2312','GBK'));
if ( !$encode =='GB2312' ){
$str = iconv('GB2312',$encode,$str);
}
return $str;
}
function GjieA($str,$strb,$e=0){
$n=strpos($str,$strb);//寻找位置
$str=substr($str,$n+$e);//去除前面
//if ($n) $str=substr($str,0,$n);//删除后面
return $str;
}
function GjieB($str,$strb,$e=0){
$n=strpos($str,$strb);//寻找位置
//$str=substr($str,$n+$e);//去除前面
if ($n) $str=substr($str,0,$n+$e);//删除后面
return $str;
}
function FenGe($str,$ws,$fg='|')
{
	$hello = explode($fg,$str);
	return $hello[$ws];
}
function FenGeS($str,$fg='|')
{
	$hello = explode($fg,$str);
	return $hello;
}
function addatostr($str1,$len,$stradd="")
{
 $i=0;
 $str2="";
 if($len%2==1)$len=$len+1;
 $len1=strlen($str1);
 for($i=0;$i < $len1/$len;$i++)
  {
    $str2.=substr($str1,$len*$i,$len).$stradd;
  $str1=substr($str1,$len*$i,$len1-$len*$i);
  }
 return $str2;
}
