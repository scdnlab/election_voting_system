<?php
        include("../includes/configure.php");
        check_admin_login();
        $menu=new menu();
        $menu->delete();
        if($_REQUEST['action']=="sub_menu")
        {
            $menu=new menu();
            $menu->findAll("parent_id=$_REQUEST[menu_id]","","sort asc");
            $menu->assign('admin_submenu');
            if(($_GET['a']=="up" or $_GET['a']=="down") and $_GET['pid']!="")
            {
                $q = mysql_query("select * from menu where id=$_REQUEST[pid]");
                $this_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from menu where sort > ".$this_pro['sort']." order by sort limit 1");
                $gt_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from menu where sort < ".$this_pro['sort']." order by sort desc limit 1");
                $lt_pro = mysql_fetch_array($q);

                if($_GET['a']=="up" and $lt_pro['sort']!="")
                {
                        mysql_query("update menu set sort=".$lt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update menu set sort=".$this_pro['sort']." where id=".$lt_pro['id']);
                }
                elseif($_GET['a']=="down" and $gt_pro['sort']!="")
                {
                        mysql_query("update menu set sort=".$gt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update menu set sort=".$this_pro['sort']." where id=".$gt_pro['id']);
                }
                redirect("menu.php?action=sub_menu&menu_id=".$_REQUEST['menu_id']);  exit();
            }
        }

        elseif($_REQUEST['action']=="add_menu")
        {
            $admin_menu = new menu($_REQUEST['menu_id']);
            $admin_menu->read();
            $admin_menu->assign('admin_menu');
            if($_REQUEST['menu_submit'])
            {
                $admin_menu->save($_REQUEST);
                redirect("menu.php");exit;
            }

        }
        elseif($_REQUEST['action']=="add_submenu")
        {
            $admin_submenu = new menu($_REQUEST['submenu_id']);
            $admin_submenu->read();
            $admin_submenu->assign('admin_submenu');
            if($_REQUEST['submenu_submit'])
            {
                $admin_submenu->save($_REQUEST);
                redirect("menu.php?action=sub_menu&menu_id=".$_REQUEST['menu']['parent_id']);
            }
        }
        else
        {
            $menu = new menu();
            $menu->findAll("parent_id=0","","sort asc");
            $menu->assign("admin_menu");
             if(($_GET['a']=="up" or $_GET['a']=="down") and $_GET['pid']!="")
            {
                $q = mysql_query("select * from menu where id=$_GET[pid]");
                $this_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from menu where sort > ".$this_pro['sort']." order by sort limit 1");
                $gt_pro = mysql_fetch_array($q);
                $q = mysql_query("select * from menu where sort < ".$this_pro['sort']." order by sort desc limit 1");
                $lt_pro = mysql_fetch_array($q);

                if($_GET['a']=="up" and $lt_pro['sort']!="")
                {
                        mysql_query("update menu set sort=".$lt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update menu set sort=".$this_pro['sort']." where id=".$lt_pro['id']);
                }
                elseif($_GET['a']=="down" and $gt_pro['sort']!="")
                {
                        mysql_query("update menu set sort=".$gt_pro['sort']." where id=".$this_pro['id']);
                        mysql_query("update menu set sort=".$this_pro['sort']." where id=".$gt_pro['id']);
                }
                redirect("menu.php");  exit();
            }
        }

    display_admin_tpl('hide_left_menu');
?>
