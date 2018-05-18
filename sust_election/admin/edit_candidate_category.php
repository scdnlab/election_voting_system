<?php
    include("../includes/configure.php");
    check_admin_login();

    $candidate_category=new candidate_category($_REQUEST['id']);
    $candidate_category->read();
    $candidate_category->assign();

    if($_REQUEST['add_candidate_category'])
    {
        $err="";

        if($_REQUEST['candidate_category']['election_id']=="")
            $err="Please select an election";
        elseif($_REQUEST['candidate_category']['title']=="")
            $err="Please enter title";
        elseif($_REQUEST['candidate_category']['order']=="")
            $err="Please enter order";
        elseif(!is_numeric($_REQUEST['candidate_category']['order']))
            $err="Please enter a valid order number";

        if($err=="")
        {

            $candidate_category->save($_REQUEST);
            redirect("candidate_category.php");
        }
    }    
    
	$configuration = new configuration(3);
    $configuration->read();
    $sessions=explode("|",$configuration->data['value']);
    assign("sessions",$sessions);

    display_admin_tpl();
?>

