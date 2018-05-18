<?php

class root
{
    /*  This name indicate 'Database Table Name' & 'Class Name' */
    var $name = '';
    var $id = 0;
    var $data = array();
    var $sql;

    function root(){}

    function set_id($id="")
    {
        if($id)
            $this->id = $id;
    }
    
    /*  Returns the specified fields up to $limit records matching $conditions (if any),
        start listing from page $page (default is page 1). $conditions should look like
        they would in an SQL statement: $conditions = "race = 'wookie' AND thermal_detonators > 3", for example.    */
    function findAll($conditions="", $fields="",  $order="", $limit="",$join_table="")
    {
        global $conn;

        $conditions_sql = ($conditions=="")?"":"where $conditions";
        if($join_table!="")
        {
            $fields_sql = ($fields=="")?$this->name.".*":$fields;
            $order_sql = ($order=="")?"order by ".$this->name.".id desc":"order by $order";
        }
        else
        {
            $fields_sql = ($fields=="")?"*":$fields;
            $order_sql = ($order=="")?"":"order by $order";
        }
        $limit_sql = ($limit=="")?"":"limit $limit";
        if($join_table!="")
            $join_table=",`".$join_table."` ";
        $this->sql = "select $fields_sql from `".$this->name."`$join_table $conditions_sql $order_sql $limit_sql";
        //echo $this->sql; //exit();
        $rs = $conn->Execute($this->sql);
        $this->data = $rs->GetRows();
        return $this->data;
    }
    
    
    function findAll_query($conditions)
    {
        global $conn;

        $this->sql = $conditions;
        //echo $this->sql; //exit();
        $rs = $conn->Execute($this->sql);
        $this->data = $rs->GetRows();
        return $this->data;
    }
    
    
    /*  Returns the specified (or all if not specified) fields from the first record that matches $conditions. */
    function find($conditions="", $fields="", $order="",$join_table="")
    {
        $row = $this->findAll($conditions, $fields, $order, "0, 1",$join_table);
        $this->data = $row[0];
        return $this->data;
    }
    
    function findExist($conditions="")
    {
        $row = $this->find($conditions, "count(*) as total","",$join_table);
        if($row['total']>0)
            return true;
        else
            return false;
    }

    /*  Returns the number of records that match the given conditions.  */
    function findCount($conditions="",$join_table="")
    {
        $row = $this->find($conditions, "count(*) as total","",$join_table);
        return $row['total'];
    }
    
    function findCount_query($conditions,$field)
    {
        global $conn;

        $this->sql = $conditions;
        //echo $this->sql; //exit();
        $rs = $conn->Execute($this->sql);
        $total = $rs->fields[$field];
        return $total;
    }
    
    
    function findMax($conditions="",$field)
    {
        $row = $this->find($conditions, "max(sort) as maximum");
        return $row['maximum'];
    }    


    /*  Use this function to get the fields and their values from the currently loaded record, or the record specified by $id.  */
    function read($fields="")
    {
        return $this->find("id='".$this->id."'", $fields);
    }
    
    function readField($id, $field="")
    {
        $data = $this->find("id='$id'", $field);
        return $data[$field];
    }


    /* To save data with the follwoing array format:
       [$this->name][fieldName] = 'value';
    */
    function save($data)
    {
        global $conn;
        if($this->id)   $sql = "update";
        else    $sql = "insert";

        $sql .= " `".$this->name."` set";

        $i=1;
        while(list($key, $value) = each($data[$this->name]))
        {
            $sql .= " `$key` = '$value'";

            if($i<count($data[$this->name]))
                $sql .= ",";
            $i++;
        }
            
        if($this->id)
            $sql .= " where id='".$this->id."'";
        
        $this->sql = $sql;
        $rs = $conn->Execute($this->sql);
        $affected_rows = $conn->Affected_Rows();

        if($this->id==0 and $affected_rows>0)
        {
            $this->id = $conn->Insert_ID();

            $sql = "update `".$this->name."` set sort='".$this->id."' where id='".$this->id."'";
            $rs = @$conn->Execute($sql);

            $sql = "update `".$this->name."` set created='".date("Y-m-d H:i:s")."' where id='".$this->id."'";
        }
        else
        {
            $sql = "update `".$this->name."` set modified='".date("Y-m-d H:i:s")."' where id='".$this->id."'";
        }
        $rs = @$conn->Execute($sql);
            

        return $affected_rows+0;
    }
    

