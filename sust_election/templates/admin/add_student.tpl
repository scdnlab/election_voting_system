<br>
<form action="add_student.php" method="post" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add Student</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Name</b>
        </td>
        <td>
            <input type="text" name="student[name]" size="35" value="{$request.student.name}"> <font color="red">*</font>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Registration Number</b>
        </td>
        <td>
            <input type="text" name="student[reg_no]" value="{$request.student.reg_no}"> <font color="red">*</font>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Session</b>
        </td>
        <td>
            <select name="student[session]">
                <option value="">--Select--</option>
                {section name=i loop=$sessions}
                {if $sessions[i]}
                    <option value="{$sessions[i]}" {if $request.student.session eq $sessions[i]}selected{/if}>{$sessions[i]}</option>
                {/if}
                {/section}
            </select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Section</b>
        </td>
        <td>
            <select name="student[section]"><option value="A">A</option><option value="B" {if $request.student.section eq "B"}selected{/if}>B</option></select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Photo</b>
        </td>
        <td>
            <input type="file" name="photo">
            <div style="font-size:10px;color:#FF0005">Ratio of the image must be 1:1.2 (300x360)</div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
    </tr>
</table>
</form>


