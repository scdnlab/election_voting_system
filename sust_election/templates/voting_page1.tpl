<html>
<head><title>{$election.title}</title>


{literal}
<style  type="text/css">
BODY {
        scrollbar-face-color: #02152D;
        scrollbar-shadow-color: #02152D;
        scrollbar-highlight-color: #02152D;
        scrollbar-3dlight-color: #02152D;
        scrollbar-darkshadow-color: #02152D;
        scrollbar-track-color: #02152D;
        scrollbar-arrow-color: #02152D;

        COLOR: #111111; FONT-FAMILY: Verdana
}
</style>
{/literal}

</head>
<body bgcolor="#03152D" style="margin:0;">

{if $election.date eq $current_date}
<div>
    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"  width="100%" height="100%" id="Untitled" align="middle" >
        <param name="allowScriptAccess" value="sameDomain" />
        <param name="movie" value="{$BASE_URL}/login.swf?election_title={$election.title}" />
        <param name="quality" value="high" /><param name="bgcolor" value="#03152D" />
        <embed src="{$BASE_URL}/login.swf?election_title={$election.title}" quality="hig" bgcolor="#03152D" width="100%" height="100%" name="Untitled" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
    </object>
</div>
{elseif $election.date eq ""}
<table width="100%" height="300" >
    <tr>
        <td colspan="2" align="center">
            <h1><font color="#ffffff">Sorry, no new election found</font></h1>
        </td>
    </tr>
<tr>
</table>
{else}
<table width="100%" height="300" >
    <tr>
        <td colspan="2" align="center">
            <h1><font color="#ffffff">{$election.title}</font></h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <h2><font color="#ffffff">Election date : {$election.date}</font></h2>
        </td>
    </tr>
<tr>
</table>
{/if}
</body>
</html>
