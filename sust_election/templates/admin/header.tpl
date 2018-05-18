<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE>:: CONTROL PANEL :: {$PROJECT_NAME} ::</TITLE>

<meta name="KeyWords" content="">
<meta name="author" content="Hasan Md Suhag Chowdhury">
<meta name="Description" content="">
<meta http-equiv="Content-Language" content="en-us" />
<meta name="language" content="en">
<meta http-equiv="content-language" content="en">

<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/main.js"></script>
<script language="JavaScript" src='../js/innovaeditor.js'></script>
<script language="JavaScript" src='../js/jquery-1.4.2.js'></script>
</head>
<BODY>
    <div id="border-top">
        <div>
            <div>
                <span class="title" ><font color="#ffffff" face="Arial Narrow">{$PROJECT_NAME}</font> Administration</span>
                {if $smarty.session.ADMIN_USERNAME}
                <span class="admin">Current User: <b>{$smarty.session.ADMIN_USERNAME}</b></span>
                {/if}
                <span class="date">{insert name=show_day assign=day}{insert name=show_date assign=date}{$day} , {$date|date_format}</span>
            </div>
        </div>
    </div>
    <div>
        {if $session.ADMIN_ID ne "" && $top_column ne "hide_top_menu"}
        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#1F456E" border="0">
        <tr>
            <td height="20" align="center" colspan="3">
                <table >
                <tr><td>

                        <b>
                        {insert name=get_menu assign=menu}
                        {section name=i loop=$menu}
                            <a href="{insert name=show_menu_url url=$menu[i].url menu_id=$menu[i].id}"class="w">{$menu[i].title}</a> &nbsp&nbsp&nbsp
                        {/section}
                        </b>

                </td></tr>
                </table>
        </td></tr>
        </table>
        {/if}
    </div>
    <div id="content-box">

<TABLE WIDTH="100%" height="400" BORDER=0 CELLPADDING=1 CELLSPACING=0 ALIGN="center" bgcolor="#FFFFFF">
<tr><td valign="top">

        <table cellpadding="5" cellspacing="5" width="100%" bgcolor="#FFFFFF">
        <tr height="370">
        {if $request.menu_id}
            {insert name=session_menu_id menu_id=$request.menu_id}
            {insert name=get_submenu assign=submenu menu_id=$request.menu_id}
        {else}
            {insert name=get_submenu assign=submenu menu_id=$session.MENU_ID}
        {/if}
           {if $session.ADMIN_ID ne "" && $submenu[0].id ne ""}
            <td width="160" bgcolor="#efefef" valign="top" align="center" >

                <table cellpadding ="2" cellspacing="3" border="0" width="100%" >

                            {if $request.menu_id}                                
                                <tr>
                                        <td>
                                                <b>{insert name=show_menu menu_id=$request.menu_id}</b>
                                        </td>
                                </tr>
                            {else}
                                <tr>
                                        <td>
                                                <b>{insert name=show_menu menu_id=$session.MENU_ID}</b>
                                        </td>
                                </tr>
                            {/if}
                        
                        {section name=i loop=$submenu}
                        <tr>
                                <td >
                                        {if $request.menu_id ne "" && $smarty.section.i.index eq "0"}
                                            <img src="images/right.png" border="0"  width="15"> &nbsp<a href="{insert name=show_sub_url url=$submenu[i].url sub_id=$submenu[i].id}" ><b>{$submenu[i].title}</b></a>
                                        {elseif $request.menu_id eq "" && $submenu[i].id eq $request.sub_id}
                                            {insert name=session_sub_id sub_id=$request.sub_id}
                                            <img src="images/right.png" border="0"  width="15"> &nbsp<a href="{insert name=show_sub_url url=$submenu[i].url sub_id=$submenu[i].id}" ><b>{$submenu[i].title}</b></a>
                                        {elseif $request.menu_id eq "" && $submenu[i].id eq $session.SUB_ID && $request.sub_id eq ""}
                                            <img src="images/right.png" border="0"  width="15"> &nbsp<a href="{insert name=show_sub_url url=$submenu[i].url sub_id=$submenu[i].id}" ><b>{$submenu[i].title}</b></a>
                                        {else}
                                            <img src="images/right.png" border="0" width="15"> &nbsp<a href="{insert name=show_sub_url url=$submenu[i].url sub_id=$submenu[i].id}">{$submenu[i].title}</a>
                                        {/if}
                                </td>
                        </tr>
                        {/section}
                        {/if}
                </table>
            </td>

            <td align="center" valign="top">
            {include file="errmsg.tpl" width="400"}



