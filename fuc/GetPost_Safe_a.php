<?php
/*GeiLiCoin框架-GET&POST自动过滤函数A，请根据需要调用*/
//整型过滤函数 
function get_int($number) 
{ 
return intval($number); 
} 
//字符串型过滤函数 
function get_str($str) 
{ 
if(!get_magic_quotes_gpc()){ 
$str = htmlspecialchars($str); 
$str = str_replace( '/', "", $str);  
$str = str_replace("\\", "", $str);  
$str = str_replace(">", "", $str);  
$str = str_replace("css","'",$str);  
$str = str_replace("CSS","'",$str);
$str = str_replace("?","您输入的字符已被转化",$str);
$str = str_replace("and","and",$str); 
$str = str_replace("or","or",$str); 
return addslashes($str); 
} 
return $str; 
}
/* 过滤所有GET过来变量 */   
foreach ($_GET as $get_key=>$get_var)      
{      
if (is_numeric($get_var)) {      
  $get[strtolower($get_key)] = get_int($get_var);      
} else {      
  $get[strtolower($get_key)] = get_str($get_var);      
}      
}      

/* 过滤所有POST过来的变量 */     
foreach ($_POST as $post_key=>$post_var)      
{
if(!is_array($post_var)){
if (is_numeric($post_var)) {      
  $post[strtolower($post_key)] = get_int($post_var);      
} else {      
  $post[strtolower($post_key)] = get_str($post_var);      
}
}
}    