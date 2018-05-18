<?php /* Smarty version 2.6.6, created on 2008-03-29 06:12:11
         compiled from admin/statistics.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'total_voter', 'admin/statistics.tpl', 10, false),array('insert', 'count_total_vote', 'admin/statistics.tpl', 11, false),array('insert', 'get_value', 'admin/statistics.tpl', 24, false),array('insert', 'get_candidate', 'admin/statistics.tpl', 46, false),array('insert', 'count_vote', 'admin/statistics.tpl', 52, false),array('modifier', 'cat', 'admin/statistics.tpl', 24, false),)), $this); ?>
<h1><?php echo $this->_tpl_vars['election']['title']; ?>
</h1>
<table width="100%" style="border:1px solid" cellpadding="5" cellspacing="0">
    <tr bgcolor="#efefef">
        <td align="center">
            <b>Voter statistics</b>
        </td>
    </tr>
    <tr>
        <td>
            Total voter : <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'total_voter', 'election_id' => $this->_tpl_vars['election']['id'])), $this); ?>
<br>
            Voter presented: <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'count_total_vote', 'election_id' => $this->_tpl_vars['election']['id'])), $this); ?>

        </td>
    </tr>
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
        <td>
            <b><?php echo $this->_tpl_vars['sessions'][$this->_sections['i']['index']]; ?>
</b>                        
        </td>
    </tr>
    <tr>
        <td>
            Voter : <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'total_voter', 'election_id' => $this->_tpl_vars['election']['id'], 'session' => $this->_tpl_vars['sessions'][$this->_sections['i']['index']])), $this); ?>
<br>
            Presented: <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'vote_count', 'field' => 'total_present', 'sql' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="select count(distinct(student_id)) as total_present from vote_count,student where election_id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['election']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['election']['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, " and vote_count.student_id=student.id and student.session='") : smarty_modifier_cat($_tmp, " and vote_count.student_id=student.id and student.session='")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sessions'][$this->_sections['i']['index']]) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sessions'][$this->_sections['i']['index']])))) ? $this->_run_mod_handler('cat', true, $_tmp, "'") : smarty_modifier_cat($_tmp, "'")))), $this); ?>
 
        </td>
    </tr>
    <?php endif; ?>
    <?php endfor; endif; ?>
</table>

<table width="100%" style="border:1px solid" cellpadding="5" cellspacing="0">
    <tr bgcolor="#efefef">
        <td align="center">
            <b>Candidate statistics</b>
        </td>
    </tr>
    <tr>
        <td align="center">
            <table width="90%" style="border:1px solid" cellpadding="0" cellspacing="0">
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
                <tr>
                    <td align="center">
                        <b><?php echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['title']; ?>
</b>
                    </td>
                </tr>
                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_candidate', 'category_id' => $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['id'], 'assign' => 'candidate')), $this); ?>

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
                <tr>
                    <td>
                        Name :<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'name', 'id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['student_id'])), $this); ?>
<br>
                        Reg no :<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'student', 'field' => 'reg_no', 'id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['student_id'])), $this); ?>
<br>
                        Vote : <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'count_vote', 'candidate_id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['id'])), $this); ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <?php unset($this->_sections['k']);
$this->_sections['k']['name'] = 'k';
$this->_sections['k']['loop'] = is_array($_loop=$this->_tpl_vars['sessions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['k']['show'] = true;
$this->_sections['k']['max'] = $this->_sections['k']['loop'];
$this->_sections['k']['step'] = 1;
$this->_sections['k']['start'] = $this->_sections['k']['step'] > 0 ? 0 : $this->_sections['k']['loop']-1;
if ($this->_sections['k']['show']) {
    $this->_sections['k']['total'] = $this->_sections['k']['loop'];
    if ($this->_sections['k']['total'] == 0)
        $this->_sections['k']['show'] = false;
} else
    $this->_sections['k']['total'] = 0;
if ($this->_sections['k']['show']):

            for ($this->_sections['k']['index'] = $this->_sections['k']['start'], $this->_sections['k']['iteration'] = 1;
                 $this->_sections['k']['iteration'] <= $this->_sections['k']['total'];
                 $this->_sections['k']['index'] += $this->_sections['k']['step'], $this->_sections['k']['iteration']++):
$this->_sections['k']['rownum'] = $this->_sections['k']['iteration'];
$this->_sections['k']['index_prev'] = $this->_sections['k']['index'] - $this->_sections['k']['step'];
$this->_sections['k']['index_next'] = $this->_sections['k']['index'] + $this->_sections['k']['step'];
$this->_sections['k']['first']      = ($this->_sections['k']['iteration'] == 1);
$this->_sections['k']['last']       = ($this->_sections['k']['iteration'] == $this->_sections['k']['total']);
 if ($this->_tpl_vars['sessions'][$this->_sections['k']['index']]):  echo $this->_tpl_vars['sessions'][$this->_sections['k']['index']]; ?>
: <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_value', 'table' => 'vote_count', 'field' => 'total_present', 'sql' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="select count(distinct(student_id)) as total_present from vote_count,student where election_id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['election']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['election']['id'])))) ? $this->_run_mod_handler('cat', true, $_tmp, " and vote_count.student_id=student.id and student.session='") : smarty_modifier_cat($_tmp, " and vote_count.student_id=student.id and student.session='")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sessions'][$this->_sections['k']['index']]) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sessions'][$this->_sections['k']['index']])))) ? $this->_run_mod_handler('cat', true, $_tmp, "' and student.status='Active' and candidate_id=") : smarty_modifier_cat($_tmp, "' and student.status='Active' and candidate_id=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['id'])))), $this); ?>
 <?php endif;  endfor; endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <?php endfor; endif; ?>
                <?php endfor; endif; ?>
            </table>
        </td>
    </tr>
</table>








