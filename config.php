<?php 
//==========================================//
//	      CHANGE THE VARIABLES BELOW 		//
//==========================================//

// Path to Content Folder from Root
$filefolder = 'files';

//Dribbble Username
$username = 'iancox';

// Text Output for Home Link in Breadcrumbs (Leave blank to only use house icon)
$homename = '';

// Thumbnail Image Cache Folder
$thumbfolder = 'thumbs';

// Hidden Files (begining with a period) are excluded automatically
// List of file types you wish to exclude (based on extension)
// Based on the example below file.hid and file.noo would both be excluded
$excludefiles = array("hid","noo");

//LOREM/DEMO TEXT FOR FONT PREVIEW
$lorem = array(
'Lorem Ipsum Dolor Sit Amet',
'Demo Text number one',
'Demo Text number two',
'Demo Text number three',
'Demo Text number four',
'Demo Text number five',
'Demo Text number six',
'Demo Text number seven',
'Demo Text number eight',
'Demo Text number nine',
'Demo Text number ten');





//==========================================//
//	      DON'T EDIT THE CODE BELOW			//
//==========================================//

//File Types
$image_thumb_ext = array("jpg", "jpeg", "gif", "png"); //Image files that can be resized with thumb.php
$image_ext = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff', 'svg'); //Image Files (ALL)
$font_ext = array('otf','ttf'); //Font Files
$text_ext = array('txt', 'rtf', 'md', 'html', 'htm','css', 'scss', 'js'); //Text Files
$video_ext = array('mov', 'ogg', 'wav', 'mp4', 'ogm', 'ogv', 'm4v'); //Video Files
$archive_ext = array('zip','tar','7z','rar','tgz','hqx','sit','sitx','iso','dmg','bz2');

//Built Root Path
//$root = server::get('document_root');
$root = $_SERVER['DOCUMENT_ROOT'];

// Set Domain
$domain = $_SERVER['SERVER_NAME'];

// Paths to Thumbnail Icons
$icon_folder = "assets/icons/folder.jpg";
$icon_other = "assets/icons/other.jpg";
$icon_zip = "assets/icons/zip.jpg";

// API CALLS & FUNCTIONS
 include('includes/dribbble.php');
 include('includes/font.php');

// Current Working Directory
if(!isset($cwd)):;
$cwd = $filefolder;
endif;

?>