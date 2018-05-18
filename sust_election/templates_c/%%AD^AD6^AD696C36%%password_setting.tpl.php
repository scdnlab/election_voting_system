<?php /* Smarty version 2.6.6, created on 2008-03-30 14:25:36
         compiled from admin/password_setting.tpl */ ?>
<br>
<a href="password_setting.php?action=generate" onclick="return confirm('Are you sure to generate new password ?')">Generate new password</a>
<br>&nbsp;
<form action="password_setting.php" method="post" name="password_form">
<table cellspacing="5" cellpadding="5" style="border: 1px solid" width="50%" align="center">
	<tr height="50">
        <td colspan="2" align="center"> <h2>View Password</h2></td>
    </tr>    
	<tr bgcolor="#efefef">
        <td width="25%">
			Session :
        </td>
		<td>
			<select name="session" id="session">
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
" <?php if ($this->_tpl_vars['request']['paging']['session'] == $this->_tpl_vars['sessions'][$this->_sections['i']['index']]): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>
</option>
					<?php endif; ?>
					<?php endfor; endif; ?>
			</select>			
		</td>
    </tr>
	<tr bgcolor="#efefef">
        <td>
			Section :
        </td>
		<td>
			<select name="section" id="section">
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
		</td>
    </tr>
	<tr>
        <td colspan="2" align="center">
			<input type="button" value="View" onclick="popupWindow_password();">
		</td>
    </tr>
</table>
</form>