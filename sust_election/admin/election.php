<?php
    include("../includes/configure.php");
    check_admin_login();

    $election=new election();
    
    $election->paging("","","status,date desc,start_time desc");

    $election->assign();
    $election->status_update();
    $election->delete();

    display_admin_tpl();
?>

