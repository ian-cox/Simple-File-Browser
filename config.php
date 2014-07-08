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






//==========================================//
//	      DON'T EDIT THE CODE BELOW			//
//==========================================//

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