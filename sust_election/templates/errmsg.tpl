{if $err ne ""}

        <table width="{if $width eq ''}450{else}{$width}{/if}" align="center"  cellpadding="0" cellspacing="0" border="0"  class="{if $class}{$class}{else}errmsg{/if}">
        <tr align="center">
        <td>
                <FIELDSET class="err">
                <LEGEND><img src="{$BASE_URL}/images/cancel.png"></LEGEND>
                        <table width="width="100%" cellpadding="10" cellspacing="0" border="0" align="center"  height="30">
                        <tr align="center">
                        <td class="err">
                                {$err}
                        </td>
                        </tr>
                        </table>
                </FIELDSET>
        </td>
        </tr>
        </table><br>

{elseif $msg ne ""}

        <table width="{if $width eq ''}450{else}{$width}{/if}" align="center"  cellpadding="0" cellspacing="0" border="0">
        <tr align="center">
        <td>
                <FIELDSET class="msg">
                <LEGEND><img src="{$BASE_URL}/images/accept.png"></LEGEND>
                        <table width="100%" cellpadding="10" cellspacing="0" border="0" align="center" class="{if $class}{$class}{else}errmsg{/if}">
                        <tr align="center">
                        <td>
                                {$msg}
                        </td>
                        </tr>
                        </table>
                </FIELDSET>
        </td>
        </tr>
        </table><br>
{/if}
