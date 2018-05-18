<?php

class user extends root
{
    function user($id="")
    {
        $this->name = "user";
        if($id) $this->id=$id;
    }

    function user_validation($var)
    {
        if($var['user']['username']=="")
            $msg="Please enter username";
        elseif(($this->check_user_exists($var['user']['username'])))
            $msg="This user is already registered.Please choose another username.";
        elseif($var['user']['firstname']=="")
            $msg="Please enter your first name";
        elseif($var['user']['lastname']=="")
            $msg="Please enter your last name";
        elseif($var['user']['email']=="")
            $msg="Please enter your email address";
        elseif(!check_email($var['user']['email']))
                $msg="Invalid email address. Please provide a valid e-mail address";
        elseif(($this->check_email_exists($var['user']['email'])))
            $msg="This email address is already registered.Please choose another email address.";
        elseif($var['user']['email']!=$var['confirm_email'])
            $msg="Email and confirm email is mismatched";

        elseif($var['user']['password']=="")
                $msg="Please enter your  password";
        elseif(!$this->check_length($var['user']['password'],6))
                $msg="Password should contain at least 6 characters";
        elseif($var['user']['password']!=$var['confirm_password'])
                $msg="Password & Confirm Password mismatch. Please check again";            
        /*elseif($var['user']['address']=="")
            $msg="Please enter your address";
        elseif($var['user']['city']=="")
                $msg="Please enter your  city";
        elseif($var['user']['state']=="")
                $msg="Please enter your  state";
        elseif($var['user']['zip']=="")
                $msg="Please enter   zip code";*/
        elseif($var['user']['phone']=="")
                $msg="Please enter your  contact number";

        return $msg;
    }

    function update_validation($var)
    {
        if($var['user']['firstname']=="")
            $msg="Please enter your first name";
        elseif($var['user']['lastname']=="")
            $msg="Please enter your last name";
        elseif($var['user']['email']=="")
            $msg="Please enter your email address";
        elseif(!check_email($var['user']['email']))
                $msg="Invalid email address. Please provide a valid e-mail address";
        elseif($var['user']['email']!=$var['confirm_email'])
            $msg="Email and confirm email is mismatched";
        elseif(($this->check_email_exists($var['user']['email'])))
            $msg="This email address is already registered.Please choose another email address.";
        elseif($var['user']['address']=="")
            $msg="Please enter your address";
        elseif($var['user']['city']=="")
                $msg="Please enter your  city";
        elseif($var['user']['state']=="")
                $msg="Please enter your  state";
        elseif($var['user']['zip']=="")
                $msg="Please enter   zip code";
        elseif($var['user']['mobile']=="")
                $msg="Please enter your  contact number";

        return $msg;
    }

