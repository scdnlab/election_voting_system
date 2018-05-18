<?php
    include("../includes/configure.php");
    check_admin_login();

    $candidate=new candidate();
    
    $candidate->paging("","","election_id desc,candidate_category_id asc");

    $candidate->assign();
    $candidate->status_update();
    $candidate->delete();

    display_admin_tpl();
?>

