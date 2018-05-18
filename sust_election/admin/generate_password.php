<?php
    include("../includes/configure.php");
    check_admin_login();
    
    $election = new election($election_id);
    $election->read();
    $election->assign();
    
    if($_REQUEST['action']=="generate")
    {
        $students=new student();
        $students->findAll("status='Active' and session='$_REQUEST[session]'");
        for($i=0;$i<count($students->data);$i++)
        {
            $student = new student($students->data[$i]['id']);
            $array['student']['password']=substr(md5(rand(1000000000,9999999999)),0,PASSWORD_LENGTH);
            $student->save($array);
        }
    }
    $students=new student();
    $students->findAll("status='Active' and session='$_REQUEST[session]'","","reg_no");    
    $students->assign();
    
    Stemplate::display("admin/generate_password.tpl");
?>
