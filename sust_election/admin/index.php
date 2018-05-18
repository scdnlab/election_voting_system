<?php
        include("../includes/configure.php");

        $admin = new admin();
        $err=$admin->login_submit("setting.php?menu_id=1");


        display_admin_tpl(hide_top_menu);
?>
