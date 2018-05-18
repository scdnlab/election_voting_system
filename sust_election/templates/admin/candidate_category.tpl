<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td>

                </td>
                <td colspan="8" align="right">
                    <img src="images/add_user.png" width="30" align="absbottom"><a href="add_candidate_category.php">Add new candidate category</a>
                </td>
        </tr>

        <tr>
                <td colspan="8">
                    <b>Candidate Category Found : {$total}</b><br><b>{$current_page}</b>
                </td>
        </tr>

    <tr bgcolor="bbbbbb" align="center">
        <td>
            Post
        </td>
        <td>
            Election
        </td>
        <td>
            Eligible Session
        </td>
        <td>
            Eligible Section
        </td>
        <td>
            Order
        </td>
        <td>
            Action
        </td>

    </tr>
    {section name=i loop=$candidate_category}

    <tr bgcolor="efefef" align="center" height="25">
        <td>
            {$candidate_category[i].title}
        </td>
        <td>
            <a href="election.php?paging[id]={$candidate_category[i].election_id}">{insert name=get_value table=election field=title id=$candidate_category[i].election_id}</a>
        </td>
        <td>
            {if $candidate_category[i].session ne ""}{$candidate_category[i].session}{else}All{/if}
        </td>
        <td>
            {if $candidate_category[i].section ne ""}{$candidate_category[i].section}{else}All{/if}
        </td>
        <td>
            {$candidate_category[i].order}
        </td>
        <td>
            <a href="edit_candidate_category.php?id={$candidate_category[i].id}">Edit</a> | {insert name=delete id=$candidate_category[i].id}
        </td>

    </tr>
    {/section}
        <tr>
                <td colspan="2">
                        {$page_select_box}
                </td>
        </tr>
</table>

