<?php
class vote_count extends root
{
    function vote_count($id="")
    {
        $this->name = "vote_count";
        if($id) $this->id=$id;
    }
}
?>