    /*  Used to save a single field value.  */
    function saveField($field, $value)
    {
        return $this->execute("update `".$this->name."` set `$field`='$value' where id='".$this->id."'");
    }


    /*  Deletes the model specified by $id, or the current id of the model  */
    function del($id)
    {
        return $this->execute("delete from `".$this->name."` where id='".$id."'");
    }
    
    
    function delete_query($conditions)
    {
        return $this->execute("delete from `".$this->name."` where ".$conditions);
    }    
    
    
    /*  Custom SQL calls  : return array*/
   function query($query)
    {
        global $conn;

        $rs = $conn->Execute($query);
        return $rs->GetRows();
    }
    
    
    /*  Custom SQL calls  : return number of Affected rows*/
   function execute($query)
    {
        global $conn;

        $rs = $conn->Execute($query);
        return $conn->Affected_Rows();
    }
    

    /* Assign $this->data For Smarty */
    function assign($var_name="")
    {
        if($var_name=="")
            $var_name=$this->name;

        STemplate::assign($var_name, $this->data);
    }

    function paging($conditions="", $fields="",  $order="", $listing_per_page="",$page_title="",$limit="",$get_url="")
    {
            global $paging_table_name;
            $paging_table_name=$this->name;
            
            if($page_title)
                $page_title="_".strtoupper($page_title);
            if($_REQUEST['paging'])
            {
                    $i=1;
                    $and="";
                    $join_table="";
                    $join_relation="";
                    while(list($key, $value) = each($_REQUEST['paging']))
                    {
                            $value=trim($value);
                            $key=trim($key);

                            if($value!="")
                            {
                                ////for join query/////
                                if(strstr($key,"."))
                                {
                                    $array=explode(".",$key);
                                    $new_table=$array[0];
                                    if($new_table!=$this->name)
                                    {   $join_table=$new_table;
                                        $join_relation=" and ".$this->name.".".$join_table."_id=".$join_table.".id";  //i.e. 'photo.user_id=user.id'
                                    }
                                    $_REQUEST["paging_".$array[0]."_".$array[1]]=$value;
                                    assign("paging_".$array[0]."_".$array[1],$value);
                                    assign($array[0]."_".$array[1],"checked");
                                }
                                    if(strstr($key,"name") || strstr($key,"body")|| strstr($key,"title") || strstr($key,"text") || strstr($key,"description"))
                                    {
                                            $array=explode(" ",$value);
                                            $str=" $and (  $key like '%$array[0]%' ";
                                            for($j=1;$j<count($array);$j++)
                                            {
                                                    $str.= " or $key like '%$array[$i]%' ";
                                            }
                                            $str.=" ) ";
                                            $conditions2.=$str;
                                    }
                                    elseif(strstr($key,"created") || strstr($key,"modified") || strstr($key,"last_login") || strstr($key,"released"))
                                    {
                                            $var=$_REQUEST['paging'][$key];
                                            if(strstr($var,"|"))
                                            {
                                                    $date_value=explode("|",$var);
                                                    $date_1=$date_value['0']." 00:00:00";
                                                    $date_2=$date_value['1']." 23:59:59";
                                            }
                                            else
                                            {
                                                    $date_id=explode(",",$var);
                                                    $date_id_1=trim($date_id['0']);
                                                    $date_id_2=trim($date_id['1']);
                                                    $date_1=date_box($date_id_1)." 00:00:00";
                                                    $date_2=date_box($date_id_2)." 23:59:59";
                                            }
                                            $conditions2 .=" $and ( $key>='$date_1' and $key<='$date_2') ";
                                            $value=$date_1."|".$date_2;
                                            assign($key,"checked");
                                    }
                                    else
                                    {
                                            $conditions2 .= " $and $key = '$value' ";
                                    }

                                    $return_value.="&paging[".$key."]=".$value;
                                    $and=" and ";
                                }
                            $i++;
                    }
                    $conditions2=$conditions2.$join_relation;
                    if($conditions!="" && $conditions2!="")
                            $conditions2=" and ".$conditions2;

                    session_register("SEARCH");
                    session_register("RETURN_VALUE");
                    $_SESSION['SEARCH']=$conditions.$conditions2;
                    $conditions=$_SESSION['SEARCH'];
                    $_SESSION['RETURN_VALUE']=$return_value;
            }
            else if(!$_REQUEST['page'] && !$_REQUEST['sort'] && !$_REQUEST['status_updated'])
            {                        
                    session_register("INITIAL_PAGE".$page_title);
                    $_SESSION['INITIAL_PAGE'.$page_title]=get_current_page();
                    session_unregister("SEARCH");
                    session_unregister("RETURN_VALUE");
            }
            else if($_SESSION['SEARCH'])
                $conditions=$_SESSION['SEARCH'];

            if($listing_per_page=="")
                    $listing_per_page=LISTING_PER_PAGE;
            if($_REQUEST['page'])
                $page = $_REQUEST['page'];
            else
                $page = 1;

            $total = $this->findCount($conditions,$join_table);
            if($limit!="" && ($total>$limit))
                $total=$limit;
            $tpage = ceil($total/$listing_per_page);
                
            if($tpage!=0 && ($page>$tpage))
                $page=$tpage;
                    
            if($tpage==0) $spage=$tpage+1;
            else $spage = $tpage;
            $startfrom = ($page-1)*$listing_per_page;
            $current_page = "Page <b>$page</b> of <b>$spage</b>";


            if($_REQUEST['sort'])
            {
                session_register("ORDER");
                if($_REQUEST['static_order'])
                    $_SESSION['ORDER']=$_REQUEST['static_order']." , ".$_REQUEST['sort']." ".$_REQUEST['order'];
                else
                    $_SESSION['ORDER']=$_REQUEST['sort']." ".$_REQUEST['order'];
                $order=$_SESSION['ORDER'];
            }
            else if($_REQUEST['page'] && $_SESSION['ORDER'])
                $order=$_SESSION['ORDER'];
            else if($order=="")
            {
                session_unregister("ORDER");
                $order="id desc";
            }
            if($limit!="" && (($page*$listing_per_page)>$limit) )
            {
                $extra=($page*$listing_per_page)-$limit;
                $listing_per_page-=$extra;
            }
            
            $this->findAll($conditions,$fields,$order,"$startfrom, $listing_per_page",$join_table);


/****************page select box***************/
            $page_name=$_SESSION['INITIAL_PAGE'.$page_title];
            $str="<b>Go to page : </b>";
            $str.="<select onchange=javascript:location.href='".$page_name."page='+this.value+'$_SESSION[RETURN_VALUE]';>";
                for($i=1;$i<=$spage;$i++)
                {
                    if ($page==$i)
                        $str.="<option value='$i' selected>$i</option>";
                    else
                        $str.="<option value=$i>$i</option>";
                }
            $str.="</select>";



            /****************page next button***************/

                    $flag=0;

                    if($page<8)
                            $num_start="1";
                    else
                            $num_start=$page-($page%7)-1;

                            if($get_url!="")
                                $get_url="&".$get_url;
                    for($i=$num_start; $i<=$spage; $i++)
                    {
                            if($i==$page)
                                    $paging.="<a href='".$page_name."page=$i$_SESSION[RETURN_VALUE]".$get_url."' style='color : #DB0004; TEXT-DECORATION: none; FONT-WEIGHT: bold'> $i &nbsp</a>";
                            else
                                    $paging.="<a href='".$page_name."page=$i$_SESSION[RETURN_VALUE]".$get_url."' style='color : #000000; TEXT-DECORATION: none'> $i &nbsp</a>";
                            $flag++;
                            if($flag==10)
                                    break;
                    }

            $n=$page+1;
            $b=$page-1;

            if($page<$tpage && $total>0)
            {
                    $next="<a href='".$page_name."page=$n$_SESSION[RETURN_VALUE]".$get_url."' style='color : #DB0004; TEXT-DECORATION: none'>Next</a>";
                    $next2="<a href='".$page_name."page=$n$_SESSION[RETURN_VALUE]".$get_url."' style='color : #DB0004; TEXT-DECORATION: none;font-family:verdana; font-weight:bold; font-size:12px'>Next</a>";
                    $last="<a href='".$page_name."page=$spage$_SESSION[RETURN_VALUE]".$get_url."' style='color : #DB0004; TEXT-DECORATION: none'>Last</a>";
            }
            else
            {
                    $next="Next";
                    $next2="<font style='color : #000000; TEXT-DECORATION: none;font-family:verdana; font-weight:bold; font-size:12px'>Next</font>";
                    $last="Last";
            }
            if($page>1 && $total>0)
            {
                    $first="<a href='".$page_name."page=1$_SESSION[RETURN_VALUE]".$get_url."' style='color : #DB0004; TEXT-DECORATION: none'>First</a>";
                    $back="<a href='".$page_name."page=$b$_SESSION[RETURN_VALUE]".$get_url."' style='color : #DB0004; TEXT-DECORATION: none;'>Back</a>";
                    $back2="<a href='".$page_name."page=$b$_SESSION[RETURN_VALUE]".$get_url."' style='color : #DB0004; TEXT-DECORATION: none;font-family:verdana; font-weight:bold; font-size:12px'>Previous</a>";
            }
            else
            {
                    $back="Back";
                    $back2="<font style='color : #000000; TEXT-DECORATION: none;font-family:verdana; font-weight:bold; font-size:12px'>Previous</font>";
                    $first="First";
            }

            $page_next_button=$first." | ".$back." | ".$paging." | ".$next." | ".$last;

            $next_previous_button=$back2." &nbsp|&nbsp  ".$next2;

            //*******************assigning value********************************//

            STemplate::assign('page_select_box',$str);
            STemplate::assign('page_next_button',$page_next_button);
            STemplate::assign('next_previous_button',$next_previous_button);
            STemplate::assign('total',$total);
            STemplate::assign('current_page',$current_page);
            STemplate::assign('start_from',$startfrom);
    }



