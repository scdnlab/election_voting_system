<?php /* Smarty version 2.6.6, created on 2010-10-03 19:00:47
         compiled from index.tpl */ ?>
<table width="100%">
    <?php if ($this->_tpl_vars['election']['id']): ?>
    <tr>
        <td align="center">
            <input type="button" name="" value="Go to voting page" onclick="window.open('<?php echo $this->_tpl_vars['theme']['url']; ?>
','popupWindow_voting_page','toolbar=no,location=no,fullscreen=yes,directories=no,status=no,menubar=1,scrollbars=<?php if ($this->_tpl_vars['theme']['id'] == 1): ?>no<?php else: ?>yes<?php endif; ?>,resizable=1,copyhistory=no,width=1000,height=1000,screenX=200,screenY=100,top=100,left=200');">
        </td>
    </tr>
    <?php endif; ?>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['elections']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <td>
            <b><?php echo $this->_tpl_vars['elections'][$this->_sections['i']['index']]['title']; ?>
</b>
        </td>
    </tr>
    <?php endfor; endif; ?>
</table>