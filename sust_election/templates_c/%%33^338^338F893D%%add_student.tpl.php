<?php /* Smarty version 2.6.6, created on 2008-04-03 12:47:36
         compiled from admin/add_student.tpl */ ?>
<br>
<form action="add_student.php" method="post" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add Student</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Name</b>
        </td>
        <td>
            <input type="text" name="student[name]" size="35" value="<?php echo $this->_tpl_vars['request']['student']['name']; ?>
"> <font color="red">*</font>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Registration Number</b>
        </td>
        <td>
            <input type="text" name="student[reg_no]" value="<?php echo $this->_tpl_vars['request']['student']['reg_no']; ?>
"> <font color="red">*</font>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Session</b>
        </td>
        <td>
            <select name="student[session]">
                <option value="">--Select--</option>
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
" <?php if ($this->_tpl_vars['request']['student']['session'] == $this->_tpl_vars['sessions'][$this->_sections['i']['index']]): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>
</option>
                <?php endif; ?>
                <?php endfor; endif; ?>
            </select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Section</b>
        </td>
        <td>
            <select name="student[section]"><option value="A">A</option><option value="B" <?php if ($this->_tpl_vars['request']['student']['section'] == 'B'): ?>selected<?php endif; ?>>B</option></select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Photo</b>
        </td>
        <td>
            <input type="file" name="photo">
            <div style="font-size:10px;color:#FF0005">Ratio of the image must be 1:1.2 (300x360)</div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
    </tr>
</table>
</form>

