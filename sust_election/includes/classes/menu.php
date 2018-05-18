<?php
class menu extends root
{
    function menu($id="")
    {
        $this->name = "menu";
        if($id) $this->id=$id;
    }
}
function insert_total_submenu($var)
{

    $menu=new menu();
    echo $menu->findCount("parent_id='$var[id]'");
    
}


?>
