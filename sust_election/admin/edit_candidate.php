<?php
    include("../includes/configure.php");
    check_admin_login();

    $candidate=new candidate($_REQUEST['id']);
    $candidate->read();
    $candidate->assign();
    $student = new student;
    if($_REQUEST['add_candidate'])
    {
        $err="";

        if($_REQUEST['candidate']['election_id']=="")
            $err="Please select an election";
        elseif($_REQUEST['candidate']['candidate_category_id']=="")
            $err="Please select a candidate category";
        elseif($_REQUEST['reg_no']=="")
            $err="Please insert a registration number";
        elseif(!$student->findExist("reg_no=".$_REQUEST['reg_no']))
            $err="Sorry this registration number is not in the record";
        if($err=="")
        {

            $election=new election($_REQUEST['candidate']['election_id']);
            $election->read();

            $student->find("reg_no=".$_REQUEST['reg_no']);

            if(!strstr(ACTIVE_SESSION,"|".$student->data['session']."|"))
                    $err="Sorry this students session is now inactive";
            elseif(!strstr($election->data['session'],"|".$student->data['session']."|"))
                    $err="Sorry this students session is inactive for this election";
            elseif($candidate->findExist("student_id=".$student->data['id']." and election_id=".$_REQUEST['candidate']['election_id']." and id!=".$_REQUEST['id']))
                    $err="Sorry this student is already candidate for this election";
            elseif($student->data['status']=="Inactive")
                    $err="Sorry this students status is now inactive";

            if($err=="")
            {
                $_REQUEST['candidate']['student_id']=$student->data['id'];
                $candidate->save($_REQUEST);
                redirect("candidate.php");
            }
        }
    }
    
    


    display_admin_tpl();
?>

