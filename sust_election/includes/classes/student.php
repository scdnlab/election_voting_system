<?php
class student extends root
{
    function student($id="")
    {
        $this->name = "student";
        if($id) $this->id=$id;
    }
}
?>
