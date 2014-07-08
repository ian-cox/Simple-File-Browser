<?php 
require_once('../config.php');
?>
<!DOCTYPE html>
<html>

<?php
// Variables
$directory = "http://".$domain."/".$filefolder."/";
$file = $_GET['file'];
$ext = $_GET['ext'];
?>

<head>
  <meta charset="utf-8">
  <title><?php echo basename($file).'.'.$ext;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex">
  <meta property="og:title" content="<?php echo $file;?>">
  <link href="http://<?php echo $_SERVER['SERVER_NAME']?>/assets/css/screen.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body class="language-markup">
  <header>
    <div class="container">
    <strong><?php echo basename($file);?></strong>.<?php echo $ext;?>
    <!-- <ul class="menu"> 
      <li>
        <a href="<?php echo $file;?>.html#" class="trigger">Menu</a>
        <ul class="drop-down">
          <li><a href="<?php echo $directory.$file.'.'.$ext;?>">Direct Link</a></li>
          <li><a href="../<?php echo $file.$ext;?>" download="<?php echo $file;?>" title="<?php echo $file;?>">Download Link</a></li>
        </ul>
      </li>
    </ul>-->
    </div>
  </header>

  <section class="display-content container">
  <?php 
  // IF IMAGE
  if (in_array($ext, $image_ext)){ ?>
      <img src='<?php echo $directory.$file.'.'.$ext;?>'>
  <?php };


  if (in_array($ext, $font_ext)){ ?>
      <img src='<?php echo $directory.$file.'.'.$ext;?>'>
  <?php } ?>


    <?php 
  // IF TEXT
  if (in_array($ext, $text_ext)){ ?>
  <section class="wrapper">
    <pre class="language-css">
    <code class="language-css"> 
      <?php echo nl2br(htmlspecialchars(file_get_contents($directory.$file.'.'.$ext)));?>
    </code>
    </pre>     
  </section>
  <?php } ?>


  <?php 
  // IF ZIP
  if (in_array($ext, $archive_ext)){ ?>
  <section id="download" class="wrapper">
    <div class="file-type">
      <img src="../includes/thumb.php?width=600&amp;height=300&amp;image=/<?= $icon_other ?>">
    </div>
    <a href="<?php echo $directory.$file.'.'.$ext;?>" class="download button"><strong><?php echo $file;?></strong>.<?php echo $ext;?></a>
  </section>
  <?php } ?>


  <?php 
  // IF Video
  if (in_array($ext, $video_ext)){ ?>
    <section id="image" class="wrapper">
      <video src='<?php echo $directory.$file.'.'.$ext;?>' autoplay width="auto" controls>
        Sorry, your browser doesn't support embedded videos.
      </video>
      <a href="<?php echo $directory.$file.'.'.$ext;?>" class="download button">Download <strong><?php echo $file;?></strong>.<?php echo $ext;?></a>
    </section>
  <?php } ?>
  
    
  
  <?php // If TEXT: apply syntax highlighting JS
  if (in_array($ext, $text_ext)){ ?>
  <script src="http://<?php echo $domain ?>/assets/js/prism.js"></script>  
  <?php }?>
  </section>

</body>
</html>

