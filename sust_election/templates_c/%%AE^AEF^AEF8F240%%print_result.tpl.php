<?php /* Smarty version 2.6.6, created on 2008-03-31 12:55:26
         compiled from admin/print_result.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_candidate', 'admin/print_result.tpl', 27, false),array('insert', 'get_value', 'admin/print_result.tpl', 37, false),array('insert', 'count_vote', 'admin/print_result.tpl', 53, false),array('insert', 'count_vote_percentage', 'admin/print_result.tpl', 62, false),)), $this); ?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE>:: CONTROL PANEL :: <?php echo $this->_tpl_vars['SITE_NAME']; ?>
 ::</TITLE>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
</head>
<BODY>
<br>
<form action="candidate.php" method="post">
<table width="100%" style="border: 1px solid" cellspacing="2" cellpadding="2">
    <tr>
        <td align="center">
            <h1><?php echo $this->_tpl_vars['election']['title']; ?>
</h1>
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
    <tr bgcolor="#dddddd" height="25">
        <td align="center">
            <b><?php echo $this->_tpl_vars['candidate_category'][$this->_sections['i']['index']]['title']; ?>
</b>
        </td>
    </tr>
    <tr>
        <td>
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

                        <table  border="0" cellspacing="1" cellpadding="1">
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
                                    <b><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'count_vote', 'candidate_id' => $this->_tpl_vars['candidate'][$this->_sections['j']['index']]['id'])), $this); ?>
</b>
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
						<table  border="0" height="15">
                            <tr>
                                <td>
								</td>
							</tr>
						</table>

                    <?php endfor; endif; ?>

        </td>
    </tr>
    <?php endfor; endif; ?>
    <tr>
        <td>&nbsp</td>
    </tr>
</table>
</form>
<?php echo '
<script language="javascript">
function print_now()
{
    window.print();
}
setTimeout(\'print_now()\',1000);
</script>
'; ?>

</body>
</html>