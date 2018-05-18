<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td colspan="2">

                </td>
                <td colspan="3" align="right">
                        <img src="images/add_user.png" width="30" align="absbottom"><a href="add_candidate.php">Add new candidate</a>
                </td>
        </tr>

        <tr>
                <td colspan="5">
                        <b>Candidate Found : {$total}</b><br><b>{$current_page}</b>
                </td>
        </tr>

    <tr bgcolor="bbbbbb" align="center">
        <td>Photo</td>
        <td>
            Name
        </td>

        <td >
           Post
        </td>

        <td>
            Election
        </td>
        <td>
            Action
        </td>

    </tr>
    {section name=i loop=$candidate}

    <tr bgcolor="efefef" align="center" height="25">
        <td align='center'>
            {insert name=get_value table=student field=image_id id=$candidate[i].student_id assign=image_id}{insert name=get_image id=$image_id assign=image}{if $image[0].thumb_path}<a href="student.php?paging[id]={$candidate[i].student_id}"><img src='../{$image[0].thumb_path}' width='100'></a>{else}N/A{/if}
        </td>
        <td>
            <a href="student.php?paging[id]={$candidate[i].student_id}">{insert name=get_value table=student field=name id=$candidate[i].student_id}</a>
        </td>
        <td>
            <a href="candidate_category.php?paging[id]={$candidate[i].candidate_category_id}">{insert name=get_value table=candidate_category field=title id=$candidate[i].candidate_category_id}</a>
        </td>
        <td>
            <a href="election.php?paging[id]={$candidate[i].election_id}">{insert name=get_value table=election field=title id =$candidate[i].election_id}</a>
        </td>
        <td>
            <a href="edit_candidate.php?id={$candidate[i].id}">Edit</a> | {insert name=delete id=$candidate[i].id}
        </td>

    </tr>
    {/section}
        <tr>
                <td colspan="2">
                        {$page_select_box}
                </td>
        </tr>
</table>

