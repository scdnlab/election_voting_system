<?php /* Smarty version 2.6.6, created on 2008-04-02 03:24:54
         compiled from admin/view_password.tpl */ ?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE>:: CONTROL PANEL :: <?php echo $this->_tpl_vars['SITE_NAME']; ?>
 ::</TITLE>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
</head>
<BODY>
<table cellspacing="0" cellpadding="0"  width="100%" align="center" border="0">
    <tr height="25">
        <td align="center" colspan="2">
            <b>Session : <?php echo $this->_tpl_vars['request']['session']; ?>
 (<?php echo $this->_tpl_vars['request']['section']; ?>
)</b>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['request']['action'] != 'print'): ?>
    <tr height="25">
        <td align="center" colspan="2">
            <a href="view_password.php?action=print&session=<?php echo $this->_tpl_vars['request']['session']; ?>
&section=<?php echo $this->_tpl_vars['request']['section']; ?>
">Print Password</a>
        </td>
    </tr>
    <?php endif; ?>
    <tr>
        <td valign="top">
            <table  cellpadding="3" cellspacing="10">
                <tr bgcolor="#bbbbbb" height="25">
                    <td width="90">
                        <b>Reg no</b>
                    </td>
                    <td width="90">
                        <b>Password</b>
                    </td>
                </tr>
                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['student']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                <tr>
                    <td>
                        <?php echo $this->_tpl_vars['student'][$this->_sections['i']['index']]['reg_no']; ?>

                    </td>
                    <td>
                        <?php echo $this->_tpl_vars['student'][$this->_sections['i']['index']]['password']; ?>

                    </td>
                </tr>                
                <?php endfor; endif; ?>
            </table>
        </td>
    </tr>
</table>
<?php if ($this->_tpl_vars['request']['action'] == 'print'): ?>
<?php echo '
<script language="javascript">
function print_now()
{
    window.print();
}
setTimeout(\'print_now()\',1000);
</script>
'; ?>

<?php endif; ?>
</body>
</html>