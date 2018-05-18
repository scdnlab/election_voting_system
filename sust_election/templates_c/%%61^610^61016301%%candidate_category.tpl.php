<?php /* Smarty version 2.6.6, created on 2011-11-25 20:34:35
         compiled from admin/candidate_category.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_value', 'admin/candidate_category.tpl', 45, false),array('insert', 'delete', 'admin/candidate_category.tpl', 57, false),)), $this); ?>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td>

                </td>
                <td colspan="8" align="right">
                    <img src="images/add_user.png" width="30" align="absbottom"><a href="add_candidate_category.php">Add new candidate category</a>
                </td>
        </tr>

        <tr>
                <td colspan="8">
                    <b>Candidate Category Found : <?php echo $this->_tpl_vars['total']; ?>
</b><br><b><?php echo $this->_tpl_vars['current_page']; ?>
</b>
                </td>
        </tr>

    <tr bgcolor="bbbbbb" align="center">
        <td>
            Post
        </td>
        <td>
            Election
        </td>
        <td>
            Eligible Session
        </td>
        <td>
            Eligible Section
        </td>
        <td>
            Order
        </td>
        <td>
            Action
        </td>

    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['candidate_category']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <td>
            <?php echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['title']; ?>

        </td>
        <td>
            <a href="election.php?paging[id]=<?php echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['election_id']; ?>
"><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'election', 'field' => 'title', 'id' => $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['election_id'])), $this); ?>
</a>
        </td>
        <td>
            <?php if ($this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['session'] != ""):  echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['session'];  else: ?>All<?php endif; ?>
        </td>
        <td>
            <?php if ($this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['section'] != ""):  echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['section'];  else: ?>All<?php endif; ?>
        </td>
        <td>
            <?php echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['order']; ?>

        </td>
        <td>
            <a href="edit_candidate_category.php?id=<?php echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['id']; ?>
">Edit</a> | <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'delete', 'id' => $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['id'])), $this); ?>

        </td>

    </tr>
    <?php endfor; endif; ?>
        <tr>
                <td colspan="2">
                        <?php echo $this->_tpl_vars['page_select_box']; ?>

                </td>
        </tr>
</table>
