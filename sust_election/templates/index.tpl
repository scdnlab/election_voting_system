<table width="100%">
    {if $election.id}
    <tr>
        <td align="center">
            <input type="button" name="" value="Go to voting page" onclick="window.open('{$theme.url}','popupWindow_voting_page','toolbar=no,location=no,fullscreen=yes,directories=no,status=no,menubar=1,scrollbars={if $theme.id eq 1}no{else}yes{/if},resizable=1,copyhistory=no,width=1000,height=1000,screenX=200,screenY=100,top=100,left=200');">
        </td>
    </tr>
    {/if}
    {section name=i loop=$elections}
    <tr>
        <td>
            <b>{$elections[i].title}</b>
        </td>
    </tr>
    {/section}
</table>
