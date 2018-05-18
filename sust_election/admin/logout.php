<?php
    include("../includes/configure.php");
        

    $admin = new admin();
    $admin->logout();
    redirect("index.php");exit();



?>
