<?php
    include("../includes/configure.php");
    check_admin_login();
        
    
    if($_REQUEST['action']=="generate")
    {
        $students=new student();
        $students->findAll();
        for($i=0;$i<count($students->data);$i++)
        {
            $student = new student($students->data[$i]['id']);
            $array['student']['password']=substr(md5(rand(1000000000,9999999999)),0,PASSWORD_LENGTH);
            $student->save($array);
        }
		redirect("password_setting.php");exit;
    }
	
	
    $configuration = new configuration(3);
    $configuration->read();
    $sessions=explode("|",$configuration->data['value']);
    assign("sessions",$sessions);		
      
    display_admin_tpl();
?>        
