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
  <?php if(in_array($ext, $font_ext)):?>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/assets/js/jquery.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_NAME']?>/assets/js/bigtext.js"></script>
  <?php endif; ?>

  <?php 
    //Build @ FONT FACE RULES
    if (in_array($ext, $font_ext)):  
        require_once('../includes/font_info.php');
        $ttf = new ycTIN_TTF();
        //open font file
        if ($ttf->open('../'.$cwd.'/'.$file.'.'.$ext)):
          //get name table
          $rs = $ttf->getNameTable();?>

          <style>
            @font-face {
            font-family: "fontPreview";
            src: url("<?php echo $directory.$file.'.'.$ext ?>") format("opentype"); 
            }
            .fontPreview{
            font-family: "fontPreview";
            }
          </style> 
          <?php 
        endif;
    endif; ?>
</head>



<body class="language-markup">
  <header>
    <div class="container">
    <?php if (in_array($ext, $font_ext)):
        echo $rs['3::1::1033'][1].' '.$rs['3::1::1033'][2];
    else:
    echo "<strong>". basename($file).".".$ext;
    endif;?>
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
  if (in_array($ext, $image_ext)):?>
      <img src='<?php echo $directory.$file.'.'.$ext;?>'>
  <?php endif;
  




  // IF FONT
  if (in_array($ext, $font_ext)):
      //display result?>
      <hr>
      <div id='bigtext' class='fontPreview'>
      <?php //echo $lorem[array_rand($lorem)]; ?>
        <p>Ancient Rock Formations</p>
        <p>Back in 1987</p>
        <p>Man found burried under 16th St.</p>
        <p>Automobile</p>
        <p>Cats & Dogs</p>
        <p>Population: 602</p>
        <p>Architecture and Brutalism</p>
      </div>
      <hr>
      <a href="<?php echo $directory.$file.'.'.$ext;?>" class="download button"><strong><?php echo $file;?></strong>.<?php echo $ext;?></a>
      <?php 
      endif;
  




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


<?php if(in_array($ext, $font_ext)):?>
<script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>  

<script type="text/javascript">
    $(document).ready(function(){
      $('body').addClass( "slowfadeInDown slowAnimated" );
        function applyBigtext(){
            $("#bigtext").bigtext({
                childSelector: '> p',  
            });
        }
        applyBigtext();
        //a bug in chrome forces us to reapply bigtext once the page has finished rendering
        setTimeout(function(){
            applyBigtext();
        }, 500);

    });
</script>

<?php endif; ?>
</body>
</html>

