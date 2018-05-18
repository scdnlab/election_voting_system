<?php
function array2json($array)
{
    $data = array();
    while(list($key, $value)=each($array))
    {
        $data[] = '"'.$key.'": "'.$value.'"';
    }
    return '{ '.implode(', ', $data).' }';
}

function redirect($link)
{
        echo "<script language=Javascript>
                document.location.href='$link';
                </script>";
}

function pr($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function check_email($email)
{
        $email_regexp = "^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~]+\\.)+[a-zA-Z]{2,4}\$";
        return eregi($email_regexp, $email);
}

function check_length($str,$length)
{
    if(strlen($str)<$length)
            return 0;
    else
            return 1;
}

function check_user_login()
{
        if($_SESSION['USER_ID']=="")
        {
                session_register("RETURN");
                $_SESSION['RETURN']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
                redirect("login.php");
        }
}

//Check Admin Login
function check_admin_login()
{
		if($_SESSION['ADMIN_ID']=="")
        {
                session_register("RETURN");
                $_SESSION['RETURN']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
                redirect("index.php");
        }
}





function year_box($year="")
{
        $date=getdate();
        $temp=$date['year'];
        //$str="<option></option>";

        for($i=1;$i<=31;$i++)
        {
                if($year==$temp)
                        $str .="<option value=$temp selected>$temp</option>";
                else
                        $str .="<option value=$temp >$temp</option>";
                $temp++;
        }
        return $str;
}
function step_box($step="")
{

        $str="";
        for($i=1;$i<=20;$i++)
                {
                        if($i==$step)
                                $str.="<option value='$i' selected>$i</option>";
                        else
                                $str.="<option value='$i'>$i</option>";
                }
        return $str;
}
function birth_year_box($year="")
{
        $date=getdate();

        $date_start=$date['year']-80;
        $date_end=$date['year']-18;
        $str="<option></option>";

        for($i=$date_start;$i<=$date_end;$i++)
        {
                if($year==$i)
                        $str .="<option value=$i selected>$i</option>";
                else
                        $str .="<option value=$i >$i</option>";
        }
        return $str;
}

function hour_box($hour="")
{
        $date=getdate();
        if($hour=="")
            $hour=$date['hours'];
        $str="<option></option>";

        for($i=0;$i<=23;$i++)
        {
                if($i<10)
                    $i="0".$i;
                if($hour==$i)
                        $str .="<option value=$i selected>$i</option>";
                else
                        $str .="<option value=$i >$i</option>";
        }
        return $str;
}

function minute_box($minute="")
{
        $date=getdate();
        if($minute=="")
            $minute=$date['minutes'];
        $str="<option></option>";

        for($i=0;$i<=59;$i++)
        {
                if($i<10)
                    $i="0".$i;
                if($minute==$i)
                        $str .="<option value=$i selected>$i</option>";
                else
                        $str .="<option value=$i >$i</option>";
        }
        return $str;
}

function second_box($second="")
{
        $date=getdate();
        if($second=="")
            $second=$date['seconds'];
        $str="<option></option>";

        for($i=0;$i<=59;$i++)
        {
                if($i<10)
                    $i="0".$i;
                if($second==$i)
                        $str .="<option value=$i selected>$i</option>";
                else
                        $str .="<option value=$i >$i</option>";

        }
        return $str;
}

function age_box($age="")
{
        $str="";
        for($i=18;$i<=99;$i++)
                {
                        if($i==$age)
                                $str.="<option value='$i' selected>$i</option>";
                        else
                                $str.="<option value='$i'>$i</option>";
                }
        return $str;
}



function month_box($mon="")
{
        $month="<option></option>";
        $months=array("", "January","February","March","April","May","June","July","August","September","October","November","December");
        for($i=1;$i<=12;$i++)
        {
                $id=$i;
                if($i<10)
                    $i="0".$i;
                    
                if($i==$mon)
                        $month.="<option value='$i' selected>$months[$id]</option>";
                else
                        $month.="<option value='$i'>$months[$id]</option>";
        }
        return $month;
}

function month_box_num($mon="")
{

        $month="<option></option>";
        for($i=1;$i<=12;$i++)
                {
                        if($i==$mon)
                                $month.="<option value='$i' selected>$i</option>";
                        else
                                $month.="<option value='$i'>$i</option>";
                }
        return $month;
}


function day_box($date="")
{
        $day="<option></option>";
        for($i=1;$i<=31;$i++)
                {
                if($i<10)
                    $i="0".$i;
                        if($i==$date)
                                $day.="<option value='$i' selected>$i</option>";
                        else
                                $day.="<option value='$i'>$i</option>";
                }
        return $day;
}
function get_date_time()
{
        $date_time=date("Y-m-d h:i:s");
        return $date_time;
}

function get_date()
{
        $date=date("Y-m-d");
        return $date;
}

function get_time()
{
        $time=date("H:i:s");
        return $time;
}

function get_day()
{
        $day=date("l");
        return $day;
}
function get_ip()
{
    $ip_address=getenv('REMOTE_ADDR');
    return $ip_address;
}

function get_current_page()
{
        if($_SERVER['QUERY_STRING'])
            $str=$_SERVER['QUERY_STRING']."&";
        $var=$_SERVER['PHP_SELF']."?".$str;
        return $var;
}

function mailing($to,$name,$from,$subj,$body)
{
    global $SERVER_NAME;
    $subj=nl2br($subj);
    $body=nl2br($body);
    $recipient = $to;
    $headers = "From: " . "$name" . "<" . "$from" . ">\n";
    $headers .= "X-Sender: <" . "$to" . ">\n";
    $headers .= "Return-Path: <" . "$to" . ">\n";
    $headers .= "Error-To: <" . "$to" . ">\n";
    $headers .= "Content-Type: text/html\n";
    @mail("$recipient","$subj","$body","$headers");
}

function birth_date()
{
    $birth_date=$_REQUEST['byear']."-".$_REQUEST['bmonth']."-".$_REQUEST['bday'];
    return $birth_date;
}

function date_box($id="")
{
    $date=$_REQUEST['year'.$id]."-".$_REQUEST['month'.$id]."-".$_REQUEST['day'.$id];
    return $date;
}

function time_box($id="")
{
    $time=$_REQUEST['hour'.$id].":".$_REQUEST['minute'.$id].":".$_REQUEST['second'.$id];
    return $time;
}

function assign($var,$value)
{
        STemplate::assign($var,$value);
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
                    //echo $folder;
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
function get_image($id_string)
{
    $array=explode("|",$id_string);
    $path_array;
    $num=0;
    for($i=0;$i<count($array);$i++)
    {
        if($array[$i]!="")
        {
            $image=new image($array[$i]);
            $image->read();
            $path_array[$num]['path']=$image->data['thumb_path'];
            $path_array[$num]['thumb_path']=$image->data['thumb_path'];
            $num++;
        }
    }
    return $path_array;
}

 function photo_validation($VALS)
    {
    echo $VALS;
        $ext = strtolower(strrchr($VALS['name'], '.'));

        if($VALS['name']=="")
            $msg="Please select your photo to upload";
        elseif(strtolower($ext)!=".jpg" and strtolower($ext)!=".jpeg")
            $msg="Only .jpg file is supported";
        elseif($VALS['size']>1048576)
                        $msg = "Photo is not uploaded. File size must be less than 1MB";

        return $msg;
    }


function download($file){

    //First, see if the file exists
    if (!is_file($file)) { die("<b>404 File not found!</b>"); }

    //Gather relevent info about file
    $len = filesize($file);
    $filename = basename($file);
    $file_extension = strtolower(substr(strrchr($filename,"."),1));

    //This will set the Content-Type to the appropriate setting for the file
    switch( $file_extension ) {
      case "pdf": $ctype="application/pdf"; break;
      case "exe": $ctype="application/octet-stream"; break;
      case "zip": $ctype="application/zip"; break;
      case "doc": $ctype="application/msword"; break;
      case "xls": $ctype="application/vnd.ms-excel"; break;
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpg"; break;
      case "mp3": $ctype="audio/mpeg"; break;
      case "wav": $ctype="audio/x-wav"; break;
      case "mpeg":
      case "mpg":
      case "mpe": $ctype="video/mpeg"; break;
      case "mov": $ctype="video/quicktime"; break;
      case "avi": $ctype="video/x-msvideo"; break;

      //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
      case "php":
      case "htm":
      case "html":
      case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;

      default: $ctype="application/force-download";
    }

    //Begin writing headers
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public");
    header("Content-Description: File Transfer");

    //Use the switch-generated Content-Type
    header("Content-Type: $ctype");

    //Force the download
    $header="Content-Disposition: attachment; filename=".$filename.";";
    header($header );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$len);
    @readfile($file);
    exit;
    }
    
    
function read_file($filename)
{
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    $str=htmlspecialchars($contents);
    return $str;
}

function write_file($filename,$str)
{
    if (is_writable($filename))
    {
        if (!$handle = fopen($filename, 'w+'))
        {
            echo "Cannot open file ($filename)";
            exit;
        }
        if (fwrite($handle, $str) === FALSE)
        {
            echo "Cannot write to file ($filename)";
            exit;
        }
        fclose($handle);
        return true;
    }
    else
    {
        echo "The file $filename is not writable";
        exit;
    }
}


function check_ip()
{
	$ip_address = new ip_address();
	$ip_address->findAll("status='Active'");
	
	$value=false;
	for($i=0;$i<count($ip_address->data);$i++)
	{
		if($ip_address->data[$i]['ip_address']==get_ip())
		{
			$value=true;
			break;
		}
	}
	
	if($value==false)
	{
		echo "Invalid ip address (".get_ip().")";
		exit;
	}
}
    
    
    

?>
