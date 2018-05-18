<?php
        include("../includes/configure.php");
        check_admin_login();


        $configuration = new configuration();
        $configuration->findAll("visible='Yes'");
        $configuration->assign();


        if($_REQUEST['submit'])
        {
            for($i=0;$i<count($configuration->data);$i++)
            {
                $id=$configuration->data[$i]['id'];
                $key=$configuration->data[$i]['key'];
                $configuration_update = new configuration($id);
                if($_REQUEST[$key]=="")
                    $err="All fields are requered";

            }
            if($err=="")
            {
                for($i=0;$i<count($configuration->data);$i++)
                {
                        $id=$configuration->data[$i]['id'];
                        $key=$configuration->data[$i]['key'];
                        $configuration_update = new configuration($id);


                        if($_REQUEST[$key])
                        {
                                $_REQUEST['configuration']['value']=$_REQUEST[$key];
                                $configuration_update->save($_REQUEST);
                        }
                }
                redirect("setting.php?msg=yes");
            }
        }
        if($_REQUEST['msg'])
                $msg="<b>Configuration updated successfully</b>";

        display_admin_tpl();
?>

