<?php
        include("includes/configure.php");
		check_ip();
        if(!$_SESSION["STUDENT_ID"] || !$_SESSION["ELECTION_ID"])
            redirect("voting_page2.php");



        $election = new election($_SESSION["ELECTION_ID"]);
        $election->read();
        $election->assign();
        
        $candidate_category= new candidate_category();

		$executive_member=$candidate_category->findCount("session!=''");
		$executive_member_section=$candidate_category->findCount("section!=''");
		$executive_member_sql="";
		if($executive_member)
		{
			$student = new student($_SESSION["STUDENT_ID"]);
			$student->read();
			$student_session=$student->data['session'];
			$student_section=$student->data['section'];
			
			$executive_member_sql.=" session='$student_session' ";
			if($executive_member_section)
				$executive_member_sql.=" and section='$student_section' ";
			$executive_member_sql=" or (".$executive_member_sql.")";
		}
        $candidate_category->findAll("election_id=".$_SESSION["ELECTION_ID"]." and (session='' $executive_member_sql)","","`order`");
        $candidate_category->assign();
        
        
        if($_REQUEST['submit'])
        {
            $err="";
            if($err=="")
            {
                if(count($_REQUEST['candidate'])==0)
					$_REQUEST['candidate'][0]=0;
				for($i=0;$i<count($_REQUEST['candidate']);$i++)
                {
                    $vote_count = new vote_count();
                    $array['vote_count']['student_id']=$_SESSION["STUDENT_ID"];
                    $array['vote_count']['candidate_id']=$_REQUEST['candidate'][$i];
                    $array['vote_count']['election_id']=$_SESSION["ELECTION_ID"];
                    $array['vote_count']['count_time']=get_date_time();
                    $vote_count->save($array);
                }
                session_unregister("STUDENT_REG_NO");
                session_unregister("STUDENT_ID");
                session_unregister("ELECTION_ID");

                redirect("voting_page2.php?msg=Thanks for your vote.");
            }
        }
        
        assign("current_date",get_date());
        display_tpl();
?>