        function status_update()
        {
                if($_REQUEST['status_id'])
                {
                        $_REQUEST[$this->name]['status']=$_REQUEST['status_value'];
                        $this->id=$_REQUEST['status_id'];
                        $this->save($_REQUEST);
                        //echo $this->sql;exit();
                        $action=$_SESSION['STATUS_ACTION'];
                        session_unregister("STATUS_ACTION");
                        session_unregister("STATUS_ACTION");
                        redirect($action);exit();
                }
        }
            
    
        function delete($condition="")
        {
            global $conn;
            if($_REQUEST['deleteid']) 
            { 
                    if($_REQUEST['field'])
                    {
                        $fields=explode(",",$_REQUEST['field']);
                    }
                    if($_REQUEST['table'])
                    {
                        $tables=explode(",",$_REQUEST['table']); 
                        for($i=0;$i<count($tables);$i++)
                        {
                            $table_name=trim($tables[$i]);
                            if(($table_name!="") && ($table_name!=$this->name))
                            {
                                for($j=0;$j<count($fields);$j++)
                                {
                                    $field_table=explode(".",$fields[$j]);
                                    if($field_table[0]==$table_name)
                                    {
                                        $field_name=$field_table[1];
                                        if($table_name=="image")
                                        {
                                            $this->id=$_REQUEST['deleteid'];
                                            $this->read() ;  
                                            $image_id=$this->data['image_id'];
                                            $image_id_array=explode("|",$image_id);
                                            for($k=0;$k<count($image_id_array);$k++)
                                            {                                            
                                                if(trim($image_id_array[$k])!="")
                                                {
                                                    $sql = "select $field_name from `$table_name` where id=".$image_id_array[$k];
                                                    //echo $sql;
                                                    $rs = $conn->Execute($sql);
                                                    $data = $rs->GetRows();
                                                    $path=$data[0][$field_name];
                                                    //echo $path;exit;
                                                    if($path)
                                                    {
                                                        //echo BASE_DIR."/".$path;
                                                        unlink(BASE_DIR."/".$path);
                                                    }
                                                    //exit;
                                                }
                                            }            
                                        }
                                        else
                                        {
                                            $sql = "select $field_name from `$table_name` where ".$table_name.".".$this->name."_id=".$_REQUEST['deleteid'];
                                            //echo $sql;
                                            $rs = $conn->Execute($sql);
                                            $data = $rs->GetRows();
                                            $path=$data[0][$field_name];
                                            //echo $path;exit;
                                            if($path)
                                            {
                                                //echo BASE_DIR."/".$path;
                                                unlink(BASE_DIR."/".$path);
                                            }
                                        }
                                    }
                                }//exit;
                                if($table_name=="image")
                                {
                                    $this->id=$_REQUEST['deleteid'];
                                    $this->read() ;  
                                    $image_id=$this->data['image_id'];
                                    $image_id_array=explode("|",$image_id);
                                    for($k=0;$k<count($image_id_array);$k++)
                                    {
                                        $this->execute("delete from `$table_name` where id=".$image_id_array[$k]);
                                    }
                                }
                                else
                                    $this->execute("delete from `".$table_name."` where ".$table_name.".".$this->name."_id=".$_REQUEST['deleteid']);
                            }
                        }
                    }
                    $this->execute("delete from `".$this->name."` where id=".$_REQUEST['deleteid']);
                    $action=$_SESSION['DELETE_ACTION'];
                    session_unregister("DELETE_ACTION");
                    session_unregister("DELETE_ACTION");
                    redirect($action);exit();
            }
            elseif($condition!="")
            {
                    $this->execute("delete from `".$this->name."` where ".$condition);
            }

        }
     
        
    function login($user_identification,$password)
    {
        $err="";
        if($_REQUEST['login']['email'])
            $field_name="email";
        else
            $field_name="username";

        if($user_identification=="" || $password=="")
            $err="Please provide both $field_name and password";
        if($err=="")
        {
            $password=$password;
            if(!$this->findCount("$field_name='$user_identification' and password='$password' and status='Active'"))
                $err="Invalid $field_name and/or password provided";
            else
            {
                $login_username=strtoupper($this->name)."_USERNAME";
                $login_password=strtoupper($this->name)."_PASSWORD";
                $login_id=strtoupper($this->name)."_ID";
                $login_type=strtoupper($this->name)."_TYPE";

                session_register($login_username);
                session_register($login_password);
                session_register($login_id);
                session_register($login_type);

                $this->find("$field_name='$user_identification' and password='$password'");
                $_SESSION[$login_username]=$this->data['username'];
                $_SESSION[$login_id] = $this->data['id'];
                $_SESSION[$login_type] = $this->data['type_id'];
                $this->execute("update $this->name set last_login='".date('Y-m-d H:i:s')."' where id='$_SESSION[$login_id]'");

            }
        }
        return $err;
    }
    

        
    function login_submit($default_redirect_page)
    {
        global $msg,$err;
        if($_REQUEST['login'])
        {
            $err="";
            if($_REQUEST['login']['email'])
                $user_identification=$_REQUEST['login']['email'];
            else
                $user_identification=$_REQUEST['login']['username'];
            $password=$_REQUEST['login']['password'];
            $err=$this->login($user_identification,$password);
            if($err=="")
            {
                if($this->name !="admin" && $_SESSION['RETURN'])
                {
                    $temp=$_SESSION['RETURN'];
                    session_unregister("RETURN");
                    redirect($temp);
                }
				elseif($this->name =="admin" && $_SESSION['ADMIN_RETURN'])
                {
                    $temp=$_SESSION['ADMIN_RETURN'];
                    session_unregister("ADMIN_RETURN");
                    redirect($temp);
                }
                else
                {
                    redirect($default_redirect_page);
                }
            }
        }
        return $err;
    }
    
    
    function voter_login($reg_no,$password,$election_id)
    {
        $election = new election($election_id);
        $election->read();
        $err="";
        if($reg_no=="" || $password=="")
            $err="Please provide both registration number and password";
        if($err=="")
        {
            if(!$this->findCount("reg_no='$reg_no' and password='$password'"))
                $err="Invalid registration number and/or password provided";
            else
            {
                $this->find("reg_no='$reg_no' and password='$password'");
                $vote_count=new vote_count();
                if(!strstr(ACTIVE_SESSION,"|".$this->data['session']."|"))
                    $err="Sorry your session is now inactive";
                elseif(!strstr($election->data['session'],"|".$this->data['session']."|"))
                    $err="Sorry your session is inactive for this election";
                elseif($vote_count->findCount("student_id='".$this->data['id']."' and election_id='$election_id'"))
                    $err="Sorry you have given your vote previously";
                elseif($this->data['status']=="Inactive")
                    $err="Sorry your status is now inactive";
                if($err=="")
                {
                    session_register("STUDENT_REG_NO");
                    session_register("STUDENT_ID");
                    session_register("ELECTION_ID");

                    $_SESSION["STUDENT_REG_NO"]=$this->data['reg_no'];
                    $_SESSION["STUDENT_ID"] = $this->data['id'];
                    $_SESSION["ELECTION_ID"] = $election_id;
                }
            }
        }
        return $err;
    }
    
    
    
