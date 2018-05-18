<?php
class candidate extends root
{
    function candidate($id="")
    {
        $this->name = "candidate";
        if($id) $this->id=$id;
    }
}
?>
