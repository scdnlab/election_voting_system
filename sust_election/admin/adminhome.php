<?php
    include("../includes/configure.php");
    check_admin_login();

    $user=new user();
    
    $user->paging();
    $user->assign();
    $user->status_update();
    $user->delete();

    display_admin_tpl();
?>