    function voter_login_submit($default_redirect_page,$election_id)
    {
        global $msg,$err;
        if($_REQUEST['login'])
        {
            $err="";
            
            $reg_no=$_REQUEST['login']['reg_no'];
            $password=$_REQUEST['login']['password'];
            $err=$this->voter_login($reg_no,$password,$election_id);
            if($err=="")
            {
                redirect($default_redirect_page);
            }
        }
        if($ajax && $err)
        {
            $array=array('success'=>false,'err'=>$err);
            $result=array2json($array);
            echo $result;
            exit;
        }
        return $err;
    }
    
    
    
    
    
    
    
    
    
        
    function logout()
    {
        $login_username=strtoupper($this->name)."_USERNAME";
        $login_password=strtoupper($this->name)."_PASSWORD";
        $login_id=strtoupper($this->name)."_ID";
        session_unregister($login_username);
        session_unregister($login_password);
        session_unregister($login_id);
    }
    
    
    function change_password($redirect_page)
    {
        global $msg,$err;
        if($_REQUEST['change_password'])
        {
            $err="";
            if($_REQUEST['change_password']['old_password']==""  || $_REQUEST['change_password']['new_password'] == "")
                $err="Please provide both old and new password";
                
            else if(!$this->check_length($_REQUEST['change_password']['new_password'],6))
                $err = "Please provide at least 6 character";
                
            else
            {
                $this->read();
                if( $this->data['password'] == $_REQUEST['change_password']['old_password'] )
                {
                    $array[$this->name]['password']=$_REQUEST['change_password']['new_password'];
                    $this->save($array);
                    redirect($redirect_page."?msg=yes");
                }
                else
                    $err="Please enter your old password";
            }
        }
        if($_REQUEST['msg'])
            $msg="Your password has been updated successfuly";
    }



/********************emial*******************************/


