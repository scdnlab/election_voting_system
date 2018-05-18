<?php /* Smarty version 2.6.6, created on 2009-02-05 21:44:11
         compiled from admin/edit_student.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_image', 'admin/edit_student.tpl', 46, false),)), $this); ?>
<br>
<form action="edit_student.php?id=<?php echo $this->_tpl_vars['request']['id']; ?>
" method="post" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Edit Student</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Name</b>
        </td>
        <td>
            <input type="text" name="student[name]" size="35" value="<?php echo $this->_tpl_vars['student']['name']; ?>
">  <font color="red">*</font>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Registration Number</b>
        </td>
        <td>
            <input type="text" name="student[reg_no]" value="<?php echo $this->_tpl_vars['student']['reg_no']; ?>
">  <font color="red">*</font>
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
" <?php if ($this->_tpl_vars['student']['session'] == $this->_tpl_vars['sessions'][$this->_sections['i']['index']]): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>
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
            <select name="student[section]"><option value="A">A</option><option value="B" <?php if ($this->_tpl_vars['student']['section'] == 'B'): ?>selected<?php endif; ?>>B</option></select>
        </td>
    </tr>
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_image', 'id' => $this->_tpl_vars['student']['image_id'], 'assign' => 'image')), $this); ?>

    <?php if ($this->_tpl_vars['image'][0]['path']): ?>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Photo</b>
        </td>
        <td>
            <img src='../<?php echo $this->_tpl_vars['image'][0]['path']; ?>
' width='100'>
        </td>
    </tr>
    <?php endif; ?>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Upload Photo</b>
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
