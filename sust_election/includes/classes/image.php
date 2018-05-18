<?php

class image extends root
{


    function image($id="")
    {
        $this->name = "image";
        if($id) $this->id=$id;
    }
     function image_validation($VALS)
    {
        $ext = strtolower(strrchr($VALS['name'], '.'));

        if($VALS['name']=="")
            $msg="Please select your photo to upload";
        elseif(strtolower($ext)!=".jpg" and strtolower($ext)!=".jpeg")
            $msg="Only .jpg file is supported";
        elseif($VALS['size']>1048576)
                $msg = "Photo is not uploaded. File size must be less than 1MB";

        return $msg;
    }
    



}



?>
