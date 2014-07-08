<?php
require_once('../kirby/kirby.php');
require_once('../config.php');

// GET REQUEST
$delete = $_POST['path'];


// LOGIC
$cwd = dirname($delete);


if (isset($delete)){
    dir::remove('../'.$delete);
    f::remove('../'.$delete);
    $file = f::remove('../'.$delete);
    $dir = f::remove('../'.$delete);
    $extension = f::extension($delete);
    if($extension == null):;
    	$alert = 'Folder has been deleted.';
    else:;
    	$alert = 'File has been deleted.';
    endif;
}

// OUTPUT DIRECTORY AND ALERTS
include('../includes/directory.php'); 

?> 


<div class="alert">
    <h2>Alert:</h2>
    <?php echo $alert; ?>
</div>