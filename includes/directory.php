<?php if (isset($changedir)||isset($delete)):;
    $path = $cwd.'/';
    else:;
    $path = $filefolder.'/';
    endif;
?>  

    

<header>
    <div class="container">
    <a href="<?= $dribbble['url'] ?>" class="user"><?= $dribbble['name'] ?></a>    
    <?php
    // BREAD CRUMBS
    $bread = explode("/", $path);?>
    <nav class='breadcrumbs'>
    <?php 
    $newpath = '';
    $crumbClass = "js-changeDirBackward crumb";
    if($cwd == $filefolder):
        $crumbClass = "crumb";
    endif;
    
    $i = 0;
    foreach($bread as $crumb):
        $newpath .= $crumb;
        if($crumb != ''):
            // FOR FIRST BREAD CRUMB (ROOT), CHANGE DISPLAY VALUE TO $homename (var specified in config.php)
            if ($i == 0):
                $crumb = $homename;
                $newpath = 'files';
            endif;

            if($i === count($bread)-2):
            $crumbClass = "crumb green";
            endif;?>

            <a class="<?php echo $crumbClass ?>" data-path="<?php echo $newpath ?>"><?php echo $crumb ?></a>
        
            <?php $i++;
        endif;
        $newpath .= '/';
    endforeach;?>

    </nav><!--CRUMBS-->
    </div><!-- Container-->
</header>
    


<div id="shamefull" class="spacer-hack"></div>




<div class="container blocks">

    <?php
        // READ DIR AND PRINT FILES
        $files = dir::read($root.'/'.$cwd);
        if(count($files)>0):; 
            $hidden = 0;
            foreach($files as $file):;
            
                //if $file does not start with a period and isnt an excluded file type (Excluded extension list in Config.php)
                if(substr($file, 0, 1) !== '.' && !in_array(f::extension($file),$excludefiles)):?>

                    <div class="block">
                    
                        <?php
                        $acwd = substr($cwd, strlen ($filefolder));
        
                        //if $file is an IMAGE
                        if(in_array(f::extension($file),$image_thumb_ext)):?>
                            <a href="<?php echo 'http://'.$domain.'/a'.$acwd.'/'.$file?>">
                                <img src="includes/thumb.php?width=300&amp;height=300&amp;cropratio=1:1&amp;image=/<?= $cwd.'/'.$file?>">
                                <span class="label"><?php echo $file ?></span>
                            </a>
        
                        <?php
                        //if $file is an FONT
                            elseif(in_array(f::extension($file),$font_ext)):?>
                            <a href="<?php echo 'http://'.$domain.'/a'.$acwd.'/'.$file?>">
                                <?php fontThumb($cwd.'/'.$file, $file, $thumbfolder);?>
                                <img src="<?php echo $thumbfolder.'/'.$file?>.png">
                                <span class="label"><?php echo $file ?></span>
                            </a>    
        
                        <?php 
                        //if $file is a FOLDER
                            elseif(f::extension($file)==null):?>
                            <a class="js-changeDirForward folder" data-path="<?php echo $path.$file ?>">
                                <img src="includes/thumb.php?width=300&amp;height=300&amp;cropratio=1:1&amp;image=/<?= $icon_folder ?>">
                                <span class="label"><?php echo $file ?></span>
                            </a>
                        <?php
                        //if $file is a FOLDER
                            elseif(in_array(f::extension($file),$archive_ext)):?>
                            <a href="<?php echo 'http://'.$domain.'/a'.$acwd.'/'.$file?>">
                                <img src="includes/thumb.php?width=300&amp;height=300&amp;cropratio=1:1&amp;image=/<?= $icon_zip ?>">
                                <span class="label"><?php echo $file ?></span>
                            </a>
                        <?php                     
                        //if $file is none of the above
                            else:?>
                            <a href="<?php echo 'http://'.$domain.'/a'.$acwd.'/'.$file?>">
                                <img src="includes/thumb.php?width=300&amp;height=300&amp;cropratio=1:1&amp;image=/<?= $icon_other ?>">
                                <span class="label"><?php echo $file ?></span>
                            </a>                        
                        <?php endif?>
                                

                        <?php //DELETE BUTTON ?>
                        <a class="delete js-deleteFile" data-path="<?php echo $path.$file ?>"></a>


                    </div><!-- block -->

                <?php
                else: $hidden++;
                endif?>
        
            <?php endforeach;

        endif?>


        <?php if(count($files)==$hidden):;?> 
            <div class="Alert">
            <h2>Alert:</h2>    
            <?php echo "This folder is empty"; 
            ?>
            </div>
        <?php
        endif;?>


</div><!-- container -->