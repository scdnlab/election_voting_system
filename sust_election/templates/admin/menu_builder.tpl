{if $request.action eq "add_menu"}
<form action="menu_builder.php?action={$request.action}{if $request.menu_id}&menu_id={$request.menu_id}{/if}" method="post">
<table width="60%" cellpadding="0" cellspacing="4" border="0">
    <tr>
        <td colspan="2" align="center">
            <b>Add / Edit Menu</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu_builder.php">view menu's</a>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="admin_menu[title]" value="{$admin_menu.title}" size="30">
        </td>
    </tr>
    <tr>
        <td>
            <b>URL</b>
        </td>
        <td>
            <input type="text" name="admin_menu[url]" value="{$admin_menu.url}" size="30">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="menu_submit" value="Submit">
        </td>
    </tr>
</table>
</form>






{elseif $request.action eq "add_submenu"}
<form action="menu_builder.php?action={$request.action}&menu_id={$request.menu_id}{if $request.submenu_id}&submenu_id={$request.submenu_id}{/if}" method="post">
<input type="hidden" name="admin_submenu[menu_id]" value="{$request.menu_id}">
<table width="60%" cellpadding="0" cellspacing="4" border="0">
    <tr>
        <td colspan="2" align="center">
            <b>Add / Edit Submenu</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu_builder.php?action=sub_menu&menu_id={$request.menu_id}">view submenu's</a>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="admin_submenu[title]" value="{$admin_submenu.title}" size="30">
        </td>
    </tr>
    <tr>
        <td>
            <b>URL</b>
        </td>
        <td>
            <input type="text" name="admin_submenu[url]" value="{$admin_submenu.url}" size="30">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submenu_submit" value="Submit">
        </td>
    </tr>
</table>
</form>








{elseif $request.action eq "sub_menu"}
<table width="100%" cellpadding="0" cellspacing="5" border="0">
    <tr>
        <td colspan="5" align="center">
            <b> {insert name=show_menu menu_id=$request.menu_id}</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu_builder.php">view menu's</a>
        </td>
        <td colspan="3" align="right">
            <a href="menu_builder.php?action=add_submenu&menu_id={$request.menu_id}"> Add new submenu </a>
        </td>
    </tr>
    <tr bgcolor="#bbbbbb" align="center">
        <td>
            #
        </td>
        <td>
            Title
        </td>
        <td>
            URL
        </td>
        <td>
            Sort
        </td>
        <td>
            Action
        </td>
    </tr>
    {section name=i loop=$admin_submenu}
    <tr align="center">
        <td>
            {$smarty.section.i.index+1}
        </td>
        <td>
            {$admin_submenu[i].title}
        </td>
        <td>
            {$admin_submenu[i].url}
        </td>
        <td>
            <a href="menu_builder.php?action={$request.action}&menu_id={$request.menu_id}&a=up&pid={$admin_submenu[i].id}"><img src="../images/up.gif" border="0"></a> &nbsp <a href="menu_builder.php?action={$request.action}&menu_id={$request.menu_id}&a=down&pid={$admin_submenu[i].id}"><img src="../images/down.gif" border="0"></a>
        </td>
        <td>
            <a href="menu_builder.php?action=add_submenu&submenu_id={$admin_submenu[i].id}&menu_id={$request.menu_id}">Edit</a> | <a href="menu_builder.php?action={$request.action}&delete={$admin_submenu[i].id}&menu_id={$request.menu_id}" onclick="return confirm('Are you sure to delete this submenu ?');">Delete</a>
        </td>
    </tr>
    {/section}
</table>










{else}
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td colspan="5">
            <a href="menu_builder.php?action=add_menu"> Add new menu </a>
        </td>
    </tr>
    <tr bgcolor="#bbbbbb" align="center">
        <td>
            #
        </td>
        <td>
            Title
        </td>
        <td>
            URL
        </td>
        <td>
            Sub menu
        </td>
        <td>
        		Sort
        </td>
        <td>
            Action
        </td>
    </tr>
    {section name=i loop=$admin_menu}
    <tr align="center">
        <td>
            {$smarty.section.i.index+1}
        </td>
        <td>
            {$admin_menu[i].title}
        </td>
        <td>
            {$admin_menu[i].url}
        </td>
        <td>
           <a href="menu_builder.php?action=sub_menu&menu_id={$admin_menu[i].id}"> view({insert name=count_submenu menu_id=$admin_menu[i].id})</a>
        </td>
        <td>
            <a href="menu_builder.php?a=up&pid={$admin_menu[i].id}"><img src="../images/up.gif" border="0"></a> &nbsp <a href="menu_builder.php?a=down&pid={$admin_menu[i].id}"><img src="../images/down.gif" border="0"></a>
        </td>        
        <td>
            <a href="menu_builder.php?action=add_menu&menu_id={$admin_menu[i].id}">Edit</a> | <a href="menu_builder.php?delete={$admin_menu[i].id}" onclick="return confirm('Are you sure to delete this menu ?');">Delete</a>
        </td>
    </tr>
    {/section}
</table>
{/if}
