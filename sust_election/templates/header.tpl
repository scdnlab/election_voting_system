<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE>{$PROJECT_NAME}</TITLE>

<meta name="KeyWords" content="">
<meta name="author" content="Hasan Mohammad">
<meta name="Description" content="">
<meta http-equiv="Content-Language" content="en-us" />
<meta name="language" content="en">
<meta http-equiv="content-language" content="en">

<link href="css/admin.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/main.js"></script>
</head>
<BODY>
    <div id="border-top">
        <div>
            <div>
                <span class="title" ><font color="#ffffff" face="Arial Narrow">{if $election.date eq $current_date} {$election.title}{else}{$PROJECT_NAME} {/if}</font>  </span>
                <span class="date">{insert name=show_day assign=day}{insert name=show_date assign=date}{$day} , {$date|date_format}</span>
            </div>
        </div>
    </div>

    <div id="content-box">

<TABLE WIDTH="100%" height="400" BORDER=0 CELLPADDING=1 CELLSPACING=0 ALIGN="center" bgcolor="#FFFFFF">
<tr><td valign="top">

        <table cellpadding="5" cellspacing="5" width="100%" bgcolor="#FFFFFF">



            <td align="center" valign="top">
            {include file="errmsg.tpl" width="400"}



