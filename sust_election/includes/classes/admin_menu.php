<?php
class admin_menu extends root
{
    function admin_menu($id="")
    {
        $this->name = "admin_menu";
        if($id) $this->id=$id;
    }
}


?>
