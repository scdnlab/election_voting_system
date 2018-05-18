<?php
class election extends root
{
    function election($id="")
    {
        $this->name = "election";
        if($id) $this->id=$id;
    }
}
?>
