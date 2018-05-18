<?php /* Smarty version 2.6.6, created on 2010-10-03 20:51:11
         compiled from admin/election.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'sort_image', 'admin/election.tpl', 41, false),array('insert', 'load_total_vote', 'admin/election.tpl', 76, false),array('insert', 'count_total_vote', 'admin/election.tpl', 76, false),array('insert', 'status_update', 'admin/election.tpl', 87, false),array('insert', 'delete', 'admin/election.tpl', 91, false),)), $this); ?>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
        <tr>
                <td colspan="4">
                        <img src="images/users.png" width="30" align="absbottom"> <b>Search Elections</b>
                </td>
                <td colspan="4" align="right">
                        <img src="images/add_user.png" width="30" align="absbottom"><a href="add_election.php">Add new election</a>
                </td>
        </tr>
        <tr>
                <td colspan="8">
                        <form action="election.php" method="post">
                        <table width="100%" border="0" cellpadding="3" cellspacing="1">
                                <tr>
                                        <td width="20%">
                                                Title Keywords :
                                        </td>
                                        <td>
                                            <input type="text" name="paging[title]" size="30" value="<?php echo $this->_tpl_vars['request']['paging']['title']; ?>
">
                                        </td>
                                </tr>

                                <tr>
                                        <td colspan="2">
                                                <input type="submit" name="submit" value="View Elections">
                                        </td>
                                </tr>
                        </table>
                        </form>
                <td>
        </tr>
        <tr>
                <td colspan="4">
                        <b>Election Found : <?php echo $this->_tpl_vars['total']; ?>
</b><br><b><?php echo $this->_tpl_vars['current_page']; ?>
</b>
                </td>
        </tr>
 </table>
 <table cellspacing="1" cellpadding="2" border="0" width="100%">
    <tr bgcolor="bbbbbb" align="center">
        <td>
            Title <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'sort_image', 'field' => 'title')), $this); ?>

        </td>

        <td>
            Date <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'sort_image', 'field' => 'date')), $this); ?>

        </td>
        <td>
            Total vote
        </td>
        <!--
        <td>
            Start time
        </td>
        <td>
            End time
        </td>
        -->
        <td>
            Status
        </td>
        <td>
            Action
        </td>

    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['election']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

    <tr bgcolor="<?php if ($this->_tpl_vars['election'][$this->_sections['i']['index']]['status'] == 'Active'): ?>efefef<?php else: ?>dddddd<?php endif; ?>" align="center" height="25">
        <td>
            <?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['title']; ?>

        </td>
        <td>
            <?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['date']; ?>

        </td>
        <td>
            <div id="total_vote<?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['id']; ?>
"><?php if ($this->_tpl_vars['election'][$this->_sections['i']['index']]['status'] == 'Active'):  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'load_total_vote', 'election_id' => $this->_tpl_vars['election'][$this->_sections['i']['index']]['id'])), $this);  else:  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'count_total_vote', 'election_id' => $this->_tpl_vars['election'][$this->_sections['i']['index']]['id'])), $this);  endif; ?></div>
        </td>
        <!--
        <td>
            <?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['start_time']; ?>

        </td>
        <td>
            <?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['end_time']; ?>

        </td>
        -->
        <td>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'status_update', 'id' => $this->_tpl_vars['election'][$this->_sections['i']['index']]['id'], 'status' => $this->_tpl_vars['election'][$this->_sections['i']['index']]['status'], 'format' => "Active,Inactive,Completed")), $this); ?>

        </td>
        
        <td>
            <a href="preview_election.php?id=<?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['id']; ?>
">Preview</a>  <?php if ($this->_tpl_vars['election'][$this->_sections['i']['index']]['status'] == 'Completed'): ?> | &nbsp;<a href="result.php?id=<?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['id']; ?>
">Show result</a><?php elseif ($this->_tpl_vars['election'][$this->_sections['i']['index']]['status'] == 'Inactive'): ?> | <a href="edit_election.php?id=<?php echo $this->_tpl_vars['election'][$this->_sections['i']['index']]['id']; ?>
">Edit</a> | <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'delete', 'id' => $this->_tpl_vars['election'][$this->_sections['i']['index']]['id'])), $this);  endif; ?>
        </td>

    </tr>
    <?php endfor; endif; ?>
        <tr>
                <td colspan="2">
                        <?php echo $this->_tpl_vars['page_select_box']; ?>

                </td>
        </tr>
</table>