    function replace_variables($body,$variables,$uncommon_variables)
    {
        $variables_array=explode(",",$variables);
        for($i=0;$i<count($variables_array);$i++)
        {
            $variable=trim($variables_array[$i]);
            switch($variable)
            {
                case "#SITENAME#":
                    $body=str_replace("#SITENAME#",SITE_NAME,$body);
                    break;
                case "#USERNAME#":
                    $this->read();
                    $username=$this->data['username'];
                    $body=str_replace("#USERNAME#",$username,$body);
                    break;
                case "#PASSWORD#":
                    $password=rand(100000,999999);
                    $array[$this->name]['password']=$password;
                    $this->save($array);
                    $body=str_replace("#PASSWORD#",$password,$body);
                    break;
            }
        }
        if($uncommon_variables!="")
        {
            $uncommon_variables_array=explode(",",$uncommon_variables);
            for($i=0;$i<count($uncommon_variables_array);$i++)
            {
                $array=explode("->",$uncommon_variables_array[$i]);
                $replace_variable=trim($array[0]);
                $replace_value=trim($array[1]);
                $body=str_replace($replace_variable,$replace_value,$body);
            }
        }

        return $body;
    }
    
            /*
            $ip=get_ip();
            $link="<a href=''>$title</a>";
            send_email("DOWNLOAD_NOTIFICATION","#IP_ADDRESS#->$ip,#PROJECT_TITLE#->$link");
            */
            function send_email($email_key,$uncommon_variables="",$to="")
            {
                $this->read();
                if($to=="")
                    $to = $this->data['email'];
                $name = SITE_NAME;
                $from = SITE_EMAIL_ADDRESS;

                $email=new email();
                $email->find("`key`='$email_key'");
                $body=$this->replace_variables($email->data['body'],$email->data['variables'],$uncommon_variables);
                $subj=$this->replace_variables($email->data['subject'],$email->data['variables'],$uncommon_variables);
                    //echo $to."-------".$name."-------".$from."-------".$subj."-------".$body;exit();
                mailing($to,$name,$from,$subj,$body);
                return true;
            }

