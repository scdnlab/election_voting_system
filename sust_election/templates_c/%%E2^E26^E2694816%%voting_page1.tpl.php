<?php /* Smarty version 2.6.6, created on 2010-10-04 15:01:18
         compiled from voting_page1.tpl */ ?>
<html>
<head><title><?php echo $this->_tpl_vars['election']['title']; ?>
</title>


<?php echo '
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
'; ?>


</head>
<body bgcolor="#03152D" style="margin:0;">

<?php if ($this->_tpl_vars['election']['date'] == $this->_tpl_vars['current_date']): ?>
<div>
    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"  width="100%" height="100%" id="Untitled" align="middle" >
        <param name="allowScriptAccess" value="sameDomain" />
        <param name="movie" value="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/login.swf?election_title=<?php echo $this->_tpl_vars['election']['title']; ?>
" />
        <param name="quality" value="high" /><param name="bgcolor" value="#03152D" />
        <embed src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/login.swf?election_title=<?php echo $this->_tpl_vars['election']['title']; ?>
" quality="hig" bgcolor="#03152D" width="100%" height="100%" name="Untitled" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
    </object>
</div>
<?php elseif ($this->_tpl_vars['election']['date'] == ""): ?>
<table width="100%" height="300" >
    <tr>
        <td colspan="2" align="center">
            <h1><font color="#ffffff">Sorry, no new election found</font></h1>
        </td>
    </tr>
<tr>
</table>
<?php else: ?>
<table width="100%" height="300" >
    <tr>
        <td colspan="2" align="center">
            <h1><font color="#ffffff"><?php echo $this->_tpl_vars['election']['title']; ?>
</font></h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <h2><font color="#ffffff">Election date : <?php echo $this->_tpl_vars['election']['date']; ?>
</font></h2>
        </td>
    </tr>
<tr>
</table>
<?php endif; ?>
</body>
</html>