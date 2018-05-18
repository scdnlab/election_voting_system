<?php /* Smarty version 2.6.6, created on 2010-10-04 20:36:43
         compiled from admin/edit_candidate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_option', 'admin/edit_candidate.tpl', 14, false),array('insert', 'get_value', 'admin/edit_candidate.tpl', 44, false),array('modifier', 'cat', 'admin/edit_candidate.tpl', 25, false),)), $this); ?>
<br>
<form action="edit_candidate.php?id=<?php echo $this->_tpl_vars['request']['id']; ?>
" method="post" enctype="multipart/form-data" name="candidate_form">
<table cellspacing="1" cellpadding="8" style="border:1px solid" width="60%" align="center">
    <tr height="50">
        <td colspan="2" align="center"> <h2>Add Candidate</h2></td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Election</b>
        </td>
        <td>
            <select name="candidate[election_id]" onchange="javascript:document.forms.candidate_form.submit();">
                <option value="">--Select--</option>
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_option', 'table' => 'election', 'field' => 'title', 'value_field' => 'id', 'value' => $this->_tpl_vars['candidate']['election_id'], 'condition' => "status='Inactive'")), $this); ?>

            </select>
        </td>
    </tr>
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Candidate Category</b>
        </td>
        <td>
            <select name="candidate[candidate_category_id]">
                <option value="">--Select--</option>
                <?php if ($this->_tpl_vars['candidate']['election_id']):  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_option', 'table' => 'candidate_category', 'field' => 'title', 'value_field' => 'id', 'value' => $this->_tpl_vars['candidate']['candidate_category_id'], 'condition' => ((is_array($_tmp="election_id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['candidate']['election_id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['candidate']['election_id'])))), $this);  endif; ?>
            </select>
        </td>
    </tr>
<!--
	<tr bgcolor="#efefef">
        <td width="35%">
            <b>Ballot name</b>
        </td>
        <td>
            <input type="text" name="candidate[ballot_name]" value="<?php echo $this->_tpl_vars['candidate']['ballot_name']; ?>
">
        </td>
    </tr>
-->
    <tr bgcolor="#efefef">
        <td width="35%">
            <b>Student reg no</b>
        </td>
        <td>
            <input type="text" name="reg_no" value="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'reg_no', 'id' => $this->_tpl_vars['candidate']['student_id'])), $this); ?>
"
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center"><input type="submit" name="add_candidate" value="Update"></td>
    </tr>
</table>
</form>
