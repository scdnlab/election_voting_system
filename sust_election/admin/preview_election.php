<?php
        include("../includes/configure.php");



        $election = new election($_REQUEST['id']);
        $election->read();
        $election->assign();
        
        $candidate_category= new candidate_category();
        $candidate_category->findAll("election_id=".$_REQUEST['id'],"","`order`");
        $candidate_category->assign();
        
        

        display_admin_tpl();
?>
