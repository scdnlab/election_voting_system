<?php
        include("../includes/configure.php");
        check_admin_login();
        if($_REQUEST['action']=="add_menu")
        {
            $admin_menu = new admin_menu($_REQUEST['menu_id']);
            $admin_menu->read();
            $admin_menu->assign();
            if($_REQUEST['menu_submit'])
            {
                $_REQUEST['admin_menu']['sort']=$admin_menu->findMax("","sort")+1;     
                $admin_menu->save($_REQUEST);
                redirect("menu_builder.php");exit;
            }
            
        }
        elseif($_REQUEST['action']=="sub_menu")
        {
            $admin_submenu = new admin_submenu();
            if($_REQUEST['delete'])
            {
                $admin_submenu->del($_REQUEST['delete']);
                redirect("menu_builder.php?action=sub_menu&menu_id=$_REQUEST[menu_id]");exit;
            }
            $admin_submenu->findAll("menu_id='$_REQUEST[menu_id]'","","sort asc");
            $admin_submenu->assign();
        if(($_GET['a']=="up" or $_GET['a']=="down") and $_GET['pid']!="")
        {
                $q = mysql_query("select * from admin_submenu where id=$_GET[pid]");
                $this_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from admin_submenu where sort > ".$this_pro['sort']." order by sort limit 1");
                $gt_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from admin_submenu where sort < ".$this_pro['sort']." order by sort desc limit 1");
                $lt_pro = mysql_fetch_array($q);

                if($_GET['a']=="up" and $lt_pro['sort']!="")
                {
                        mysql_query("update admin_submenu set sort=".$lt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update admin_submenu set sort=".$this_pro['sort']." where id=".$lt_pro['id']);
                }
                elseif($_GET['a']=="down" and $gt_pro['sort']!="")
                {
                        mysql_query("update admin_submenu set sort=".$gt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update admin_submenu set sort=".$this_pro['sort']." where id=".$gt_pro['id']);
                }
                redirect("menu_builder.php?action=sub_menu&menu_id=".$_REQUEST['menu_id']);  exit();      
        }
            
        }
        elseif($_REQUEST['action']=="add_submenu")
        {
            $admin_submenu = new admin_submenu($_REQUEST['submenu_id']);
            $admin_submenu->read();
            $admin_submenu->assign();
            if($_REQUEST['submenu_submit'])
            {
                $_REQUEST['admin_submenu']['sort']=$admin_submenu->findMax("menu_id='".$_REQUEST['admin_submenu']['menu_id']."'","sort")+1;                 
                $admin_submenu->save($_REQUEST);
                //echo $admin_submenu->sql;exit;
                redirect("menu_builder.php?action=sub_menu&menu_id=".$_REQUEST['admin_submenu']['menu_id']);
            }
        }
        else
        {
            $admin_menu = new admin_menu();
            $admin_submenu = new admin_submenu();
            if($_REQUEST['delete'])
            {
                $admin_submenu->delete("menu_id='$_REQUEST[delete]'");
                $admin_menu->del($_REQUEST['delete']);
                redirect("menu_builder.php");exit;
            }
            $admin_menu->findAll("","","sort asc");
            $admin_menu->assign();
            
        if(($_GET['a']=="up" or $_GET['a']=="down") and $_GET['pid']!="")
        {
                $q = mysql_query("select * from admin_menu where id=$_GET[pid]");
                $this_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from admin_menu where sort > ".$this_pro['sort']." order by sort limit 1");
                $gt_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from admin_menu where sort < ".$this_pro['sort']." order by sort desc limit 1");
                $lt_pro = mysql_fetch_array($q);

                if($_GET['a']=="up" and $lt_pro['sort']!="")
                {
                        mysql_query("update admin_menu set sort=".$lt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update admin_menu set sort=".$this_pro['sort']." where id=".$lt_pro['id']);
                }
                elseif($_GET['a']=="down" and $gt_pro['sort']!="")
                {
                        mysql_query("update admin_menu set sort=".$gt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update admin_menu set sort=".$this_pro['sort']." where id=".$gt_pro['id']);
                }
                redirect("menu_builder.php");  exit();      
        }
                    
        }
        
        

        display_admin_tpl('hide_left_menu');
?>
