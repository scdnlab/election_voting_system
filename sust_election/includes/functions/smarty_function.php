<?php
//*****************************************************general function*****************************************//
function insert_country_box($val=""){
    $coun="";
    $sel=$val['value'];
    $country=array("United States","Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antartica","Antigua and Barbuda","Argentina","Armenia","Aruba","Ascension Island","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Botswana","Bouvet Island","Brazil","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde Islands","Cayman Islands","Chad","Chile","China","Christmas Island","Colombia","Comoros","Cook Islands","Costa Rica","Cote d Ivoire","Croatia/Hrvatska","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","East Timor","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guernsey","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Ireland","Isle of Man","Israel","Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte Island", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn Island", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion Island", "Romania", "Russian Federation", "Rwanda", "Saint Helena", "Saint Lucia", "San Marino", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovak Republic", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "Spain", "Sri Lanka", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga Islands", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Kingdom", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Western Sahara", "Western Samoa", "Yemen", "Yugoslavia", "Zambia","Zimbabwe");
    for($i=0;$i<count($country);$i++)
    {
        if($sel==$country[$i])
                $coun .="<option value='$country[$i]' selected>$country[$i]</option>";
        else
                $coun .="<option value='$country[$i]'>$country[$i]</option>";
    }
return $coun;
}
function insert_birth_year_box($b_date="")
{
        $date=getdate();
        $temp=$date['year']-80;
        $str="<option></option>";
        $year=$b_date['date'];
        for($i=1;$i<=63;$i++)
        {
                if($year==$temp)
                        $str .="<option value=$temp selected>$temp</option>";
                else
                        $str .="<option value=$temp >$temp</option>";
                $temp++;
        }
        return $str;
}
function insert_timediff($var)
{
        $mytime = strtotime($var['time']);
        $now = time();
        

        $diff = $now-$mytime;
        $second = $diff%60;
        $minutes = ($diff/60)%60;
        $hours = ($diff/3600)%24;
        $days = ($diff/(3600*24))%30;
        $x = array();
        $x['days']=$days;
        $x['hours']=$hours;
        $x['minutes']=$minutes;
        $x['seconds']=$second;

        $out = "";
        if($days==1)
                $out .= "$days day ";
        elseif($days>1)
                $out .= "$days days ";
                
        if($hours==1)
                $out .= "$hours hour ";
        elseif($hours>1)
                $out .= "$hours hours ";
                
        if($minutes==1)
                $out .= "$minutes minute ";
        elseif($minutes>1)
                $out .= "$minutes minutes ";
                
          if($out=="")
                  $out .= "Less than a minute";               

        if($out!="")
            $out .= "ago";
            
        echo $out;
}

function insert_get_value($var)
{
    $id = $var['id'];
    $table_name = $var['table'];
    $field = $var['field'];
    $sql=$var['sql'];
    
    if($sql)
    {
        $obj_str = "\$obj = new $table_name($id);";
        @eval($obj_str);
        $obj->findAll_query($sql);
        if($var['assign'])
            return $obj->data[0][$field];
        else
            echo $obj->data[0][$field];        
    }
    else
    {
        $obj_str = "\$obj = new $table_name($id);";
        @eval($obj_str);
        $obj->read();
        if($var['assign'])
            return $obj->data[$field];
        else
            echo $obj->data[$field];
    }
}

function insert_get_option($var)
{
    $value = $var['value'];

    $table_name = $var['table'];
    $field = explode(",",$var['field']);

    $value_field = ($var['value_field'])?$var['value_field']:"id";
    $obj_str = "\$obj = new $table_name();";
    @eval($obj_str);

    if($var['sql'])
        $obj->findAll_query($var['sql']);
    else
        $obj->findAll($var['condition'],"",$var['order']);

    for($i = 0 ; $i < count($obj->data) ; $i++)
    {
        $selected = "";
        if($value == $obj->data[$i][$value_field])
            $selected = "selected";

        $show_field = $obj->data[$i][$field[0]];
        for($j = 1 ; $j < count($field) ; $j++)
            $show_field .= " ".$obj->data[$i][$field[$j]];

        echo "<option value = '" . $obj->data[$i][$value_field] . "'" . $selected .">" .$show_field. "</option>";
    }
}


