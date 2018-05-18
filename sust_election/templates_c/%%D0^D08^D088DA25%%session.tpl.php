<?php /* Smarty version 2.6.6, created on 2008-03-23 11:34:13
         compiled from admin/session.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'session_checked', 'admin/session.tpl', 13, false),)), $this); ?>
<br>
<form action="session.php" method="post">
<table cellspacing="5" cellpadding="5" style="border: 1px solid" width="50%" align="center">
	<tr>
		<td align="center">
			<b>Active Sessions</b>
		</td>
	</tr>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['sessions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<?php if ($this->_tpl_vars['sessions'][$this->_sections['i']['index']]['session']): ?>
		<tr bgcolor="#efefef">
			<td align="center">
				<input type="checkbox" name="session[]" value="<?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]['session']; ?>
" <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'session_checked', 'session' => $this->_tpl_vars['sessions'][$this->_sections['i']['index']]['session'], 'value' => $this->_tpl_vars['configuration']['value'])), $this); ?>
><?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]['session']; ?>

			</td>
		</tr>
	<?php endif; ?>
	<?php endfor; endif; ?>
	<tr>
		<td align="center">
			<input type="submit" name="submit" value="Update">
		</td>
	</tr>
</table>
</form>