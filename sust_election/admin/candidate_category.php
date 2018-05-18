<?php
    include("../includes/configure.php");
    check_admin_login();

    $candidate_category=new candidate_category();
    
    $candidate_category->paging("","","election_id desc,`order` asc");

    $candidate_category->assign();
    $candidate_category->status_update();
    $candidate_category->delete();

    display_admin_tpl();
?>

