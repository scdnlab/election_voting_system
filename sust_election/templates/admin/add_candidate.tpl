<br>
<form action="add_candidate.php" method="post" enctype="multipart/form-data" name="candidate_form">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add Candidate</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Election</b>
        </td>
        <td>
            <select name="candidate[election_id]" onchange="javascript:document.forms.candidate_form.submit();">
                <option value="">--Select--</option>
                {insert name=get_option table=election field=title value_field=id value=$request.candidate.election_id condition="status='Inactive'"}
            </select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Candidate Category</b>
        </td>
        <td>
            <select name="candidate[candidate_category_id]">
                <option value="">--Select--</option>
                {if $request.candidate.election_id}{insert name=get_option table=candidate_category field=title value_field=id value=$request.candidate.candidate_category_id condition="election_id="|cat:$request.candidate.election_id}{/if}
            </select>
        </td>
    </tr>
<!--
	<tr bgcolor="#efefef">
        <td width="35%">
            <b>Ballot name</b>
        </td>
        <td>
            <input type="text" name="candidate[ballot_name]" value="{$request.candidate.ballot_name}">
        </td>
    </tr>
-->
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Student reg no</b>
        </td>
        <td>
            <input type="text" name="reg_no" value="{$request.reg_no}">
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center"><input type="submit" name="add_candidate" value="Submit"></td>
    </tr>
</table>
</form>

