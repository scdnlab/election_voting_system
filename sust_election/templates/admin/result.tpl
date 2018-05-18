<br>
<form action="candidate.php" method="post">
<table width="100%" style="border: 1px solid" cellspacing="2" cellpadding="2">
    <tr height="30">
        <td align="center">
            <a href="javascript:void(0);" onclick="popupWindow_result('print_result.php?election_id={$request.id}');"><b>Print result</b></a> | <b><a href="result.php?delete_vote={$request.id}" onclick="return confirm('Are you sure to delete all votes of this election?');">Delete All Votes</a></b>
        </td>
    </tr>
    <tr>
        <td align="center">
            <h1>{$election.title}</h1>
        </td>
    </tr>
    {if $election.status eq "Completed"}
    {section name=i loop=$candidate_category}
    <tr bgcolor="#dddddd">
        <td align="center">
            {$candidate_category[i].title}
        </td>
    </tr>
    <tr>
        <td>
            {insert name=get_candidate category_id=$candidate_category[i].id assign=candidate}
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                    {section name=j loop=$candidate}
                    <td width="33%" align="center">
                        <table  border="0" cellspacing="2" cellpadding="2">
                            <tr>
                                <td colspan="2">
                                    {insert name=get_value table=student field=image_id id=$candidate[j].student_id assign=student_image_id}
                                    {insert name=get_image id=$student_image_id assign=image}{if $image[0].thumb_path}<img src='../{$image[0].thumb_path}' height='100'>{else}<img src='../images/photo_no.gif' height='100'>{/if}
                                </td>
                            </tr>
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
                                    {insert name=count_vote candidate_id=$candidate[j].id}
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
                    </td>
                    {if ($smarty.section.j.index+1)%3 eq 0}
                    </tr>
                    <tr>
                    {/if}
                    {/section}
                </tr>
            </table>
        </td>
    </tr>
    {/section}
    {/if}
    <tr>
        <td>&nbsp</td>
    </tr>
</table>
</form>
