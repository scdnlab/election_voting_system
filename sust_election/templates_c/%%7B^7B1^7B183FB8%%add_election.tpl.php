<?php /* Smarty version 2.6.6, created on 2008-03-23 12:10:13
         compiled from admin/add_election.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'date_box', 'admin/add_election.tpl', 28, false),array('insert', 'time_box', 'admin/add_election.tpl', 37, false),)), $this); ?>
<br>
<form action="add_election.php" method="post" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add Election</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="election[title]" value="<?php echo $this->_tpl_vars['request']['election']['title']; ?>
" size="35">
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Description</b>
        </td>
        <td>
            <textarea name="election[description]"><?php echo $this->_tpl_vars['request']['election']['description']; ?>
</textarea>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Date</b>
        </td>
        <td>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'date_box')), $this); ?>

        </td>
    </tr>
    <!--
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Start Time</b>
        </td>
        <td>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'time_box', 'id' => 1)), $this); ?>

        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>End Time</b>
        </td>
        <td>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'time_box', 'id' => 2)), $this); ?>

        </td>
    </tr>
    -->
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Sessions</b>
        </td>
        <td>
        <table>
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
            <tr>
                <td align="center">
                    <input type="checkbox" name="session[]" value="<?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>
" checked><?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>

                </td>
            </tr>
        <?php endif; ?>
        <?php endfor; endif; ?>
        </table>    
        </td>
    </tr>    
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
    </tr>
</table>
</form>
