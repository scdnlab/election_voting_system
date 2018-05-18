<?php /* Smarty version 2.6.6, created on 2010-10-04 20:39:38
         compiled from admin/candidate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_value', 'admin/candidate.tpl', 39, false),array('insert', 'get_image', 'admin/candidate.tpl', 39, false),array('insert', 'delete', 'admin/candidate.tpl', 51, false),)), $this); ?>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td colspan="2">

                </td>
                <td colspan="3" align="right">
                        <img src="images/add_user.png" width="30" align="absbottom"><a href="add_candidate.php">Add new candidate</a>
                </td>
        </tr>

        <tr>
                <td colspan="5">
                        <b>Candidate Found : <?php echo $this->_tpl_vars['total']; ?>
</b><br><b><?php echo $this->_tpl_vars['current_page']; ?>
</b>
                </td>
        </tr>

    <tr bgcolor="bbbbbb" align="center">
        <td>Photo</td>
        <td>
            Name
        </td>

        <td >
           Post
        </td>

        <td>
            Election
        </td>
        <td>
            Action
        </td>

    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['candidate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

    <tr bgcolor="efefef" align="center" height="25">
        <td align='center'>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'image_id', 'id' => $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['student_id'], 'assign' => 'image_id')), $this);  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_image', 'id' => $this->_tpl_vars['image_id'], 'assign' => 'image')), $this);  if ($this->_tpl_vars['image'][0]['thumb_path']): ?><a href="student.php?paging[id]=<?php echo $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['student_id']; ?>
"><img src='../<?php echo $this->_tpl_vars['image'][0]['thumb_path']; ?>
' width='100'></a><?php else: ?>N/A<?php endif; ?>
        </td>
        <td>
            <a href="student.php?paging[id]=<?php echo $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['student_id']; ?>
"><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'name', 'id' => $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['student_id'])), $this); ?>
</a>
        </td>
        <td>
            <a href="candidate_category.php?paging[id]=<?php echo $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['candidate_category_id']; ?>
"><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'candidate_category', 'field' => 'title', 'id' => $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['candidate_category_id'])), $this); ?>
</a>
        </td>
        <td>
            <a href="election.php?paging[id]=<?php echo $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['election_id']; ?>
"><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'election', 'field' => 'title', 'id' => $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['election_id'])), $this); ?>
</a>
        </td>
        <td>
            <a href="edit_candidate.php?id=<?php echo $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['id']; ?>
">Edit</a> | <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'delete', 'id' => $this->_tpl_vars['candidate'][$this->_sections['i']['index']]['id'])), $this); ?>

        </td>

    </tr>
    <?php endfor; endif; ?>
        <tr>
                <td colspan="2">
                        <?php echo $this->_tpl_vars['page_select_box']; ?>

                </td>
        </tr>
</table>
