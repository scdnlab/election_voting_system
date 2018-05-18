<?php
    include("../includes/configure.php");
    check_admin_login();
    
	if($_REQUEST['submit'])
	{
		$ip_address = new ip_address();
		$ip_address->save($_REQUEST);
		redirect("ip_address.php"); exit;
	}
   
	$ip_address = new ip_address();
	$ip_address->findAll();
	$ip_address->assign();

	$ip_address->status_update();
	$ip_address->delete();
    
    display_admin_tpl();
?>
