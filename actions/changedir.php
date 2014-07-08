<?php
require_once('../kirby/kirby.php');
require_once('../config.php');

// GET REQUEST
$changedir = $_POST['dir'];

$new = dir::inspect($root.'/'.$cwd);


// LOGIC
$cwd = $changedir;


// OUTPUT DIRECTORY STRUCTURE
include('../includes/directory.php'); 


?> 



