<?php /* Smarty version 2.6.6, created on 2008-03-23 11:34:09
         compiled from admin/setting.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'configuration_select_box', 'admin/setting.tpl', 30, false),)), $this); ?>
<table cellpadding ="0" cellspacing="0" border="0" width="100%">
        <tr height="280">
                <td align="center" valign="top">
                        <form method="post" action="setting.php">
                        <table cellpadding ="0" cellspacing="5" border="0" width="98%">
                                <tr>
                                        <td colspan="2">
                                                <img src="images/settings2.png" width="30" align="absbottom"> <b>Edit <?php if ($this->_tpl_vars['request']['group_title'] != ""):  echo $this->_tpl_vars['request']['group_title'];  else: ?>Project Settings<?php endif; ?></b>
                                        </td>
                                </tr>
                                <tr>
                                        <td colspan="2" align="right">
                                                <b><font color="red">* Required Information</font></b>
                                        </td>
                                </tr>
                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['configuration']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <td width="180">
                                                <b><?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['title']; ?>
 :</b>
                                        </td>
                                        <td>
                                                <?php if ($this->_tpl_vars['configuration'][$this->_sections['i']['index']]['type'] == 'Textbox'): ?>
                                                <input type="text" name="<?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['key']; ?>
" value="<?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['value']; ?>
" size="35">&nbsp;<font color='#ff3300'>*</font>
                                                <?php endif; ?>
                                                <?php if ($this->_tpl_vars['configuration'][$this->_sections['i']['index']]['type'] == 'Textarea'): ?>
                                                <textarea name="<?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['key']; ?>
" rows="7" cols="55"><?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['value']; ?>
</textarea>&nbsp;<font color='#ff3300'>*</font>
                                                <?php endif; ?>
                                                <?php if ($this->_tpl_vars['configuration'][$this->_sections['i']['index']]['type'] == 'Selectbox'): ?>
                                                <select name="<?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['key']; ?>
">
                                                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'configuration_select_box', 'options' => $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['options'], 'value' => $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['value'])), $this); ?>

                                                </select>&nbsp;<font color='#ff3300'>*</font>
                                                <?php endif; ?>
                                                <?php if ($this->_tpl_vars['configuration'][$this->_sections['i']['index']]['type'] == 'Boolean'): ?>
                                                <input type="radio" name="<?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['key']; ?>
" value="No" checked>No <input type="radio" name="<?php echo $this->_tpl_vars['configuration'][$this->_sections['i']['index']]['key']; ?>
" value="Yes" <?php if ($this->_tpl_vars['configuration'][$this->_sections['i']['index']]['value'] == 'Yes'): ?>checked<?php endif; ?>>Yes &nbsp;<font color='#ff3300'>*</font>
                                                <?php endif; ?>
                                        </td>
                                </tr>
                                <?php endfor; endif; ?>
                                <tr>
                                        <td>
                                        </td>
                                        <td>
                                                <input type="submit" name="submit" value="Update">
                                        </td>
                                </tr>
                        </table>
                        </form>
                </td>
        </tr>
</table>
