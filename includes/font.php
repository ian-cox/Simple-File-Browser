<?php
function fontThumb($fontpath, $file, $thumbfolder){

####################### BEGIN USER EDITS #######################
$root = $_SERVER['DOCUMENT_ROOT'];
$fontthumb = $file;
$thumbpath = $root.'/'.$thumbfolder.'/';
$imagewidth = 300;
$imageheight = 300;
//$padding = $_GET['padding'];
//$fontsize = $_GET['size'];
$padding = 20;
$fontsize = 70;
$fontangle = "0";
$font = $root.'/'.$fontpath;
$text = "Ag";
$bghex = "f2eee6";
$texthex = "2d2f34";

$textred = 45;
$textgreen = 47;
$textblue = 52;

$bgred = 242;
$bggreen = 238;
$bgblue = 230;


######################## END USER EDITS ########################


### Create image
$im = imagecreate( $imagewidth, $imageheight );

### Declare image's background color
$bgcolor = imagecolorallocate($im, $bgred,$bggreen,$bgblue);

### Declare image's text color
$fontcolor = imagecolorallocate($im, $textred,$textgreen,$textblue);

### Get exact dimensions of text string
$box = @imageTTFBbox($fontsize,$fontangle,$font,$text);

### Get width of text from dimensions
$textwidth = abs($box[4] - $box[0]);

### Get height of text from dimensions
$textheight = abs($box[5] - $box[1]);

### Get x-coordinate of centered text horizontally using length of the image and length of the text
$xcord = ($imagewidth/2)-($textwidth/2)-2;

### Get y-coordinate of centered text vertically using height of the image and height of the text
$ycord = ($imageheight/2)+($textheight/2)-25;


### If text is longer than the image width - padding allows, then make font size smaller.
if($textwidth > $imagewidth){
	$sm = ((($imagewidth-($padding*2))*$fontsize)/$textwidth);
	$nbox = @imageTTFBbox($sm,$fontangle,$font,$text);
	$ntextwidth = abs($nbox[4] - $nbox[0]);
	$ntextheight = abs($nbox[5] - $nbox[1]);
	$xc = ($imagewidth/2)-($ntextwidth/2)-2;
	$yc = ($imageheight/2)+($ntextheight/2);
}

### Else, new variable = old variables (No change)
else{
	$sm = $fontsize;
	$yc = $ycord;
	$xc = $xcord;
}

### Declare completed image with colors, font, text, and text location

imagettftext ( $im, $sm, $fontangle, $xc, $yc, $fontcolor, $font, $text );

### Display completed image as PNG
imagepng($im, $thumbpath.$file.'.png');

### Close the image
imagedestroy($im);
}
?>