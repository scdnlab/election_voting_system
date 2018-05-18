<?php
    include("includes/configure.php");

	check_ip();

    
    $current_date=get_date();
    $current_time=get_time();
    $election = new election();
    $election->find("status='Active' and date>='$current_date'","","date asc");
    $election->assign();
    
    //$student = new student();
    //$err=$student->voter_login_submit("candidate.php",$election->data['id']);



/****************start of writing xml file*************/
    if( $election->data['date'] == $current_date )
    {
        $str="<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<election>\n";
        $candidate_category=new candidate_category();
        $candidate_category->findAll("election_id=".$election->data['id'],"","`order`");
        for($i=0;$i<count($candidate_category->data);$i++)
        {
            $candidate = new candidate();
            $candidate->findAll("candidate_category_id=".$candidate_category->data[$i]['id']);
            for($j=0;$j<count($candidate->data);$j++)
            {
                $student = new student($candidate->data[$j]['student_id']);
                $student->read();
                $image_id=str_replace("|","",$student->data['image_id']);
                $image = new image($image_id);
                $image->read();
                $image_path=$image->data['thumb_path'];
                if($image_path=="")
                    $image_path="images/photo_no.gif";
                $str.="\t<election candidate_category=\"".$candidate_category->data[$i]['title']."\" candidate_id=\"".$candidate->data[$j]['id']."\" candidate_name=\"".$student->data['name']."\" candidate_reg_no=\"".$student->data['reg_no']."\" candidate_category_session=\"".$candidate_category->data[$i]['session']."\" candidate_category_section=\"".$candidate_category->data[$i]['section']."\" candidate_photo=\"".$image_path."\"/>\n";
            }
        }
        $filename = 'election.xml';
        $somecontent = $str;
        $prev_str=read_file($filename);
        $new_str=htmlspecialchars($str);
        if($prev_str!=$new_str)
            write_file($filename,$str);
    }
    
/****************end of writing xml file*************/

    assign("current_date",$current_date);
    assign("current_time",$current_time);
    Stemplate::display("voting_page1.tpl");
?>
