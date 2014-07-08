<?php 
// Sample text to be rendered
$str = $_GET['type'];
// path to font file
$font = $_GET['font'];
// Size of the font 
$fontSize = 45; 
// Height of the image 
$height = 100; 
// Width of the image 
$width = 1270; 
$img_handle = imagecreate ($width, $height) or die ("Cannot Create image"); 
// Set the Background Color RGB 
$backColor = imagecolorallocate($img_handle, 255, 255, 255);
// Set the Text Color RGB 
$txtColor = imagecolorallocate($img_handle, 37, 39, 45);
$textbox = imagettfbbox($fontSize, 0, $font, $str) or die('Error in imagettfbbox function'); 
$x = 25;
$y = 50;
imagettftext($img_handle, $fontSize, 0, $x, $y, $txtColor, $font , $str) or die('Error in imagettftext function'); 
header('Content-Type: image/jpeg'); 
imagejpeg($img_handle, NULL, 100); 
imagedestroy($img_handle);
?>