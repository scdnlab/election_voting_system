<?php

class configuration_group extends root
{
    function configuration_group($id="")
    {
        $this->name = "configuration_group";
        if($id) $this->id=$id;
    }
    

}

?>
