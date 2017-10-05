<?php
session_start();
$text=randomstr(6);
$_SESSION['captcha_text']=md5(strtolower($text));
$captcha=imagecreate(200,100);
imagecolorallocate($captcha,0,0,0);
$gray=imagecolorallocate($captcha,128,128,128);
for($i=0;$i<10;$i++)
{
imageline($captcha,rand(0,10)*20,0,rand(0,10)*20,100,$gray);
imageline($captcha,0,rand(0,10)*10,200,rand(0,10)*10,$gray);
}
for($i=0;$i<strlen($text);$i++)
{
$randcolors = imagecolorallocate($captcha,rand(100,255),rand(200,255),rand(200,255));
imagettftext($captcha,30,rand(-30,30),10+30*$i,rand(40,70),$randcolors,"arial.ttf",$text[$i]);
}
header ("Content-type: image/png");
imagepng($captcha);
imagedestroy($captcha);

function randomstr($len)
{
	$string = "";
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	for($i=0;$i<$len;$i++)
	$string.=substr($chars,rand()%strlen($chars),1);
	return $string;
}
?>