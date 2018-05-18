<?php
    include("../includes/configure.php");
    check_admin_login();
        
        
        
    $theme=new theme();
    $theme->findAll("","","is_default desc");
    $theme->assign();
    
    
    if($_REQUEST['id'])
    {
        $theme=new theme();
        $theme->find("is_default='Yes'");
        $theme=new theme($theme->data['id']);
        $array['theme']['is_default']="No";
        $theme->save($array);
        
        $theme=new theme($_REQUEST['id']);
        $array['theme']['is_default']="Yes";
        $theme->save($array);
        redirect("theme.php");exit;
    }
        
        
    display_admin_tpl();
?>
