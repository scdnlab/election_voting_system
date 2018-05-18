<?php
    include("../includes/configure.php");
    check_admin_login();
    
    if($_REQUEST['id'])
    {
        $email=new email($_REQUEST['id']);
        $email->read();
        $email->assign();
        
        if($_REQUEST['update'])
        {
            $email->save($_REQUEST);
            redirect("email.php?id=$_REQUEST[id]");
            exit();
        }
    }
    else
    {
        $email = new email();
        $email->findAll("","","email_group_id");
        $email->assign();
    }

    display_admin_tpl();
?>





?>
