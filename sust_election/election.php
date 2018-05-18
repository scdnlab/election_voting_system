<?php
    include("includes/configure.php");
	check_ip();
	
    $current_date=get_date();
    $election = new election();
    $election->find("status='Active' and date>='$current_date'","","date asc");

    $election_id=$election->data['id'];
    if($_REQUEST['student_id']==$_SESSION['STUDENT_ID'])
    {
        $student_id=$_REQUEST['student_id'];

        for($i=0;$i<count($_REQUEST['candidate_id']);$i++)
        {
            if($_REQUEST['candidate_id'][$i]!="" && $_REQUEST['candidate_id'][$i]!=0)
			{
				$total=0;
	            $vote_count = new vote_count();
	            $total=$vote_count->findCount("student_id=".$student_id." and  candidate_id=".$_REQUEST['candidate_id'][$i]);
	            if($total==0)
	            {
	                $array['vote_count']['student_id']=$student_id;
	                $array['vote_count']['candidate_id']=$_REQUEST['candidate_id'][$i];
	                $array['vote_count']['election_id']=$election_id;
	                $array['vote_count']['count_time']=get_date_time();
	                $vote_count->save($array);
	            }
			}
        }
		$vote_count = new vote_count();
		$total=$vote_count->findCount("student_id=".$student_id);
		if($total==0)
		{
			$vote_count = new vote_count();
			$array['vote_count']['student_id']=$student_id;
			$array['vote_count']['candidate_id']=0;
			$array['vote_count']['election_id']=$election_id;
			$array['vote_count']['count_time']=get_date_time();
			$vote_count->save($array);
		}
		session_unregister("STUDENT_ID");
        echo "isValidLogin=1"; exit;
    }
    else
    {
        echo "isValidLogin=2";
        exit;
    }
?>
