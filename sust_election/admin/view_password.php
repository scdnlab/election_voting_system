<?php
    include("../includes/configure.php");
    check_admin_login();
    
   

    $students=new student();
    $students->findAll("session='$_REQUEST[session]' and section='$_REQUEST[section]'","","reg_no");    
    $students->assign();
    
    Stemplate::display("admin/view_password.tpl");
?>
