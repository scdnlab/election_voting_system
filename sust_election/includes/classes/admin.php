<?php
class admin extends root
{


    function admin($id="")
    {
        $this->name = "admin";
        if($id) $this->id=$id;
    }
    
    function admin_validation($var)
    {
        if($var['admin']['username']=="")
            $msg="Please enter your first name";
         elseif($this->check_user_exists($var['admin']['username']))
                    $msg="This username is already registered";
         elseif($var['admin']['password']=="")
                $msg="Please enter your  password";
        elseif($var['admin']['password']!=$var['r_password'])
                $msg="Password & Confirm Password mismatch. Please check again";
        elseif($var['admin']['email']=="")
                $msg="Please enter your valid email address";
        elseif(!check_email($var['admin']['email']))
                $msg="Invalid email address. Please provide a valid e-mail address";
        elseif($this->check_email_exists($var['admin']['email']))
                    $msg="This email is already registered";

        return $msg2;

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
        if($this->findCount("email='$email'"))
            return true;
        else
            return false;
    }
    function check_password_exists($password="")
    {
        if($this->findCount("password='$password' and id=$_SESSION[USER_ID]"))
            return true;
        else
            return false;
    }
}


function insert_get_menu($var="")
{
    $admin_menu = new admin_menu();
    $array=$admin_menu->findAll("","","sort asc");
    return $array;
}

function insert_count_submenu($var="")
{
    $menu_id=$var['menu_id'];
    $admin_submenu = new admin_submenu();
    $total=$admin_submenu->findCount("menu_id='$menu_id'");
    echo $total;
}

function insert_get_submenu($var="")
{
    $menu_id=$var['menu_id'];
    $admin_submenu = new admin_submenu();
    $array=$admin_submenu->findAll("menu_id='$menu_id'","","sort asc");
    return $array;
}

function insert_show_menu($var="")
{
    $menu_id=$var['menu_id'];
    $admin_menu = new admin_menu($menu_id);
    $admin_menu->read();
    $title=$admin_menu->data['title'];
    echo $title;
}

function insert_show_menu_url($var="")
{
    $menu_id=$var['menu_id'];
    $url=$var['url'];
    if(strstr($url,"?"))
        $url.="&menu_id=".$menu_id;
    else
        $url.="?menu_id=".$menu_id;
    echo $url;
}

function insert_show_sub_url($var="")
{
    $sub_id=$var['sub_id'];
    $url=$var['url'];
    if(strstr($url,"?"))
        $url.="&sub_id=".$sub_id;
    else
        $url.="?sub_id=".$sub_id;
    echo $url;
}


function insert_get_groupname($var="")
{
    if($var['id'])
    {
        $admin_group=new admin_group($var['id']);
        echo $admin_group->readField('title');
    }
    else
    {
        $admin_group=new admin_group();
        return $admin_group->findAll();
    }

}
function insert_configuration_group($var="")
{
        $configuration_group = new configuration_group();
        return $configuration_group->findAll("visible='Yes'");
}

function insert_session_menu_id($var="")
{
    $menu_id=$var['menu_id'];
    session_register("MENU_ID");
    $_SESSION['MENU_ID']=$menu_id;
}

function insert_session_sub_id($var="")
{
    $sub_id=$var['sub_id'];
    session_register("SUB_ID");
    $_SESSION['SUB_ID']=$sub_id;
}

function insert_get_notify($var)
{
    if(strstr($var['str'],"|".$var['val']."|"))
        echo "checked";
}

?>
