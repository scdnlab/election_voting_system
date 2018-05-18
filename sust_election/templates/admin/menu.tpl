{if $request.action eq "sub_menu"}
<table width="100%" cellpadding="0" cellspacing="5" border="0">
    <tr>
        <td colspan="5" align="center">
            <b> {insert name=show_menu menu_id=$request.menu_id}</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu.php">view menu's</a>
        </td>
        <td colspan="3" align="right">
            <a href="menu.php?action=add_submenu&menu_id={$request.menu_id}"> Add new submenu </a>
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
            <a href="menu.php?action={$request.action}&menu_id={$request.menu_id}&a=up&pid={$admin_submenu[i].id}"><img src="../images/up.gif" border="0"></a> &nbsp <a href="menu.php?action={$request.action}&menu_id={$request.menu_id}&a=down&pid={$admin_submenu[i].id}"><img src="../images/down.gif" border="0"></a>
        </td>
        <td>
            <a href="menu.php?action=add_submenu&submenu_id={$admin_submenu[i].id}&menu_id={$request.menu_id}">Edit</a> | {insert name=delete id=$admin_submenu[i].id}
        </td>
    </tr>
    {/section}
</table>

{elseif $request.action eq "add_submenu"}
<form action="menu.php?action={$request.action}&menu_id={$request.menu_id}{if $request.submenu_id}&submenu_id={$request.submenu_id}{/if}" method="post">
<input type="hidden" name="menu[parent_id]" value="{$request.menu_id}">
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
            <input type="text" name="menu[title]" value="{$admin_submenu.title}" size="30">
        </td>
    </tr>
    <tr>
        <td>
            <b>URL</b>
        </td>
        <td>
            <input type="text" name="menu[url]" value="{$admin_submenu.url}" size="30">
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

{elseif $request.action eq "add_menu"}
<form action="menu.php?action={$request.action}{if $request.menu_id}&menu_id={$request.menu_id}{/if}" method="post">
<table width="60%" cellpadding="0" cellspacing="4" border="0">
    <tr>
        <td colspan="2" align="center">
            <b>Add / Edit Menu</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu.php">view menu's</a>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="menu[title]" value="{$admin_menu.title}" size="30">
        </td>
    </tr>
    <tr>
        <td>
            <b>URL</b>
        </td>
        <td>
            <input type="text" name="menu[url]" value="{$admin_menu.url}" size="30">
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


{else}

<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td colspan="5">
            <a href="menu.php?action=add_menu"> Add new menu </a>
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
           <a href="menu.php?action=sub_menu&menu_id={$admin_menu[i].id}"> view({insert name=total_submenu id=$admin_menu[i].id})</a>
        </td>
        <td>
            <a href="menu.php?a=up&pid={$admin_menu[i].id}"><img src="../images/up.gif" border="0"></a> &nbsp <a href="menu.php?a=down&pid={$admin_menu[i].id}"><img src="../images/down.gif" border="0"></a>
        </td>
        <td>
            <a href="menu.php?action=add_menu&menu_id={$admin_menu[i].id}">Edit</a> | {insert name=delete id=$admin_menu[i].id}
        </td>
    </tr>
    {/section}
</table>
{/if}