    function update_compare($var)
    {
       $email_string = '';
       $table_heading = "<table border = '1'><tr><td>Changed Fields</td><td>Previous</td><td>Current</td></tr>";
       $email_string .= ($this->data['firstname'] != $var['user']['firstname'])? "<tr><td>First Name: </td><td>$this->data[firstname]</td><td>$var[user][firstname]</td></tr>":"";
       $email_string .= ($this->data['lastname'] != $var['user']['lastname'])? "<tr><td>Last Name: </td><td>$this->data[lastname]</td><td>$var[user][lastname]</td></tr>":"";
       $email_string .= ($this->data['email'] != $var['user']['email'])? "<tr><td>Email: </td><td>$this->data[email]</td><td>$var[user][email]</td></tr>":"";
       $email_string .= ($this->data['address'] != $var['user']['address'])? "<tr><td>Address: </td><td>$this->data[address]</td><td>$var[user][address]</td></tr>":"";
       $email_string .= ($this->data['city'] != $var['user']['city'])? "<tr><td>City: </td><td>$this->data[city]</td><td>$var[user][city]</td></tr>":"";
       $email_string .= ($this->data['state'] != $var['user']['state'])? "<tr><td>State: </td><td>$this->data[state]</td><td>$var[user][state]</td></tr>":"";
       $email_string .= ($this->data['zip'] != $var['user']['zip'])? "<tr><td>Zip Code: </td><td>$this->data[zip]</td><td>$var[user][zip]</td></tr>":"";
       $email_string .= ($this->data['country'] != $var['user']['country'])? "<tr><td>Country: </td><td>$this->data[country]</td><td>$var[user][country]</td></tr>":"";
       $email_string .= ($this->data['birth_date'] != $var['user']['birth_date'])? "<tr><td>Date of birth: </td><td>$this->data[birth_date]</td><td>$var[user][birth_date]</td></tr>":"";
       $email_string .= ($this->data['phone'] != $var['user']['phone'])? "<tr><td>Phone: </td><td>$this->data[phone]</td><td>$var[user][phone]</td></tr>":"";
       $email_string .= ($this->data['fax'] != $var['user']['fax'])? "<tr><td>Fax: </td><td>$this->data[fax]</td><td>$var[user][fax]</td></tr>":"";
       $email_string .= ($this->data['mobile'] != $var['user']['mobile'])? "<tr><td>Cell/Mobile: </td><td>$this->data[mobile]</td><td>$var[user][mobile]</td></tr>":"";
       $email_string .= ($this->data['description'] != $var['user']['description'])? "<tr><td>Description: </td><td>$this->data[description]</td><td>$var[user][description]</td></tr>":"";
       $email_string .= ($this->data['company_name'] != $var['user']['company_name'])? "<tr><td>Company Name: </td><td>$this->data[company_name]</td><td>$var[user][company_name]</td></tr>":"";
       $email_string .= ($this->data['company_details'] != $var['user']['company_details'])? "<tr><td>Company Description: </td><td>$this->data[company_details]</td><td>$var[user][company_details]</td></tr>":"";
       $email_string .= ($this->data['website'] != $var['user']['website'])? "<tr><td>Website: </td><td>$this->data[website]</td><td>$var[user][website]</td></tr>":"";

       if($email_string)
            return ($table_heading .= $email_string);
       else
            return "";

    }


    function check_password($val)
    {
    
        if($this->findCount("id='$_SESSION[USER_ID]' and password=$val"))
            return 0;
        else
            return 1;
            
        
    }
    function check_user_exists($username="")
    {
        if($this->findCount("username='$username'"))
            return true;
        else
            return false;
    }
    function check_email_exists($email="")
    {
        if($this->id)
            return ($this->findCount("email='$email' and id!='".$this->id."'"))?true:false;
        else
            return ($this->findCount("email='$email'"))?true:false;
    }
    
    function check_password_exists($password="")
    {
        if($this->findCount("password='$password' and id=$_SESSION[USER_ID]"))
            return true;
        else
            return false;
    }
   


    function user_logout()
    {
        session_unregister("cart");
        session_unregister("unit");
        session_unregister("measurement_data");

    }

    function get_user_type($type_id)
    {
        $user_type=new user_type($type_id);
        $user_type->read();
        STemplate::assign("type",$user_type->data['title']);
    }
    function photo_upload()
    {
        /* Upload photo */
        $photo = new photo();
        $filename = mt_rand().".jpg";
        $folder = "/uploads/".$this->id."/";
        $width = MAX_IMAGE_WIDTH;
        $result = $photo->upload('photo', $filename, IMAGES_DIR.$folder, $width);
        if(!$result)
            $err = "?err=Your photo is not uploaded successfully";
        else
        {
            $data['photo'] = array('user_id'=>$this->id, 'path'=>"images".$folder.$filename);
            $photo->save($data);

            /* Upload thumbnail */
            $t_filename = $filename;
            $t_folder = "/uploads/".$this->id."/thumb/";
            $t_width = MAX_THUMB_WIDTH;
            $result = $photo->upload('photo', $t_filename, IMAGES_DIR.$t_folder, $t_width);
            if($result)
                $data['photo'] = array('thumb_path'=>"images".$t_folder.$t_filename);
            else
                $data['photo'] = array('thumb_path'=>"images".$folder.$filename);
            $photo->save($data, $photo->id);

           
        }
        return $err;
    }
    


}
function insert_get_user($var)
{
    $id=$var['id'];
    $user=new user($id);
    $user->read();
    return $user->data;


}
function insert_get_username($var)
{
    $id=$var['id'];
    $user=new user($id);
    $user->read();
    echo $user->data['username'];


}



?>
