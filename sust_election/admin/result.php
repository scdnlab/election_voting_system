<?php
        include("../includes/configure.php");



        if($_REQUEST['delete_vote'])
		{
			$vote_count = new vote_count();
			$vote_count->delete("election_id=".$_REQUEST['delete_vote']);
			redirect("result.php?id=".$_REQUEST['delete_vote']);exit;
		}
		
		$election = new election($_REQUEST['id']);
        $election->read();
        $election->assign();
        
        $candidate_category= new candidate_category();
        $candidate_category->findAll("election_id=".$_REQUEST['id'],"","`order`");
        $candidate_category->assign();
        
        

        display_admin_tpl();
?>
