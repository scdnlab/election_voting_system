<br>
<form action="add_candidate_category.php" method="post" enctype="multipart/form-data" name="candidate_form">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add Candidate Category</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Election</b>
        </td>
        <td>
            <select name="candidate_category[election_id]">
                <option value="">--Select--</option>
                {insert name=get_option table=election field=title value_field=id value=$request.candidate_category.election_id condition="status='Inactive'"}
            </select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="candidate_category[title]" size="35" value="{$request.candidate_category.title}"
        </td>
    </tr>
	<tr bgcolor="#efefef">
		<td>
			<b>Eligible Session</b>
		</td>
		<td>
			<select name="candidate_category[session]">
					<option value="">--All--</option>
					{section name=i loop=$sessions}
					{if $sessions[i]}
						<option value="{$sessions[i]}" {if $request.candidate_category.session eq $sessions[i]}selected{/if}>{$sessions[i]}</option>
					{/if}
					{/section}
			</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
			<td>
				<b>Eligible Section</b>
			</td>
			<td>
				<select name="candidate_category[section]">
						<option value="">--All--</option>
						<option value="A" {if $request.candidate_category.section eq "A"}selected{/if}>A</option>
						<option value="B" {if $request.candidate_category.section eq "B"}selected{/if}>B</option>
				</select>
			</td>
	</tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Order Number</b>
        </td>
        <td>
            <input type="text" size="10" name="candidate_category[order]" value="{$request.candidate_category.order}"
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center"><input type="submit" name="add_candidate_category" value="Submit"></td>
    </tr>
</table>
</form>

