<?php
    /*========================================================================
    INCLUDE FUNCIONS
    ==========================================================================*/
    include(FUNCTIONS_DIR.'/general.php');
    include(FUNCTIONS_DIR.'/html_output.php');
    include(FUNCTIONS_DIR.'/smarty_function.php');

    /*========================================================================
    INCLUDE CLASSES
    ==========================================================================*/
    include(CLASSES_DIR.'/root.php');
    //$files = scandir(CLASSES_DIR);
    $dir    = CLASSES_DIR;
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $files[]=$file;
            }
        }
        closedir($handle);
    }    

    for($i=0;$i<count($files);$i++)
    {
        if(stristr($files[$i],".php") && $files[$i]!="mysmarty.class.php" && $files[$i]!="root.php")
        {
            include(CLASSES_DIR.'/'.$files[$i]);
        }
    }


?>
