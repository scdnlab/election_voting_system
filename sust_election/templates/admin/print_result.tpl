<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE>:: CONTROL PANEL :: {$SITE_NAME} ::</TITLE>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
</head>
<BODY>
<br>
<form action="candidate.php" method="post">
<table width="100%" style="border: 1px solid" cellspacing="2" cellpadding="2">
    <tr>
        <td align="center">
            <h1>{$election.title}</h1>
        </td>
    </tr>
    {section name=i loop=$candidate_category}
    <tr bgcolor="#dddddd" height="25">
        <td align="center">
            <b>{$candidate_category[i].title}</b>
        </td>
    </tr>
    <tr>
        <td>
            {insert name=get_candidate category_id=$candidate_category[i].id assign=candidate}

                    {section name=j loop=$candidate}

                        <table  border="0" cellspacing="1" cellpadding="1">
                            <tr>
                                <td>
                                    <b>Name :</b>
                                </td>
                                <td>
                                    {insert name=get_value table=student field=name id=$candidate[j].student_id}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Reg no :</b>
                                </td>
                                <td>
                                    {insert name=get_value table=student field=reg_no id=$candidate[j].student_id}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Vote :</b>
                                </td>
                                <td>
                                    <b>{insert name=count_vote candidate_id=$candidate[j].id}</b>
                                </td>
                            </tr>
<!--
                            <tr>
                                <td>
                                    <b>Percentage :</b>
                                </td>
                                <td>
                                    {insert name=count_vote_percentage candidate_id=$candidate[j].id candidate_category_id=$candidate[j].candidate_category_id}
                                </td>
                            </tr>
-->
                        </table>
						<table  border="0" height="15">
                            <tr>
                                <td>
								</td>
							</tr>
						</table>

                    {/section}

        </td>
    </tr>
    {/section}
    <tr>
        <td>&nbsp</td>
    </tr>
</table>
</form>
{literal}
<script language="javascript">
function print_now()
{
    window.print();
}
setTimeout('print_now()',1000);
</script>
{/literal}
</body>
</html>
