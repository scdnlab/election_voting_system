<?php
        include("includes/configure.php");
	
		check_ip();
		


        $election = new election();
        $election->findAll("status='Completed'","","date desc");
        $election->assign("elections");
        
        $theme=new theme();
        $theme->find("is_default='Yes'");
        $theme->assign();
        
        
        $election = new election();
        $election->find("status='Active'","","date asc");
        $election->assign();


        display_tpl();
?>
