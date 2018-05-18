<?php /* Smarty version 2.6.6, created on 2008-03-23 11:34:18
         compiled from admin/theme.tpl */ ?>
<table cellpadding ="0" cellspacing="5" border="0" width="50%" align="center">
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['theme']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr align="center">
        <td>
            <b><?php echo $this->_tpl_vars['theme'][$this->_sections['i']['index']]['title']; ?>
</b>
        </td>
    </tr>
    <tr>
        <td>
            <table cellpadding ="0" cellspacing="5" border="0" width="100%" style = "border:#efefef 1px solid" bgcolor="#F9F9F9">
                <tr align="center">
                    <td>
                        <img src="../<?php echo $this->_tpl_vars['theme'][$this->_sections['i']['index']]['thumb_path']; ?>
" width="100">
                    </td>
                </tr>

                <tr align="center">
                    <td>
                        <?php if ($this->_tpl_vars['theme'][$this->_sections['i']['index']]['is_default'] == 'No'): ?><a href="theme.php?id=<?php echo $this->_tpl_vars['theme'][$this->_sections['i']['index']]['id']; ?>
">Set as default</a><?php else: ?>Default<?php endif; ?>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <?php endfor; endif; ?>
</table>