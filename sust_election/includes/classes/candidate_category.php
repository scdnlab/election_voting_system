<?php
class candidate_category extends root
{
    function candidate_category($id="")
    {
        $this->name = "candidate_category";
        if($id) $this->id=$id;
    }
}
?>
