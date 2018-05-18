<?php

class photo extends root
{
    var $user_id = 0;
    
    function photo($id="", $user_id=0)
    {
        $this->name = "photo";
        if($id) $this->id=$id;
        if($user_id) $this->user_id=$user_id;
    }
    
    
    
    /* example: $photo->validation($_FILES['photo']); */
    function validation($VALS)
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
    
    function upload($varName, $fileName, $folder, $img_width=0, $img_height=10000)
    {

        if(!is_dir($folder))
           mkdir($folder, 0777);
        chmod($folder, 0777);

        if (is_writable($folder)) {

            if (is_uploaded_file($_FILES[$varName]['tmp_name']))
            {
                if($img_width>0 or $img_height>0)
                {
                    $ext = strtolower(strrchr($fileName, '.'));
                    if($ext!=".jpg" and $ext!=".jpeg")
                        return false;

                    $file_url = $folder.$fileName;
                    copy($_FILES[$varName]['tmp_name'], $file_url);

                    $img = @imagecreatefromjpeg($file_url);
                    $size = @getimagesize($file_url);
                    $width= $size[0];
                    $height= $size[1];

                    if ($width>$img_width or $height>$img_height)
                    {
                        if($width>$img_width)
                        {
                            $percentage = $img_width / $width;
                            $width *= $percentage;
                            $height *= $percentage;
                        }

                        if($height>$img_height)
                        {
                            $percentage = $img_height / $height;
                            $width *= $percentage;
                            $height *= $percentage;
                        }

                        $img_r = @imagecreatetruecolor ($width, $height);
                        @imagecopyresampled($img_r, $img, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
                    }
                    else
                    {
                        $img_r = $img;
                    }

                    @unlink($file_url);
                    return @ImageJpeg($img_r, $file_url, 100);

                }
                else
                {
                    copy($_FILES[$varName]['tmp_name'], $folder.$fileName);
                    return true;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function remove($fileName)
    {
        if (unlink($fileName))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function photo_delete($photo_id, $from_file=true)
    {
        //echo "sdf".$photo_id;exit();
        $this->find("id='$photo_id'");
        $path=BASE_DIR."/".$this->data['path'];
        $thumb_path=BASE_DIR."/".$this->data['thumb_path'];
        if($from_file)
        {
            unlink($path);
            unlink($thumb_path);
        }
        $this->del($photo_id);
    }
    
    function photo_delete2($photo_id,$path,$thumb_path)
    {
        $path=BASE_DIR."/".$path;
        $thumb_path=BASE_DIR."/".$thumb_path;
        unlink($path);
        unlink($thumb_path);

        $this->del($photo_id);
    }
}

function insert_show_total_photo_size()
{
    $photo = new photo();
    $photo->findAll();
    $size=0;
    for($i=0;$i<count($photo->data);$i++)
    {
        $size += filesize(BASE_DIR."/".$photo->data[$i]['path']);
        $size += filesize(BASE_DIR."/".$photo->data[$i]['thumb_path']);
    }
    
    $total_size=round($size/1024,2);
    if($total_size<1024)
    {
        echo $total_size." KB";
    }
    elseif($total_size>=1024)
    {
        $total_size=round($total_size/1024,2);
        echo $total_size." MB";
    }
    elseif($total_size>=(1024*1024))
    {
        $total_size=round($total_size/(1024*1024),2);
        echo $total_size." GB";
    }
    elseif($total_size>=(1024*1024*1024))
    {
        $total_size=round($total_size/(1024*1024*1024),2);
        echo $total_size." TB";
    }
}
function insert_get_photo($var)
{

    $photo=new photo();
    $photo->find("user_id='$var[id]'");
    return $photo->data;
}

?>
