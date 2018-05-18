<table cellpadding ="0" cellspacing="5" border="0" width="50%" align="center">
    {section name=i loop=$theme}
    <tr align="center">
        <td>
            <b>{$theme[i].title}</b>
        </td>
    </tr>
    <tr>
        <td>
            <table cellpadding ="0" cellspacing="5" border="0" width="100%" style = "border:#efefef 1px solid" bgcolor="#F9F9F9">
                <tr align="center">
                    <td>
                        <img src="../{$theme[i].thumb_path}" width="100">
                    </td>
                </tr>

                <tr align="center">
                    <td>
                        {if $theme[i].is_default eq "No"}<a href="theme.php?id={$theme[i].id}">Set as default</a>{else}Default{/if}
                    </td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    {/section}
</table>