    function send_mail_validation($extra_url_value="")
    {
        $return_page="mail_validation.php";
        $validation_code=mt_rand();
        $array[$this->name]['validation']=$validation_code;
        $this->save($array);
        if($extra_url_value)
            $extra_url_value="&".$extra_url_value;
        $url="<a href='".BASE_URL."/".$return_page."?validation_code=$validation_code&id=".$this->id.$extra_url_value."$return'>click here</a> or visit the following url:<br>".BASE_URL."/".$return_page."?validation_code=$validation_code&id=".$this->id.$extra_url_value;
        $this->send_email("VALIDATION_EMAIL","#VALIDATION_URL#->$url");
    }

    function check_mail_validation()
    {
        $err="";
        $num=$this->findCount("id='$_REQUEST[id]' and validation='$_REQUEST[validation_code]'");
        if($num<=0)
                $err="Sorry, your mail verification is not successful. Please try again.";

        return $err;
    }

        function check_user_email($email)
            {
                    $count = $this->findCount("email='$email' ");
                    if($count>0)
                    {
                            $user = $this->find("email='$email' ", 'id');
                            return $user['id'];
                    }
                    else
                            return 0;
            }


        function retrieve_password()
        {
                global $msg,$err;
                if($_REQUEST['retrieve'])
                {
                    if($_REQUEST['retrieve']['email']=="")
                        $err="Please enter your email address";
                    else
                    {
                        if( $user_id = $this->check_user_email($_REQUEST['retrieve']['email'] ) )
                        {
                                $this->id = $user_id;
                                if($this->send_email("FORGOT_PASSWORD"))
                                {
                                        $msg = "An email has been sent with your username & password.<br>Please check your inbox.";
                                }
                                else
                                        $err = "An error occur, please try again.";
                        }
                        else
                                 $err = "Sorry, your email address does not match.";
                    }
                }
                return $err;
        }
        
