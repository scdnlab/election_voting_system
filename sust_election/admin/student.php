<?php
    include("../includes/configure.php");
    check_admin_login();

    $student=new student();
    
    $student->paging("","","reg_no desc");
    //pr($student->data);exit;
    $student->assign();
    $student->status_update();
    $student->delete();
	
	
	
	
    $configuration = new configuration(3);
    $configuration->read();
    $sessions=explode("|",$configuration->data['value']);
    assign("sessions",$sessions);	

    display_admin_tpl();
?>

