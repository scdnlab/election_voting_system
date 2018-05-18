<br>
<form action="session.php" method="post">
<table cellspacing="5" cellpadding="5" style="border: 1px solid" width="50%" align="center">
	<tr>
		<td align="center">
			<b>Active Sessions</b>
		</td>
	</tr>
	{section name=i loop=$sessions}
	{if $sessions[i].session}
		<tr bgcolor="#efefef">
			<td align="center">
				<input type="checkbox" name="session[]" value="{$sessions[i].session}" {insert name=session_checked session=$sessions[i].session value=$configuration.value}>{$sessions[i].session}
			</td>
		</tr>
	{/if}
	{/section}
	<tr>
		<td align="center">
			<input type="submit" name="submit" value="Update">
		</td>
	</tr>
</table>
</form>