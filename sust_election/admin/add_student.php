<?php
    include("../includes/configure.php");
    check_admin_login();

    $student=new student();
    
    if($_REQUEST['submit'])
    {
        $err="";
        if($_REQUEST['student']['name']=="")
            $err="Please enter student name";
        elseif($_REQUEST['student']['reg_no']=="")
            $err="Please enter student registration number";
        elseif(!is_numeric($_REQUEST['student']['reg_no']))
            $err="Please enter a valid registration number";
        elseif(strlen($_REQUEST['student']['reg_no'])!=10)
            $err="Registration number must be 10 digit";
        elseif($student->findExist("reg_no=".$_REQUEST['student']['reg_no']))
            $err="Sorry this registration number is already existing";
        if($err=="")
        {
            if(!$_REQUEST['student']['session'])
            {
                $session_year=substr($_REQUEST['student']['reg_no'],0,4);
                $session_year2=$session_year+1;
                $_REQUEST['student']['session']=$session_year."-".$session_year2;
            }
            $_REQUEST['student']['password']=substr(md5(rand(1000000000,9999999999)),0,PASSWORD_LENGTH);
            $student->save($_REQUEST);
            @$student->image_upload();
            redirect("student.php");
        }
    }
    
    
    
    $configuration = new configuration(3);
    $configuration->read();
    $sessions=explode("|",$configuration->data['value']);
    assign("sessions",$sessions);


    display_admin_tpl();
?>

