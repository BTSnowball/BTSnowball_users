<?php  
/*
+BTSnowball_Users!
+BTSnowball.Org社区欢迎您的加入
+本作品遵循Apache lincense V2.0并补充有BTSpl。具体请参见lincense&txt文件夹下相关文件
+Copyright (c) 2015 版权所属于相应代码的作者、贡献人和BTSnowball_Org社区相关人员
+ Author list:林友哲(Lin Youzhe)、UnknowAuthor、
*/
/*
//1.qi启用gd库GD库提供了一系列用来处理图片的API，使用GD库可以处理图片，或者生成图片。   
// 在网站上GD库通常用来生成缩略图或者用来对图片加水印或者对网站数据生成报表。  
session_start();  
  
// 把GBK编码的字符串转换成UTF-8字符串，第一个参数之所以写GBK，是因为本php文件在主机中存储的编码是GBK编码  
// UTF-8编码浏览器普遍支持，通用性强，这里就转换成UTF-8  
$zma=rand(99,199);
		$zmb=rand(59,99);
		$zmc=$zma+$zmb;
$jyzf=rand(9999,19999999);
$str = iconv("GBK", "utf-8", $jyzf);  
if(!is_string($str) || !mb_check_encoding($str,"utf-8"))  
{  
    exit("不是字符串或者不是utf-8");  
}  
$zhongwenku_size;  
// 按UTF-8编码方式获取字符串的长度  
$zhongwenku_size = mb_strlen($str,"UTF-8");  
  
// 把上述字符导入数组中  
$zhongwenku = array();  
for( $i=0; $i<$zhongwenku_size; $i++)  
{  
    $zhongwenku[$i] = mb_substr($str, $i,1,"UTF-8");  
}  
  
$result = "";  
  
// 图片上要写入的四个字符  
for($i=0; $i<4; $i++)  
{  
    switch (rand(0, 1))  
    {  
        case 0:  
            $result.=$zhongwenku[rand(0, $zhongwenku_size-1)];  
            break;  
        case 1:  
            $result.=dechex(rand(0,15));  
            break;  
    }  
      
}  
  
$_SESSION["jyjg"] = $result;  
      
// 创建一个真彩图片 宽100，高30  
$img = imagecreatetruecolor(100, 30);  
  
// 分配背景颜色  
$bg = imagecolorallocate($img, 0, 0, 0);  
  
// 分配文字颜色  
$te = imagecolorallocate($img, 255,255,255);  
  
// 在图片上写字符串  
//imagestring($img, rand(3,8), rand(1,70), rand(1,10), $result, $te);  
  
// 在图片上根据载入字体可以写出特殊字体  
imagettftext($img, 13, rand(2, 9), 20 ,20, $te, "font/MSYH.ttf",$result);  
  
$_SESSION["check"] = $result;  
  
for($i=0; $i<3; $i++)  
{  
//  $t = imagecolorallocate($img, rand(0, 255),rand(0, 255),rand(0, 255));  
    // 画线  
    imageline($img, 0, rand(0, 20), rand(70,100), rand(0, 20), $te);      
}  
  
$t = imagecolorallocate($img, rand(0, 255),rand(0, 255),rand(0, 255));  
// 为图片添加噪点  
for($i=0; $i<200; $i++)  
{  
    imagesetpixel($img, rand(1, 100), rand(1, 30), $t);  
}  
// 发送http头信息 指定本次发送的是image中的jpeg  
header("Content-type: image/jpeg");  
// 输出jpeg图片至浏览器  
imagejpeg($img);  
*/
session_start();
header("Content-type: image/png");
$numa = mt_rand(0,9);//第一位数
$numb = mt_rand(1,9);//第二位数
$porm = "+-*";//方法字符串集合
$suijisc = substr($porm,rand(0,2),1);//随机方法
$bian = mt_rand(1,3);
if($bian==1){
 $askstr = "$numa$suijisc$numb=?";
 $result = "\$answer=$numa$suijisc$numb;";
 eval($result);
 $_SESSION["jyjg"] = $answer;  
}elseif($bian==2){
 $result = "\$answer=$numa$suijisc$numb;";
 eval($result);
    $askstr = $numa.$suijisc."_=".$answer;
 $_SESSION["jyjg"] = $numb;  
}elseif($bian==3){
 $result = "\$answer=$numa$suijisc$numb;";
 eval($result);
    $askstr = "_".$suijisc.$numb."=".$answer;
 $_SESSION["jyjg"] = $numa;  
}
$im = imagecreate(100,42);   
$black = imagecolorallocate($im, 0,0,0);     
$white = imagecolorallocate($im, 255,255,255);
$gray = imagecolorallocate($im, 200,200,200);
$red = imagecolorallocate($im, 255, 0, 0);
imagefill($im,0,0,$white);        
imagestring($im, 5, 10, 8, $askstr, $black);    
for($i=0;$i<70;$i++) {
 imagesetpixel($im, mt_rand(0, 58) , mt_rand(0, 28) , $black); 
 imagesetpixel($im, mt_rand(0, 58) , mt_rand(0, 28) , $red); 
 imagesetpixel($im, mt_rand(0, 58) , mt_rand(0, 28) , $gray); 
}
imagepng($im);
imagedestroy($im);
?>