function insert_encodeHTML($var)
{
                 $sHTML=$var['encode'];
                $sHTML=ereg_replace("&","&amp;",$sHTML);
                $sHTML=ereg_replace("<","&lt;",$sHTML);
                $sHTML=ereg_replace(">","&gt;",$sHTML);
                return $sHTML;
}


function insert_get_image($var)
{
    $id_string=$var['id'];
    return get_image($id_string);
}

//********************************************end general function***************************************//
//********************************************start project function***************************************//



//////////////////////voting system////////////////////////////////////


function insert_get_candidate($var)
{
    $category_id=$var['category_id'];
    $candidate=new candidate();
    $candidate->findAll("candidate_category_id=$category_id");
    return $candidate->data;    
}
/*
function insert_count_vote($var)
{
    $candidate_id=$var['candidate_id'];
    $vote_count = new vote_count();
    echo $vote_count->findCount("candidate_id=$candidate_id");
} */

function insert_count_vote($var)
{
    $candidate_id=$var['candidate_id'];
    $vote_count = new vote_count();
    echo $vote_count->findCount_query("select count(distinct(vote_count.student_id)) as total from vote_count,student where vote_count.student_id=student.id and student.status='Active' and vote_count.candidate_id=$candidate_id","total");
}



function insert_count_vote_percentage($var)
{
    $candidate_id=$var['candidate_id'];
    $candidate_category_id=$var['candidate_category_id'];
    $vote_count = new vote_count();
    //$candidate_vote=$vote_count->findCount("candidate_id=$candidate_id");
    $candidate_vote=$vote_count->findCount_query("select count(distinct(vote_count.student_id)) as total from vote_count,student where vote_count.student_id=student.id and student.status='Active' and vote_count.candidate_id=$candidate_id","total");


    $total_vote=$vote_count->findCount_query("select count(distinct(vote_count.student_id)) as total from vote_count,student,candidate where vote_count.student_id=student.id and student.status='Active' and vote_count.candidate_id=candidate.id and candidate.candidate_category_id='$candidate_category_id'","total");

    //$total_vote=$vote_count->findCount_query("select count(*) as total_vote from vote_count,candidate where vote_count.candidate_id=candidate.id and candidate.candidate_category_id='$candidate_category_id'","total_vote");
    if($total_vote>0)
    {
        $percentage=round(($candidate_vote/$total_vote)*100,2);
        echo $percentage." %";
    }
    else
        echo"0 %";
}

function insert_total_voter($var)
{
    $election_id=$var["election_id"];
    $session=$var['session'];
    $election = new election($election_id);
    $election->read();
    if($session)
    {
        $str=" session='".$session."'";
    }
    else
    {
        $session_array=explode("|",$election->data['session']);
        for($i=0;$i<count($session_array);$i++)
        {
            if($session_array[$i])
            {
                $str.=$or." session='".$session_array[$i]."' ";
                $or=" || ";
            }
        }
    }
    $student = new student();
    $total_voter=$student->findCount_query("select count(*) as total_voter from student where ".$str." and status='Active'","total_voter");
    echo $total_voter;
}


function insert_session_checked($var)
{

    $session=$var['session'];
    $value=$var['value'];
    if(strstr($value,"|".$session."|"))
        echo "checked";

}

function insert_count_total_vote($var)
{
	    $vote_count = new vote_count();
    
    $total=$vote_count->findCount_query("select count(distinct(vote_count.student_id)) as total from vote_count,student where vote_count.student_id=student.id and student.status='Active' and vote_count.election_id=$var[election_id]","total");
    echo $total;
}

function insert_load_total_vote($var)
{?>
	<script>
		 window.onload=count_vote(<?=$var['election_id']?>);
	</script>
		<?
}


?>
