<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE>:: CONTROL PANEL :: {$SITE_NAME} ::</TITLE>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
</head>
<BODY>
<table cellspacing="0" cellpadding="0"  width="100%" align="center" border="0">
    <tr>
        <td align="center" colspan="2">
            <b>{$election.title}</b>
        </td>
    </tr>
    <tr height="25">
        <td align="center" colspan="2">
            <b>Session : {$request.session}</b>
        </td>
    </tr>
    {if $request.action ne "print"}
    <tr height="25">
        <td align="center" colspan="2">
            <a href="generate_password.php?action=print&election_id={$request.election_id}&session={$request.session}">Print Password</a> | <a href="generate_password.php?action=generate&election_id={$request.election_id}&session={$request.session}" onclick="return confirm('Are you sure to generate new password ?')">Generate new password</a>
        </td>
    </tr>
    {/if}
    <tr>
        <td valign="top">
            <table>
                <tr bgcolor="#bbbbbb" height="25">
                    <td width="90">
                        <b>Reg no</b>
                    </td>
                    <td width="90">
                        <b>Password</b>
                    </td>
                </tr>
                {section name=i loop=$student}
                <tr>
                    <td>
                        {$student[i].reg_no}
                    </td>
                    <td>
                        {$student[i].password}
                    </td>
                </tr>
                {if $smarty.section.i.index eq 59}
            </table>
        </td>
        <td valign="top">
            <table>
                <tr bgcolor="#bbbbbb" height="25">
                    <td width="50%">
                        <b>Reg no</b>
                    </td>
                    <td width="50%">
                        <b>Password</b>
                    </td>
                </tr>
                {/if}
                {/section}
            </table>
        </td>
    </tr>
</table>
{if $request.action eq "print"}
{literal}
<script language="javascript">
function print_now()
{
    window.print();
}
setTimeout('print_now()',1000);
</script>
{/literal}
{/if}
</body>
</html>
