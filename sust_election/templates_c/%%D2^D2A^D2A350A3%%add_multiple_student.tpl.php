<?php /* Smarty version 2.6.6, created on 2008-03-30 13:33:22
         compiled from admin/add_multiple_student.tpl */ ?>
<br>
<form action="add_multiple_student.php" method="post">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="80%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add/Edit Multiple Students</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td>
            <textarea name="student_info" rows="20" cols="100"><?php echo $this->_tpl_vars['request']['student_info']; ?>
</textarea>
            <br>
            <font size="1"><div>Enter students information in every new line with following format : </div><div> Hasan Md. Suhag,2003331031,2003-2004,A</div></font>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
    </tr>
</table>
</form>
