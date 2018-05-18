<?php /* Smarty version 2.6.6, created on 2008-06-15 11:47:18
         compiled from admin/result.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_candidate', 'admin/result.tpl', 23, false),array('insert', 'get_value', 'admin/result.tpl', 31, false),array('insert', 'get_image', 'admin/result.tpl', 32, false),array('insert', 'count_vote', 'admin/result.tpl', 56, false),array('insert', 'count_vote_percentage', 'admin/result.tpl', 65, false),)), $this); ?>
<br>
<form action="candidate.php" method="post">
<table width="100%" style="border: 1px solid" cellspacing="2" cellpadding="2">
    <tr height="30">
        <td align="center">
            <a href="javascript:void(0);" onclick="popupWindow_result('print_result.php?election_id=<?php echo $this->_tpl_vars['request']['id']; ?>
');"><b>Print result</b></a> | <b><a href="result.php?delete_vote=<?php echo $this->_tpl_vars['request']['id']; ?>
" onclick="return confirm('Are you sure to delete all votes of this election?');">Delete All Votes</a></b>
        </td>
    </tr>
    <tr>
        <td align="center">
            <h1><?php echo $this->_tpl_vars['election']['title']; ?>
</h1>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['election']['status'] == 'Completed'): ?>
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
    <tr bgcolor="#dddddd">
        <td align="center">
            <?php echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['title']; ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_candidate', 'category_id' => $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['id'], 'assign' => 'candidate')), $this); ?>

            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['candidate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                    <td width="33%" align="center">
                        <table  border="0" cellspacing="2" cellpadding="2">
                            <tr>
                                <td colspan="2">
                                    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'image_id', 'id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['student_id'], 'assign' => 'student_image_id')), $this); ?>

                                    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_image', 'id' => $this->_tpl_vars['student_image_id'], 'assign' => 'image')), $this);  if ($this->_tpl_vars['image'][0]['thumb_path']): ?><img src='../<?php echo $this->_tpl_vars['image'][0]['thumb_path']; ?>
' height='100'><?php else: ?><img src='../images/photo_no.gif' height='100'><?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Name :</b>
                                </td>
                                <td>
                                    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'name', 'id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['student_id'])), $this); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Reg no :</b>
                                </td>
                                <td>
                                    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'reg_no', 'id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['student_id'])), $this); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Vote :</b>
                                </td>
                                <td>
                                    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'count_vote', 'candidate_id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['id'])), $this); ?>

                                </td>
                            </tr>
<!--
                            <tr>
                                <td>
                                    <b>Percentage :</b>
                                </td>
                                <td>
                                    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'count_vote_percentage', 'candidate_id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['id'], 'candidate_category_id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['candidate_category_id'])), $this); ?>

                                </td>
                            </tr>
-->
                        </table>                        
                    </td>
                    <?php if (( $this->_sections['j']['index']+1 ) % 3 == 0): ?>
                    </tr>
                    <tr>
                    <?php endif; ?>
                    <?php endfor; endif; ?>
                </tr>
            </table>
        </td>
    </tr>
    <?php endfor; endif; ?>
    <?php endif; ?>
    <tr>
        <td>&nbsp</td>
    </tr>
</table>
</form>