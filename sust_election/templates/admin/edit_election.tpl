<br>
<form action="edit_election.php?id={$request.id}" method="post" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Election Election</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="election[title]" value="{$election.title}" size="35">
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Description</b>
        </td>
        <td>
            <textarea name="election[description]">{$election.description}</textarea>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Date</b>
        </td>
        <td>
            {insert name=date_box value=$election.date}
        </td>
    </tr>
    <!--
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Start Time</b>
        </td>
        <td>
            {insert name=time_box id=1  value=$election.start_time}
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>End Time</b>
        </td>
        <td>
            {insert name=time_box id=2 value=$election.end_time}
        </td>
    </tr>
    -->
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Sessions</b>
        </td>
        <td>
        <table>
        {section name=i loop=$sessions}
        {if $sessions[i]}
            <tr>
                <td align="center">
                    <input type="checkbox" name="session[]" value="{$sessions[i]}" {insert name=session_checked session=$sessions[i] value=$election.session}>{$sessions[i]}
                </td>
            </tr>
        {/if}
        {/section}
        </table>    
        </td>
    </tr>    
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td>
    </tr>
</table>
</form>

