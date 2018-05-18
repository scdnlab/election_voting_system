<?php
    include("includes/configure.php");
	check_ip();

    if($_REQUEST['reg_no'] && $_REQUEST['password'])
    {
        $current_date=get_date();
        $election = new election();
        $election->find("status='Active' and date>='$current_date'","","date asc");
        $election_id=$election->data['id'];
        
        $reg_no=$_REQUEST['reg_no'];
        $password=$_REQUEST['password'];
        $student = new student();

        $err="";

		if(!$student->findCount("reg_no='$reg_no' and password='$password'"))
		{
			echo "isValidLogin=Invalid registration number or password"; exit;
		}
		else
		{
			$student->find("reg_no='$reg_no' and password='$password'");
			$vote_count=new vote_count();
			if(!strstr(ACTIVE_SESSION,"|".$student->data['session']."|"))
			{
				echo "isValidLogin=Sorry your session is now inactive"; exit;
			}
			elseif(!$election_id)
			{
				echo "isValidLogin=Sorry, the election is completed"; exit;
			}
			elseif(!strstr($election->data['session'],"|".$student->data['session']."|"))
			{
				echo "isValidLogin=Sorry your session is inactive for this election"; exit;
			}
			elseif($vote_count->findCount("student_id='".$student->data['id']."' and election_id='$election_id'"))
			{
				echo "isValidLogin=Sorry you have given your vote previously"; exit;
			}
			elseif($student->data['status']=="Inactive")
			{
				echo "isValidLogin=Sorry, your status is now inactive"; exit;
			}
		}
		session_register("STUDENT_ID");
		$_SESSION['STUDENT_ID']=$student->data['id'];
        echo "isValidLogin=".$student->data['id']."|".$student->data['session']."|".$student->data['section']; exit;
    }






?>
