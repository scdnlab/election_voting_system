<?php
        include("../includes/configure.php");
        check_admin_login();
        
        $admin = new admin($_SESSION['ADMIN_ID']);
        $admin->read();
        $admin->assign();
        


        if($_REQUEST['submit'])
        {
            if($_REQUEST['admin']['username']=="")
                $err="Please enter username";
            elseif($_REQUEST['admin']['password']=="")
                $err="Please enter password.";
                if($err=="")
                {
                    $admin->save($_REQUEST);
                    redirect("admin.php?msg=Successfully Updated");exit();
                }
        }


        display_admin_tpl();
?>
