<?php /* Smarty version 2.6.6, created on 2011-11-25 20:38:16
         compiled from admin/edit_candidate_category.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_option', 'admin/edit_candidate_category.tpl', 14, false),)), $this); ?>
<br>
<form action="edit_candidate_category.php?id=<?php echo $this->_tpl_vars['request']['id']; ?>
" method="post" enctype="multipart/form-data" name="candidate_form">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add Candidate Category</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Election</b>
        </td>
        <td>
            <select name="candidate_category[election_id]">
                <option value="">--Select--</option>
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_option', 'table' => 'election', 'field' => 'title', 'value_field' => 'id', 'value' => $this->_tpl_vars['candidate_category']['election_id'], 'condition' => "status='Inactive'")), $this); ?>

            </select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="candidate_category[title]" size="35" value="<?php echo $this->_tpl_vars['candidate_category']['title']; ?>
"
        </td>
    </tr>
	<tr bgcolor="#efefef">
		<td>
			<b>Eligible Session</b>
		</td>
		<td>
			<select name="candidate_category[session]">
					<option value="">--All--</option>
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
					<?php if ($this->_tpl_vars['sessions'][$this->_sections['i']['index']]): ?>
						<option value="<?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>
" <?php if ($this->_tpl_vars['candidate_category']['session'] == $this->_tpl_vars['sessions'][$this->_sections['i']['index']]): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>
</option>
					<?php endif; ?>
					<?php endfor; endif; ?>
			</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
			<td>
				<b>Eligible Section</b>
			</td>
			<td>
				<select name="candidate_category[section]">
						<option value="">--All--</option>
						<option value="A" <?php if ($this->_tpl_vars['candidate_category']['section'] == 'A'): ?>selected<?php endif; ?>>A</option>
						<option value="B" <?php if ($this->_tpl_vars['candidate_category']['section'] == 'B'): ?>selected<?php endif; ?>>B</option>
				</select>
			</td>
	</tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Order Number</b>
        </td>
        <td>
            <input type="text" size="10" name="candidate_category[order]" value="<?php echo $this->_tpl_vars['candidate_category']['order']; ?>
"
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center"><input type="submit" name="add_candidate_category" value="Submit"></td>
    </tr>
</table>
</form>
