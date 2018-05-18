<?php
class admin_submenu extends root
{
    function admin_submenu($id="")
    {
        $this->name = "admin_submenu";
        if($id) $this->id=$id;
    }
}


?>
