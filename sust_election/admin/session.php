<?php
    include("../includes/configure.php");
    check_admin_login();
		
	$configuration = new configuration(3);
    $configuration->read();
	$configuration->assign();
    
	$student=new student();
	$student->findAll("","distinct session","session desc");
	
	if($_REQUEST['submit'])
	{
		$session_string=implode("|",$_REQUEST['session']);
		$array['configuration']['value']="|".$session_string."|";
		$configuration->save($array);
		redirect("session.php");
	}
	
	assign("sessions",$student->data);		
    display_admin_tpl();
?>		