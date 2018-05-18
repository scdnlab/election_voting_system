<?php /* Smarty version 2.6.6, created on 2008-03-30 13:33:17
         compiled from admin/student.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'sort_image', 'admin/student.tpl', 89, false),array('insert', 'get_image', 'admin/student.tpl', 130, false),array('insert', 'status_update', 'admin/student.tpl', 133, false),array('insert', 'delete', 'admin/student.tpl', 137, false),)), $this); ?>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td colspan="3">
                        <img src="images/users.png" width="30" align="absbottom"> <b>Search Students</b>
                </td>
                <td colspan="2" align="right">
                        <a href="add_student.php">Add new student</a> <img src="images/add_user.png" width="30" align="absbottom">  <a href="add_multiple_student.php">Add/Edit multiple students</a>
                </td>
        </tr>
        <tr>
                <td colspan="4">
                        <form action="student.php" method="post">
                        <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                <tr>
                                        <td width="25%">
                                                Name Keywords :
                                        </td>
                                        <td>
                                            <input type="text" name="paging[name]" size="30" value="<?php echo $this->_tpl_vars['request']['paging']['name']; ?>
">
                                        </td>
                                </tr>
								<tr>
                                        <td width="25%">
                                                Reg no :
                                        </td>
                                        <td>
                                            <input type="text" name="paging[reg_no]" size="30" value="<?php echo $this->_tpl_vars['request']['paging']['reg_no']; ?>
">
                                        </td>
                                </tr>
								<tr>
                                        <td>
                                                Session :
                                        </td>
                                        <td>
                                                <select name="paging[session]">
                                                        <option value="">--Any--</option>
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
								<tr>
                                        <td>
                                                Section :
                                        </td>
                                        <td>
                                                <select name="paging[section]">
                                                        <option value="">--Any--</option>
                                                        <option value="A" <?php if ($this->_tpl_vars['request']['paging']['section'] == 'A'): ?>selected<?php endif; ?>>A</option>
                                                        <option value="B" <?php if ($this->_tpl_vars['request']['paging']['section'] == 'B'): ?>selected<?php endif; ?>>B</option>
                                                </select>
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                Status :
                                        </td>
                                        <td>
                                                <select name="paging[status]">
                                                        <option value="">--Any--</option>
                                                        <option value="Active" <?php if ($this->_tpl_vars['request']['paging']['status'] == 'Active'): ?>selected<?php endif; ?>>Active</option>
                                                        <option value="Inactive" <?php if ($this->_tpl_vars['request']['paging']['status'] == 'Inactive'): ?>selected<?php endif; ?>>Inactive</option>
                                                </select>
                                        </td>
                                </tr>

                                <tr>
                                        <td colspan="2">
                                                <input type="submit" name="submit" value="View Students">
                                        </td>
                                </tr>
                        </table>
                        </form>
                <td>
        </tr>
        <tr>
                <td colspan="5">
                        <b>Student Found : <?php echo $this->_tpl_vars['total']; ?>
</b><br><b><?php echo $this->_tpl_vars['current_page']; ?>
</b>
                </td>
        </tr>
	</table>
	
<table cellspacing="1" cellpadding="2" border="0" width="100%">
    <tr bgcolor="bbbbbb" align="center">
        <td>
            Reg no <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'sort_image', 'field' => 'reg_no')), $this); ?>

        </td>

        <td>
           Name <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'sort_image', 'field' => 'name')), $this); ?>

        </td>
        <td>
           Session
        </td>
		<td>
           Section
        </td>
        <td>
           Photo
        </td>

        <td>
            Status <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'sort_image', 'field' => 'status')), $this); ?>

        </td>

        <td>
            Action
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

    <tr bgcolor="efefef" align="center">
        <td>
            <?php echo $this->_tpl_vars['student'][$this->_sections['i']['index']]['reg_no']; ?>

        </td>
        <td>
            <?php echo $this->_tpl_vars['student'][$this->_sections['i']['index']]['name']; ?>

        </td>
		<td>
            <?php echo $this->_tpl_vars['student'][$this->_sections['i']['index']]['session']; ?>

        </td>
		<td>
            <?php echo $this->_tpl_vars['student'][$this->_sections['i']['index']]['section']; ?>

        </td>
        
        <td align='center'><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_image', 'id' => $this->_tpl_vars['student'][$this->_sections['i']['index']]['image_id'], 'assign' => 'image')), $this);  if ($this->_tpl_vars['image'][0]['thumb_path']): ?><img src='../<?php echo $this->_tpl_vars['image'][0]['thumb_path']; ?>
' width='100'><?php else: ?>N/A<?php endif; ?></td>

        <td>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'status_update', 'id' => $this->_tpl_vars['student'][$this->_sections['i']['index']]['id'], 'status' => $this->_tpl_vars['student'][$this->_sections['i']['index']]['status'], 'format' => "Active,Inactive")), $this); ?>

        </td>

        <td>
            <a href="edit_student.php?id=<?php echo $this->_tpl_vars['student'][$this->_sections['i']['index']]['id']; ?>
">Edit</a> | <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'delete', 'id' => $this->_tpl_vars['student'][$this->_sections['i']['index']]['id'], 'table' => 'image', 'field' => "image.path,image.thumb_path")), $this); ?>

        </td>

    </tr>
    <?php endfor; endif; ?>
        <tr>
                <td colspan="2">
                        <?php echo $this->_tpl_vars['page_select_box']; ?>

                </td>
        </tr>
</table>
