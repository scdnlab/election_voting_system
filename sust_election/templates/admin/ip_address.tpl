<form action="ip_address.php" method="post">
<table width="100%" cellpadding='3' cellspacing='3' style="border:1px solid #efefef">
	<tr>
		<td colspan="2">
			<h3>Add New IP Address</h3>
		</td>
	</tr>
	<tr>
		<td width="20%">
			PC Name :
		</td>
		<td>
			 <input type="text" name="ip_address[pc_name]">
		</td>
	</tr>
	<tr>
		<td>
			IP Address :
		</td>
		<td>
			 <input type="text" name="ip_address[ip_address]">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Add">
		</td>
	</tr>
</table>
</form>
<br><br>
<table width="100%" cellpadding='3' cellspacing='3' style="border:1px solid #efefef">
	<tr align="center" bgcolor="#efefef">
		<td>
			<b>PC name</b>
		</td>
		<td>
			<b>IP address</b>
		</td>
		<td>
			<b>Status</b>
		</td>
		<td>
			<b>Delete</b>
		</td>
	</tr>
	{section name=i loop=$ip_address}
	<tr align="center">
		<td>
			{$ip_address[i].pc_name}
		</td>
		<td>
			{$ip_address[i].ip_address}
		</td>
		<td>
			{insert name=status_update format="Active,Inactive" id=$ip_address[i].id status=$ip_address[i].status}
		</td>
		<td>
			{insert name=delete id=$ip_address[i].id}
		</td>
	</tr>
	{/section}
</table>