        function check_length($str,$length)
        {
            if(strlen($str)<$length)
                    return 0;
            else
                    return 1;
        }

        /*

    function send_mail_validation($page_name)
    {
                    $validation_code=mt_rand();
                    $_REQUEST[$this->name]['validation']=$validation_code;
                    $this->save($_REQUEST);
                    $to=$_REQUEST[$this->name]['email'];
                    $name=SITE_NAME;
                    $from=SITE_EMAIL_ADDRESS;
                    $subject=SITE_NAME.": User verification";
                    
                    $email=new email(1);
                      $email->read();
                    $user_validation_mail=$email->data['value'];
                    $url="<a href='".BASE_URL."/".$page_name."?validation_code=$validation_code&id=".$this->id."$return'>click here</a> or visit the following url:".BASE_URL."/".$page_name."?validation_code=$validation_code&id=".$this->id;
                    $str=str_replace("#SITENAME#",SITE_NAME,$user_validation_mail);
                    $body=str_replace("#URL#",$url,$str);
                    
                   // echo $body;   exit();
                    mailing($to,$name,$from,$subject,$body);                
    } 
    
    function check_mail_validation()
    {
        $err="";
        $num=$this->findCount("id='$_REQUEST[id]' and validation='$_REQUEST[validation_code]'");
        if($num<=0)
                $err="Sorry,your mail varification is not successfull.Please try again.";

        return $err;
    }
    
        function check_user_email($email)
            {
                    $count = $this->findCount("email='$email' ");
                    if($count>0)
                    {
                            $user = $this->find("email='$email' ", 'id');
                            return $user['id'];
                    }
                    else
                            return 0;
            }

            function password_recover_mail()
            {
                $this->read();
                $username=$this->data['username'];
                     $password=$this->data['password'];
                          
                $to = $this->data['email'];
                $name = SITE_NAME;
                $from = SITE_EMAIL_ADDRESS;
                $subj = "Forgotten Password";

                $email=new email(2);
                $email->read();
                $forgot_password=$email->data['value'];
                $body=str_replace("#USERNAME#",$username,$forgot_password);
                $body=str_replace("#PASSWORD#",$password,$body);
                     //echo $to."-------".$name."-------".$from."-------".$subj."-------".$body;exit();
                mailing($to,$name,$from,$subj,$body);
                return true;
            }

        function retrieve_password()
        {
                global $msg,$err;
                if($_REQUEST['retrieve'])
                {
                    if($_REQUEST['retrieve']['email']=="")
                        $err="Please enter your email address";
                    else
                    {
                        if( $user_id = $this->check_user_email($_REQUEST['retrieve']['email'] ) )
                        {
                                $this->id = $user_id;
                                if($this->password_recover_mail())
                                {
                                        $msg = "An email has been sent with your username & password.<br>Please check your inbox.";
                                }
                                else
                                        $err = "An error occur, please try again.";
                        }
                        else
                                 $err = "Sorry, your email address does not match.";
                    }
                }
                return $err;
        }

         */










    
    function get_image_path($id)
    {
        $this->id = $id;
        $data = $this->read('image_path');
        return $data['image_path'];
    }
       /*  Image Upload */
        function photo_upload($var)
    {

        $filename = mt_rand().".jpg";
        $folder = "/uploads/".$this->name."/".$this->id."/";

        $width = MAX_IMAGE_WIDTH;
        $result =upload($var, $filename, IMAGES_DIR.$folder, $width);
        if(!$result)
            $err = "?err=Your photo is not uploaded successfully";
        else
        {
            $data['photo'] = array('user_id'=>$this->id, 'path'=>"images".$folder.$filename);
            $this->save($data);

            /* Upload thumbnail */
            $t_filename = $filename;
            $t_folder = "/uploads/".$this->name."/".$this->id."/thumb/";
            $t_width = MAX_THUMB_WIDTH;
            $result =upload($var, $t_filename, IMAGES_DIR.$t_folder, $t_width);
            if($result)
                $data['photo'] = array('thumb_path'=>"images".$t_folder.$t_filename);
            else
                $data['photo'] = array('thumb_path'=>"images".$folder.$filename);
            $this->save($data, $photo->id);


        }
        return $err;
    }
    

