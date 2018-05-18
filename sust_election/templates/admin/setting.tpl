<table cellpadding ="0" cellspacing="0" border="0" width="100%">
        <tr height="280">
                <td align="center" valign="top">
                        <form method="post" action="setting.php">
                        <table cellpadding ="0" cellspacing="5" border="0" width="98%">
                                <tr>
                                        <td colspan="2">
                                                <img src="images/settings2.png" width="30" align="absbottom"> <b>Edit {if $request.group_title ne ""}{$request.group_title}{else}Project Settings{/if}</b>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="2" align="right">
                                                <b><font color="red">* Required Information</font></b>
                                        </td>
                                </tr>
                                {section name=i loop=$configuration}
                                <tr>
                                        <td width="180">
                                                <b>{$configuration[i].title} :</b>
                                        </td>
                                        <td>
                                                {if $configuration[i].type == "Textbox"}
                                                <input type="text" name="{$configuration[i].key}" value="{$configuration[i].value}" size="35">&nbsp;<font color='#ff3300'>*</font>
                                                {/if}
                                                {if $configuration[i].type == "Textarea"}
                                                <textarea name="{$configuration[i].key}" rows="7" cols="55">{$configuration[i].value}</textarea>&nbsp;<font color='#ff3300'>*</font>
                                                {/if}
                                                {if $configuration[i].type == "Selectbox"}
                                                <select name="{$configuration[i].key}">
                                                {insert name=configuration_select_box options=$configuration[i].options value=$configuration[i].value}
                                                </select>&nbsp;<font color='#ff3300'>*</font>
                                                {/if}
                                                {if $configuration[i].type == "Boolean"}
                                                <input type="radio" name="{$configuration[i].key}" value="No" checked>No <input type="radio" name="{$configuration[i].key}" value="Yes" {if $configuration[i].value eq "Yes"}checked{/if}>Yes &nbsp;<font color='#ff3300'>*</font>
                                                {/if}
                                        </td>
                                </tr>
                                {/section}
                                <tr>
                                        <td>
                                        </td>
                                        <td>
                                                <input type="submit" name="submit" value="Update">
                                        </td>
                                </tr>
                        </table>
                        </form>
                </td>
        </tr>
</table>

