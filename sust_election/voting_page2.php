<?php
        include("includes/configure.php");
		check_ip();

        
        $current_date=get_date();
        $current_time=get_time();
        $election = new election();
        $election->find("status='Active' and date>='$current_date'","","date asc");
        $election->assign();
        
        $student = new student();
        $err=$student->voter_login_submit("candidate.php",$election->data['id']);




        assign("current_date",$current_date);
        assign("current_time",$current_time);
        display_tpl();
?>
