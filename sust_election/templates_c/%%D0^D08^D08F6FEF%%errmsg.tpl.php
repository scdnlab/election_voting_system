<?php /* Smarty version 2.6.6, created on 2008-03-23 11:34:06
         compiled from errmsg.tpl */ ?>
<?php if ($this->_tpl_vars['err'] != ""): ?>

        <table width="<?php if ($this->_tpl_vars['width'] == ''): ?>450<?php else:  echo $this->_tpl_vars['width'];  endif; ?>" align="center"  cellpadding="0" cellspacing="0" border="0"  class="<?php if ($this->_tpl_vars['class']):  echo $this->_tpl_vars['class'];  else: ?>errmsg<?php endif; ?>">
        <tr align="center">
        <td>
                <FIELDSET class="err">
                <LEGEND><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/images/cancel.png"></LEGEND>
                        <table width="width="100%" cellpadding="10" cellspacing="0" border="0" align="center"  height="30">
                        <tr align="center">
                        <td class="err">
                                <?php echo $this->_tpl_vars['err']; ?>

                        </td>
                        </tr>
                        </table>
                </FIELDSET>
        </td>
        </tr>
        </table><br>

<?php elseif ($this->_tpl_vars['msg'] != ""): ?>

        <table width="<?php if ($this->_tpl_vars['width'] == ''): ?>450<?php else:  echo $this->_tpl_vars['width'];  endif; ?>" align="center"  cellpadding="0" cellspacing="0" border="0">
        <tr align="center">
        <td>
                <FIELDSET class="msg">
                <LEGEND><img src="<?php echo $this->_tpl_vars['BASE_URL']; ?>
/images/accept.png"></LEGEND>
                        <table width="100%" cellpadding="10" cellspacing="0" border="0" align="center" class="<?php if ($this->_tpl_vars['class']):  echo $this->_tpl_vars['class'];  else: ?>errmsg<?php endif; ?>">
                        <tr align="center">
                        <td>
                                <?php echo $this->_tpl_vars['msg']; ?>

                        </td>
                        </tr>
                        </table>
                </FIELDSET>
        </td>
        </tr>
        </table><br>
<?php endif; ?>