        function image_upload()
        {
            $image=new image();
            $filename = mt_rand().".jpg";
            $folder1=IMAGES_DIR."/uploads/".$this->name."/";
            if(!is_dir($folder1))
                mkdir($folder1, 0777);
            chmod($folder1, 0777);
            $folder = $folder1.$this->id."/";
            $width = MAX_IMAGE_WIDTH;
            $result =upload('photo', $filename, $folder, $width);
            if(!$result)
                $err = "?err=Your photo is not uploaded successfully";
            else
            {
                $data['image'] = array('path'=>"images"."/uploads/".$this->name."/".$this->id."/".$filename);
                $image->save($data);
            // Upload thumbnail */
                $t_filename = $filename;
                $t_folder=$folder."/thumb/";
                $t_width = MAX_THUMB_WIDTH;
                $result =upload('photo', $t_filename, $t_folder, $t_width);
                if($result)

                $data['image'] = array('thumb_path'=>"images"."/uploads/".$this->name."/".$this->id."/thumb/".$t_filename);
                $image->save($data, $image->id);
                if(($image->id)!="")
                    $img_id="|".$image->id."|";
                else
                    $img_id=$image->id."|";
                $this->saveField("image_id",$img_id);

            }
        return $err;
    }
     function photo_validation($VALS)
    {
        $ext = strtolower(strrchr($VALS['name'], '.'));

        if($VALS['name']=="")
            $msg="Please select your photo to upload";
        elseif(strtolower($ext)!=".jpg" and strtolower($ext)!=".jpeg")
            $msg="Only .jpg file is supported";
        elseif($VALS['size']>1048576)
                $msg = "Photo is not uploaded. File size must be less than 1MB";

        return $msg;
    }
      function image_delete($image_id)
        {
        $arr=explode("|",$image_id);

        for($i=0;$i<count($arr);$i++)
        {
            $id=$arr[$i];
            $this->find("id='$id'");
            $path=BASE_DIR."/".$this->data['path'];
            $thumb_path=BASE_DIR."/".$this->data['thumb_path'];
            @unlink($path);
            @unlink($thumb_path);
            $this->del($id);
        }
    }
}
?>
