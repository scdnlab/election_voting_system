<h1>{$election.title}</h1>
<table width="100%" style="border:1px solid" cellpadding="5" cellspacing="0">
    <tr bgcolor="#efefef">
        <td align="center">
            <b>Voter statistics</b>
        </td>
    </tr>
    <tr>
        <td>
            Total voter : {insert name=total_voter election_id=$election.id}<br>
            Voter presented: {insert name=count_total_vote election_id=$election.id}
        </td>
    </tr>
    {section name=i loop=$sessions}
    {if $sessions[i]}
    <tr>
        <td>
            <b>{$sessions[i]}</b>                        
        </td>
    </tr>
    <tr>
        <td>
            Voter : {insert name=total_voter election_id=$election.id session=$sessions[i]}<br>
            Presented: {insert name=get_value table=vote_count field=total_present sql="select count(distinct(student_id)) as total_present from vote_count,student where election_id="|cat:$election.id|cat:" and vote_count.student_id=student.id and student.session='"|cat:$sessions[i]|cat:"'"} 
        </td>
    </tr>
    {/if}
    {/section}
</table>

<table width="100%" style="border:1px solid" cellpadding="5" cellspacing="0">
    <tr bgcolor="#efefef">
        <td align="center">
            <b>Candidate statistics</b>
        </td>
    </tr>
    <tr>
        <td align="center">
            <table width="90%" style="border:1px solid" cellpadding="0" cellspacing="0">
                {section name=i loop=$candidate_category}
                <tr>
                    <td align="center">
                        <b>{$candidate_category[i].title}</b>
                    </td>
                </tr>
                {insert name=get_candidate category_id=$candidate_category[i].id assign=candidate}
                {section name=j loop=$candidate}
                <tr>
                    <td>
                        Name :{insert name=get_value table=student field=name id=$candidate[j].student_id}<br>
                        Reg no :{insert name=get_value table=student field=reg_no id=$candidate[j].student_id}<br>
                        Vote : {insert name=count_vote candidate_id=$candidate[j].id}
                    </td>
                </tr>
                <tr>
                    <td>
                        {section name=k loop=$sessions}{if $sessions[k]}{$sessions[k]}: {insert name=get_value table=vote_count field=total_present sql="select count(distinct(student_id)) as total_present from vote_count,student where election_id="|cat:$election.id|cat:" and vote_count.student_id=student.id and student.session='"|cat:$sessions[k]|cat:"' and student.status='Active' and candidate_id="|cat:$candidate[j].id} {/if}{/section}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                {/section}
                {/section}
            </table>
        </td>
    </tr>
</table>









