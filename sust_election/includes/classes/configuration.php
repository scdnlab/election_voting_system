<?php

class configuration extends root
{
    function configuration($id="")
    {
        $this->name = "configuration";
        if($id) $this->id=$id;
    }

}

?>
