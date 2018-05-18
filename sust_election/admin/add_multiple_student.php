<?php
    include("../includes/configure.php");
    check_admin_login();


    $student=new student();
    if($_REQUEST['submit'])
    {
        $student_array=explode("\n",$_REQUEST['student_info']);
        
        for($i=0;$i<count($student_array);$i++)
        {
            $student_data=trim($student_array[$i]);
            if($student_data!="")
            {
                $array=explode(",",$student_data);
                $name=trim($array[0]);
                $reg_no=trim($array[1]);
                $session=trim($array[2]);
                $section=trim($array[3]);
                if($name=="" || $reg_no=="" || $session=="" || $section=="" || $array[4])
                {
                    $err="Please provide valid information for : <br>".$student_data;
                    break;
                }
				/*
                if($student->findExist("reg_no=".$reg_no))
                {
                    $err=$reg_no." registration number is already existing";
                    break;
                }*/
            }
        }
        
        if($err=="")
        {
            for($i=0;$i<count($student_array);$i++)
            {
                $student_data=trim($student_array[$i]);
                if($student_data!="")
                {
                    $array=explode(",",$student_data);
                    $array['student']['name']=trim($array[0]);
                    $array['student']['reg_no']=trim($array[1]);
                    $array['student']['session']=trim($array[2]);
                    $array['student']['section']=trim($array[3]);
					$student=new student();
					if($student->findExist("reg_no=".$array['student']['reg_no']))
					{						
						$student->find("reg_no=".$array['student']['reg_no']);						
						$student->id=$student->data['id'];
					}
                    $student->save($array);
                }
            }
            redirect("student.php");exit;
        }
    }



    display_admin_tpl();
?>

