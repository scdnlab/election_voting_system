<?php
        include("../includes/configure.php");



        $election = new election($_REQUEST['election_id']);
        $election->read();
        $election->assign();
        
        $candidate_category= new candidate_category();
        $candidate_category->findAll("election_id=".$_REQUEST['election_id'],"","`order`");
        $candidate_category->assign();
        
        
        $sessions=explode("|",$election->data['session']);
        assign("sessions",$sessions);
        
        

        display_admin_tpl();
?>
