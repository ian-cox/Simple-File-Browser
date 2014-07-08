<?php 
require_once('kirby/kirby.php');
require_once('config.php');
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/screen.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body id="fileviewer">
	
	<div id="directory">
		<?php include('includes/directory.php') ?>
	</div>

  <script src="assets/js/custom.js"></script>
</body>
</html>