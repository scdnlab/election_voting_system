<?php

/* return tpl file name of the current php file */
function get_tpl()
{
    return str_replace(".php", ".tpl", basename($_SERVER['PHP_SELF']));
}


/* display smarty template file with header & footer */
function display_tpl($header_text="", $filename="")
{
    global $err, $msg;

    if($err=="")
        $err = $_REQUEST['err'];
    if($msg=="")
        $msg = $_REQUEST['msg'];
    STemplate::assign('err',$err);
    STemplate::assign('msg',$msg);
        
        STemplate::assign('HEADER_TEXT', ($header_text)?$header_text:HEADER_TEXT);

    STemplate::display("header.tpl");
    STemplate::display(($filename)?$filename:get_tpl());
    STemplate::display("footer.tpl");
}

/* display smarty template admin file with header & footer */
function display_admin_tpl($top_column="")
{
    global $err, $msg;

    if($err=="")
        $err = $_REQUEST['err'];
    if($msg=="")
        $msg = $_REQUEST['msg'];

    STemplate::assign('err',$err);
    STemplate::assign('msg',$msg);
    STemplate::assign('top_column',$top_column);
    STemplate::display("admin/header.tpl");
    STemplate::display("admin/".get_tpl());
    STemplate::display("admin/footer.tpl");
}


function insert_search_textbox($var)
{
    global $paging_table_name;
    $table=$var['table'];
    $field=$var['field'];
    $condition=$var['condition'];
    $name="paging[".$table.".".$field."]";
    $size=$var['size'];
    
    $obj_str = "\$obj = new $table();";
    @eval($obj_str);
    
    if($paging_table_name!=$table)
        $obj_array=$obj->findAll_query("select distinct ".$table.".".$field." from ".$table.",".$paging_table_name." where ".$table.".id=".$paging_table_name.".".$table."_id order by ".$table.".".$field."");

    else
        $obj_array=$obj->findAll($condition,"distinct ".$field,$field);

    $value=$_REQUEST['paging_'.$table.'_'.$field];
    
    for($i=0;$i<count($obj_array);$i++)
    {
        $array[]="'".$obj_array[$i][$field]."'";
    }
    $data_string=implode(",",$array);
    echo"
    <input id='$field' type='text'  size='$size' name='$name' value='".$value."'>
    <div id='".$field."update' style='display:none;border:1px solid black;background-color:white;overflow:auto;'></div>
    <script type='text/javascript' language='javascript'>
        value_array=new Array(".$data_string.");
        new Autocompleter.Local('$field','".$field."update',value_array, { tokens: new Array(',','\\n'), fullSearch: true, partialSearch: true });
    </script>";
}



function insert_sortable($var)
{
    echo "<div id='start' style='display:block'>
        <a href=\"#\" onclick=\"start_sort('thelist');return false;\">Update sort</a>
        </div>
        <div id='end' style='display:none'>
        <a href=\"#\" onclick=\"save_sort(Sortable.serialize('thelist'));return false;\">Save</a>
        </div>
        ";


}



//function submit_button($button_name, $title, $url, $param)
function insert_submit_button($var)
{
        echo "
                <table width='85' cellpadding='0' cellspacing='0'>
                <tr>
                        <td height='25' style=\"background: url('images/button.gif') no-repeat;\" align='center'><a href='$var[url]' $var[param] class='g'><b>$var[title]</b></a></td>
                </tr>
                </table>
        ";
}
function insert_sort_image($var)
{
    $field=$var['field'];
    $static_order=$var['static_order'];
        $page_title="";
        if($var['page_title'])
                                $page_title="_".strtoupper($var['page_title']);
    if($static_order!="")
        $static_str="static_order=".$static_order."&";
    $page_name=$_SESSION['INITIAL_PAGE'.$page_title];
    echo " <a href='".$page_name.$static_str."sort=$field&order=asc$_SESSION[RETURN_VALUE]'><img src='".BASE_URL."/admin/images/asc.png' align='absbottom' border='0' width='13'></a> <a href='".$page_name.$static_str."sort=$field&order=desc$_SESSION[RETURN_VALUE]'><img src='".BASE_URL."/admin/images/desc.png' align='absbottom' border='0' width='13'></a>";
}


function insert_status_update($var)
{
        $id=$var['id'];
        $table=$var['table'];
        $status=$var['status'];
        session_register("STATUS_ACTION");
        if($_SERVER['QUERY_STRING']=="")
        {
                $return_vlaue=$_SESSION['RETURN_VALUE'];
                session_unregister("RETURN_VALUE");
                $_SERVER['QUERY_STRING']=$return_vlaue."&status_updated=yes";
        }
        $_SESSION['STATUS_ACTION']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        $action=$_SESSION['STATUS_ACTION'];
        $array=explode(",",$var['format']);


        echo"<select name='status' onChange=javascript:location.href='$action&status_id=$id&status_value='+this.value;>";
        for($i=0;$i<count($array);$i++)
        {
                $selected="";
                if($status==$array[$i])
                        $selected="selected";
                echo"<option value='$array[$i]' $selected>$array[$i]</option>";
        }
        echo"</select>";
}
    


