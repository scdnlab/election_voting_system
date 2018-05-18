<?php
    include("../includes/configure.php");
    check_admin_login();

    $election=new election();
    
    $configuration = new configuration(3);
    $configuration->read();    
    $sessions=explode("|",$configuration->data['value']);
    assign("sessions",$sessions);
    
    if($_REQUEST['submit'])
    {
        $err="";
        if($_REQUEST['election']['title']=="")
            $err="Please enter election title";
        elseif(count($_REQUEST['session'])<=0)
            $err="Please select sessions";
        if($err=="")
        {
            $session_string=implode("|",$_REQUEST['session']);
            $_REQUEST['election']['session']="|".$session_string."|";
            $_REQUEST['election']['date'] = date_box();
            //$_REQUEST['election']['start_time'] = time_box(1);
            //$_REQUEST['election']['end_time'] = time_box(2);
            $election->save($_REQUEST);
            redirect("election.php");
        }
    }


    display_admin_tpl();
?>

