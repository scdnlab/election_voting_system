<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td colspan="3">
                        <img src="images/users.png" width="30" align="absbottom"> <b>Search Students</b>
                </td>
                <td colspan="2" align="right">
                        <a href="add_student.php">Add new student</a> <img src="images/add_user.png" width="30" align="absbottom">  <a href="add_multiple_student.php">Add/Edit multiple students</a>
                </td>
        </tr>
        <tr>
                <td colspan="4">
                        <form action="student.php" method="post">
                        <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                <tr>
                                        <td width="25%">
                                                Name Keywords :
                                        </td>
                                        <td>
                                            <input type="text" name="paging[name]" size="30" value="{$request.paging.name}">
                                        </td>
                                </tr>
								<tr>
                                        <td width="25%">
                                                Reg no :
                                        </td>
                                        <td>
                                            <input type="text" name="paging[reg_no]" size="30" value="{$request.paging.reg_no}">
                                        </td>
                                </tr>
								<tr>
                                        <td>
                                                Session :
                                        </td>
                                        <td>
                                                <select name="paging[session]">
                                                        <option value="">--Any--</option>
										                {section name=i loop=$sessions}
										                {if $sessions[i]}
										                    <option value="{$sessions[i]}" {if $request.paging.session eq $sessions[i]}selected{/if}>{$sessions[i]}</option>
										                {/if}
										                {/section}
                                                </select>
                                        </td>
                                </tr>
								<tr>
                                        <td>
                                                Section :
                                        </td>
                                        <td>
                                                <select name="paging[section]">
                                                        <option value="">--Any--</option>
                                                        <option value="A" {if $request.paging.section eq "A"}selected{/if}>A</option>
                                                        <option value="B" {if $request.paging.section eq "B"}selected{/if}>B</option>
                                                </select>
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                Status :
                                        </td>
                                        <td>
                                                <select name="paging[status]">
                                                        <option value="">--Any--</option>
                                                        <option value="Active" {if $request.paging.status eq "Active"}selected{/if}>Active</option>
                                                        <option value="Inactive" {if $request.paging.status eq "Inactive"}selected{/if}>Inactive</option>
                                                </select>
                                        </td>
                                </tr>

                                <tr>
                                        <td colspan="2">
                                                <input type="submit" name="submit" value="View Students">
                                        </td>
                                </tr>
                        </table>
                        </form>
                <td>
        </tr>
        <tr>
                <td colspan="5">
                        <b>Student Found : {$total}</b><br><b>{$current_page}</b>
                </td>
        </tr>
	</table>
	
<table cellspacing="1" cellpadding="2" border="0" width="100%">
    <tr bgcolor="bbbbbb" align="center">
        <td>
            Reg no {insert name=sort_image field=reg_no}
        </td>

        <td>
           Name {insert name=sort_image field=name}
        </td>
        <td>
           Session
        </td>
		<td>
           Section
        </td>
        <td>
           Photo
        </td>

        <td>
            Status {insert name=sort_image field=status}
        </td>

        <td>
            Action
        </td>

    </tr>
    {section name=i loop=$student}

    <tr bgcolor="efefef" align="center">
        <td>
            {$student[i].reg_no}
        </td>
        <td>
            {$student[i].name}
        </td>
		<td>
            {$student[i].session}
        </td>
		<td>
            {$student[i].section}
        </td>
        
        <td align='center'>{insert name=get_image id=$student[i].image_id assign=image}{if $image[0].thumb_path}<img src='../{$image[0].thumb_path}' width='100'>{else}N/A{/if}</td>

        <td>
            {insert name=status_update id=$student[i].id status=$student[i].status format="Active,Inactive"}
        </td>

        <td>
            <a href="edit_student.php?id={$student[i].id}">Edit</a> | {insert name=delete id=$student[i].id table="image" field="image.path,image.thumb_path"}
        </td>

    </tr>
    {/section}
        <tr>
                <td colspan="2">
                        {$page_select_box}
                </td>
        </tr>
</table>