function insert_delete($var)
{
        $id=$var['id'];
        $extra_table=$var['table'];
        $path_field=$var['field'];
        $link_name=$var['link_name'];
        session_register("DELETE_ACTION");
        if($_SERVER['QUERY_STRING']=="")
        {
                        $return_vlaue=$_SESSION['RETURN_VALUE'];
                        session_unregister("RETURN_VALUE");
                        $_SERVER['QUERY_STRING']=$return_vlaue;
        }
        $_SESSION['DELETE_ACTION']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
        $action=$_SESSION['DELETE_ACTION'];
        if($extra_table)
                $action.="&table=$extra_table";
        if($path_field)
                $action.="&field=$path_field";
        if($link_name=="")
                $link_name="Delete";
                
        
        echo "<a href='$action&deleteid=$id' onclick=\"return confirm('Are you sure to delete this value?')\">$link_name</a>";
}



function insert_birth_date($var="")
{
    if($var['value']!="")
    {
        $birth_date=explode("-",$var['value']);
        $_REQUEST['bmonth']=$birth_date[1];
        $_REQUEST['bday']=$birth_date[2];
        $_REQUEST['byear']=$birth_date[0];
    }
    $bmonth=month_box($_REQUEST['bmonth']);
    $bday=day_box($_REQUEST['bday']);
    $byear=birth_year_box($_REQUEST['byear']);
    
    echo"<select name='bmonth'>".$bmonth."</select> / <select name='bday'>".$bday."</select> / <select name='byear'>".$byear."</select>";
}

function insert_date_box($var)
{
    $id="";
    $id=$var['id'];

    if($var['value'])
    {
        $date=explode("-",$var['value']);
        $_REQUEST['month'.$id]=$date[1];
        $_REQUEST['day'.$id]=$date[2];
        $_REQUEST['year'.$id]=$date[0];
    }
    else
    {
        $date=getdate();
        if($_REQUEST['month'.$id]=="")
            $_REQUEST['month'.$id]=$date['mon'];
        if($_REQUEST['day'.$id]=="")
            $_REQUEST['day'.$id]=$date['mday'];
        if($_REQUEST['year'.$id]=="")
            $_REQUEST['year'.$id]=$date['year'];
    }
    $month=month_box($_REQUEST['month'.$id]);
    $day=day_box($_REQUEST['day'.$id]);
    $year=year_box($_REQUEST['year'.$id]);

    echo"<select name='month$id'>".$month."</select> / <select name='day$id'>".$day."</select> / <select name='year$id'>".$year."</select>";
}


function insert_time_box($var)
{
    $id="";
    $id=$var['id'];

    if($var['value'])
    {
        $date=explode(":",$var['value']);
        $_REQUEST['hour'.$id]=$date[0];
        $_REQUEST['minute'.$id]=$date[1];
        $_REQUEST['second'.$id]=$date[2];
    }
    else
    {
        $date=getdate();
        if($_REQUEST['hour'.$id]=="")
            $_REQUEST['hour'.$id]=$date['hours'];
        if($_REQUEST['minute'.$id]=="")
            $_REQUEST['minute'.$id]=$date['minutes'];
        if($_REQUEST['second'.$id]=="")
            $_REQUEST['second'.$id]=$date['seconds'];
    }
    $hour=hour_box($_REQUEST['hour'.$id]);
    $minute=minute_box($_REQUEST['minute'.$id]);
    $second=second_box($_REQUEST['second'.$id]);

    echo"<select name='hour$id'>".$hour."</select>&nbsp : &nbsp<select name='minute$id'>".$minute."</select>&nbsp : &nbsp<select name='second$id'>".$second."</select>";
}


function insert_age_box($var)
{
    if($var['value'])
        $_REQUEST['age']=$var['value'];

    $age=age_box($_REQUEST['age']);

    echo"<select name='age'>".$age."</select>";
}

function insert_configuration_select_box($var)
{

       $arr= explode("|",$var['options']);


       for($i=0;$i<count($arr);$i++)
       {
           $selected="";
           if($arr[$i]==$var['value'])
                $selected="selected";
           echo "<option value='$arr[$i]' ".$selected.">".$arr[$i]."</option>";
       }


}
function insert_show_date()
{
        $date=get_date();
        return $date;
}
function insert_show_day()
{
        $day=get_day();
        return $day;
}
function insert_show_month($var)
{
        $months=array("", "January","February","March","April","May","June","July","August","September","October","November","December");
        $id=$var['value']+0;

        echo $months[$id];
}
?>
