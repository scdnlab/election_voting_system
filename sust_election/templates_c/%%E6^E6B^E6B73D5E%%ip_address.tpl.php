<?php /* Smarty version 2.6.6, created on 2008-06-15 11:21:35
         compiled from admin/ip_address.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'status_update', 'admin/ip_address.tpl', 57, false),array('insert', 'delete', 'admin/ip_address.tpl', 60, false),)), $this); ?>
<form action="ip_address.php" method="post">
<table width="100%" cellpadding='3' cellspacing='3' style="border:1px solid #efefef">
	<tr>
		<td colspan="2">
			<h3>Add New IP Address</h3>
		</td>
	</tr>
	<tr>
		<td width="20%">
			PC Name :
		</td>
		<td>
			 <input type="text" name="ip_address[pc_name]">
		</td>
	</tr>
	<tr>
		<td>
			IP Address :
		</td>
		<td>
			 <input type="text" name="ip_address[ip_address]">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Add">
		</td>
	</tr>
</table>
</form>
<br><br>
<table width="100%" cellpadding='3' cellspacing='3' style="border:1px solid #efefef">
	<tr align="center" bgcolor="#efefef">
		<td>
			<b>PC name</b>
		</td>
		<td>
			<b>IP address</b>
		</td>
		<td>
			<b>Status</b>
		</td>
		<td>
			<b>Delete</b>
		</td>
	</tr>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ip_address']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<tr align="center">
		<td>
			<?php echo $this->_tpl_vars['ip_address'][$this->_sections['i']['index']]['pc_name']; ?>

		</td>
		<td>
			<?php echo $this->_tpl_vars['ip_address'][$this->_sections['i']['index']]['ip_address']; ?>

		</td>
		<td>
			<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'status_update', 'format' => "Active,Inactive", 'id' => $this->_tpl_vars['ip_address'][$this->_sections['i']['index']]['id'], 'status' => $this->_tpl_vars['ip_address'][$this->_sections['i']['index']]['status'])), $this); ?>

		</td>
		<td>
			<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'delete', 'id' => $this->_tpl_vars['ip_address'][$this->_sections['i']['index']]['id'])), $this); ?>

		</td>
	</tr>
	<?php endfor; endif; ?>
</table>