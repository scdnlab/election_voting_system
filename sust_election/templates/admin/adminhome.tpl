<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td colspan="4">
                        <img src="images/users.png" width="30" align="absbottom"> <b>Search Users</b>
                </td>
                <td colspan="5" align="right">
                        <img src="images/add_user.png" width="30" align="absbottom"> {if $session.ADMIN_TYPE ne "1"}<a href="add_user.php">Add new user</a>{/if}
                </td>
        </tr>
        <tr>
                <td colspan="9">
                        <form action="adminhome.php" method="post">
                        <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                <tr>
                                        <td width="20%">
                                                Username Keywords :
                                        </td>
                                        <td>
                                                {insert name=search_textbox table=user field=username size=30}
                                        </td>
                                </tr>
                                <tr>
                                    <td width='20%'>
                                        User type:
                                    </td>
                                    <td>
                                        <select name='paging[type_id]'>
                                            <option value="">--Any--</option>
                                            <option value="1" {if $request.paging.type_id eq "1"}selected{/if}>Client</option>
                                            <option value="2" {if $request.paging.type_id eq "2"}selected{/if}>Administrator</option>
                                            <option value="3" {if $request.paging.type_id eq "3"}selected{/if}>Project Manager</option>
                                            <option value="4" {if $request.paging.type_id eq "4"}selected{/if}>Developer</option>
                                            <option value="5" {if $request.paging.type_id eq "5"}selected{/if}>Moderator</option>
                                        </select>
                                </td>
                                </tr>                                
                                <tr>
                                        <td width="20%">
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
                                        <td width="20%">
                                                <input type="checkbox" name="paging[created]" value="1,2"  {$created} > Created Between :
                                        </td>
                                        <td>
                                                {insert name=date_box id=1} and {insert name=date_box id=2}
                                        </td>
                                </tr>
                                <tr>
                                        <td width="20%">
                                                <input type="checkbox" name="paging[last_login]" value="3,4" {$last_login}> Login Between :
                                        </td>
                                        <td>
                                                {insert name=date_box id=3} and {insert name=date_box id=4}
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="2">
                                                <input type="submit" name="submit" value="View Users">
                                        </td>
                                </tr>
                        </table>
                        </form>
                <td>
        </tr>
        <tr>
                <td colspan="6">
                        <b>User Found : {$total}</b><br><b>{$current_page}</b>
                </td>
                <td align="right">
                    <a href="user_type.php">User type</a>
                </td>
        </tr>

    <tr bgcolor="bbbbbb" align="center">
        <td width="8%">
            Id {insert name=sort_image field=id}
        </td>

        <td width="15%">
           Username {insert name=sort_image field=username}
        </td>
        <td width="15%">
            Email {insert name=sort_image field=email}
        </td>
        <td width="15%">
            Created {insert name=sort_image field=created}
        </td>
        <td width="20%">
            Last Login {insert name=sort_image field=last_login}
        </td>
        <td  width="10%">
            Status {insert name=sort_image field=status}
        </td>

        <td width="25%">
            Action
        </td>

    </tr>
    {section name=i loop=$user}

    <tr bgcolor="efefef" align="center">
        <td>
            {$user[i].id}
        </td>
        <td>
            {$user[i].username}
        </td>
        <td>
            {$user[i].email}
        </td>
        <td>
            {$user[i].created|date_format}
        </td>
        <td>
             {if $user[i].last_login ne "0000-00-00 00:00:00"}{insert name=timediff time=$user[i].last_login}{/if}
        </td>
        <td>
            {insert name=status_update id=$user[i].id status=$user[i].status format="Active,Inactive"}
        </td>

        <td>
            <a href="view_user.php?id={$user[i].id}">View</a> |  <a href="edit_user.php?id={$user[i].id}">Edit</a> | {insert name=delete id=$user[i].id} 
        </td>

    </tr>
    {/section}
        <tr>
                <td colspan="2">
                        {$page_select_box}
                </td>
        </tr>
</table>

