<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td colspan="4">
                        <img src="images/users.png" width="30" align="absbottom"> <b>Search Elections</b>
                </td>
                <td colspan="4" align="right">
                        <img src="images/add_user.png" width="30" align="absbottom"><a href="add_election.php">Add new election</a>
                </td>
        </tr>
        <tr>
                <td colspan="8">
                        <form action="election.php" method="post">
                        <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                <tr>
                                        <td width="20%">
                                                Title Keywords :
                                        </td>
                                        <td>
                                            <input type="text" name="paging[title]" size="30" value="{$request.paging.title}">
                                        </td>
                                </tr>

                                <tr>
                                        <td colspan="2">
                                                <input type="submit" name="submit" value="View Elections">
                                        </td>
                                </tr>
                        </table>
                        </form>
                <td>
        </tr>
        <tr>
                <td colspan="4">
                        <b>Election Found : {$total}</b><br><b>{$current_page}</b>
                </td>
        </tr>
 </table>
 <table cellspacing="1" cellpadding="2" border="0" width="100%">
    <tr bgcolor="bbbbbb" align="center">
        <td>
            Title {insert name=sort_image field=title}
        </td>

        <td>
            Date {insert name=sort_image field=date}
        </td>
        <td>
            Total vote
        </td>
        <!--
        <td>
            Start time
        </td>
        <td>
            End time
        </td>
        -->
        <td>
            Status
        </td>
        <td>
            Action
        </td>

    </tr>
    {section name=i loop=$election}

    <tr bgcolor="{if $election[i].status eq 'Active'}efefef{else}dddddd{/if}" align="center" height="25">
        <td>
            {$election[i].title}
        </td>
        <td>
            {$election[i].date}
        </td>
        <td>
            <div id="total_vote{$election[i].id}">{if $election[i].status eq "Active"}{insert name=load_total_vote election_id=$election[i].id}{else}{insert name=count_total_vote election_id=$election[i].id}{/if}</div>
        </td>
        <!--
        <td>
            {$election[i].start_time}
        </td>
        <td>
            {$election[i].end_time}
        </td>
        -->
        <td>
            {insert name=status_update id=$election[i].id status=$election[i].status format="Active,Inactive,Completed"}
        </td>
        
        <td>
            <a href="preview_election.php?id={$election[i].id}">Preview</a>  {if $election[i].status eq 'Completed'} | &nbsp;<a href="result.php?id={$election[i].id}">Show result</a>{elseif $election[i].status eq 'Inactive'} | <a href="edit_election.php?id={$election[i].id}">Edit</a> | {insert name=delete id=$election[i].id}{/if}
        </td>

    </tr>
    {/section}
        <tr>
                <td colspan="2">
                        {$page_select_box}
                </td>
        </tr>
</table>

