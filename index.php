<?php 
session_start(); // start session cookies
require("includes/Login.class.php"); // pull in file
$login = new Login; // create object login
$login->authorize(); // make user login

if($_SERVER['REQUEST_METHOD'] == "POST"){ 
  header('Location: index.php');
}




require_once('kirby/kirby.php');
require_once('config.php');
?>

<html>
<head>
  	<link rel="stylesheet" type="text/css" href="assets/css/screen.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  	<!-- Google CDN -->
  	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

  	<!-- FOR LOCAL DEV -->
	<script src="assets/js/jquery.min.js"></script>
</head>

<body class="fileviewer">
	
	<div id="directory">
		<?php include('includes/directory.php') ?>
	</div>

  	<script src="assets/js/custom.js"></script>
</body>
</html>