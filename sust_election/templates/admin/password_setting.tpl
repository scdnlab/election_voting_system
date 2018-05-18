<br>
<a href="password_setting.php?action=generate" onclick="return confirm('Are you sure to generate new password ?')">Generate new password</a>
<br>&nbsp;
<form action="password_setting.php" method="post" name="password_form">
<table cellspacing="5" cellpadding="5" style="border: 1px solid" width="50%" align="center">
	<tr height="50">
        <td colspan="2" align="center"> <h2>View Password</h2></td>
    </tr>    
	<tr bgcolor="#efefef">
        <td width="25%">
			Session :
        </td>
		<td>
			<select name="session" id="session">
					{section name=i loop=$sessions}
					{if $sessions[i]}
						<option value="{$sessions[i]}" {if $request.paging.session eq $sessions[i]}selected{/if}>{$sessions[i]}</option>
					{/if}
					{/section}
			</select>			
		</td>
    </tr>
	<tr bgcolor="#efefef">
        <td>
			Section :
        </td>
		<td>
			<select name="section" id="section">
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
		</td>
    </tr>
	<tr>
        <td colspan="2" align="center">
			<input type="button" value="View" onclick="popupWindow_password();">
		</td>
    </tr>
</table>
</form>
