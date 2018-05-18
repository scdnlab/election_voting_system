<?php /* Smarty version 2.6.6, created on 2008-06-15 10:37:25
         compiled from admin/menu_builder.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'show_menu', 'admin/menu_builder.tpl', 94, false),array('insert', 'count_submenu', 'admin/menu_builder.tpl', 191, false),)), $this); ?>
<?php if ($this->_tpl_vars['request']['action'] == 'add_menu'): ?>
<form action="menu_builder.php?action=<?php echo $this->_tpl_vars['request']['action'];  if ($this->_tpl_vars['request']['menu_id']): ?>&menu_id=<?php echo $this->_tpl_vars['request']['menu_id'];  endif; ?>" method="post">
<table width="60%" cellpadding="0" cellspacing="4" border="0">
    <tr>
        <td colspan="2" align="center">
            <b>Add / Edit Menu</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu_builder.php">view menu's</a>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="admin_menu[title]" value="<?php echo $this->_tpl_vars['admin_menu']['title']; ?>
" size="30">
        </td>
    </tr>
    <tr>
        <td>
            <b>URL</b>
        </td>
        <td>
            <input type="text" name="admin_menu[url]" value="<?php echo $this->_tpl_vars['admin_menu']['url']; ?>
" size="30">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="menu_submit" value="Submit">
        </td>
    </tr>
</table>
</form>






<?php elseif ($this->_tpl_vars['request']['action'] == 'add_submenu'): ?>
<form action="menu_builder.php?action=<?php echo $this->_tpl_vars['request']['action']; ?>
&menu_id=<?php echo $this->_tpl_vars['request']['menu_id'];  if ($this->_tpl_vars['request']['submenu_id']): ?>&submenu_id=<?php echo $this->_tpl_vars['request']['submenu_id'];  endif; ?>" method="post">
<input type="hidden" name="admin_submenu[menu_id]" value="<?php echo $this->_tpl_vars['request']['menu_id']; ?>
">
<table width="60%" cellpadding="0" cellspacing="4" border="0">
    <tr>
        <td colspan="2" align="center">
            <b>Add / Edit Submenu</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu_builder.php?action=sub_menu&menu_id=<?php echo $this->_tpl_vars['request']['menu_id']; ?>
">view submenu's</a>
        </td>
    </tr>
    <tr>
        <td width="15%">
            <b>Title</b>
        </td>
        <td>
            <input type="text" name="admin_submenu[title]" value="<?php echo $this->_tpl_vars['admin_submenu']['title']; ?>
" size="30">
        </td>
    </tr>
    <tr>
        <td>
            <b>URL</b>
        </td>
        <td>
            <input type="text" name="admin_submenu[url]" value="<?php echo $this->_tpl_vars['admin_submenu']['url']; ?>
" size="30">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submenu_submit" value="Submit">
        </td>
    </tr>
</table>
</form>








<?php elseif ($this->_tpl_vars['request']['action'] == 'sub_menu'): ?>
<table width="100%" cellpadding="0" cellspacing="5" border="0">
    <tr>
        <td colspan="5" align="center">
            <b> <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_menu', 'menu_id' => $this->_tpl_vars['request']['menu_id'])), $this); ?>
</b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="menu_builder.php">view menu's</a>
        </td>
        <td colspan="3" align="right">
            <a href="menu_builder.php?action=add_submenu&menu_id=<?php echo $this->_tpl_vars['request']['menu_id']; ?>
"> Add new submenu </a>
        </td>
    </tr>
    <tr bgcolor="#bbbbbb" align="center">
        <td>
            #
        </td>
        <td>
            Title
        </td>
        <td>
            URL
        </td>
        <td>
            Sort
        </td>
        <td>
            Action
        </td>
    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['admin_submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php echo $this->_sections['i']['index']+1; ?>

        </td>
        <td>
            <?php echo $this->_tpl_vars['admin_submenu'][$this->_sections['i']['index']]['title']; ?>

        </td>
        <td>
            <?php echo $this->_tpl_vars['admin_submenu'][$this->_sections['i']['index']]['url']; ?>

        </td>
        <td>
            <a href="menu_builder.php?action=<?php echo $this->_tpl_vars['request']['action']; ?>
&menu_id=<?php echo $this->_tpl_vars['request']['menu_id']; ?>
&a=up&pid=<?php echo $this->_tpl_vars['admin_submenu'][$this->_sections['i']['index']]['id']; ?>
"><img src="../images/up.gif" border="0"></a> &nbsp <a href="menu_builder.php?action=<?php echo $this->_tpl_vars['request']['action']; ?>
&menu_id=<?php echo $this->_tpl_vars['request']['menu_id']; ?>
&a=down&pid=<?php echo $this->_tpl_vars['admin_submenu'][$this->_sections['i']['index']]['id']; ?>
"><img src="../images/down.gif" border="0"></a>
        </td>
        <td>
            <a href="menu_builder.php?action=add_submenu&submenu_id=<?php echo $this->_tpl_vars['admin_submenu'][$this->_sections['i']['index']]['id']; ?>
&menu_id=<?php echo $this->_tpl_vars['request']['menu_id']; ?>
">Edit</a> | <a href="menu_builder.php?action=<?php echo $this->_tpl_vars['request']['action']; ?>
&delete=<?php echo $this->_tpl_vars['admin_submenu'][$this->_sections['i']['index']]['id']; ?>
&menu_id=<?php echo $this->_tpl_vars['request']['menu_id']; ?>
" onclick="return confirm('Are you sure to delete this submenu ?');">Delete</a>
        </td>
    </tr>
    <?php endfor; endif; ?>
</table>










<?php else: ?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td colspan="5">
            <a href="menu_builder.php?action=add_menu"> Add new menu </a>
        </td>
    </tr>
    <tr bgcolor="#bbbbbb" align="center">
        <td>
            #
        </td>
        <td>
            Title
        </td>
        <td>
            URL
        </td>
        <td>
            Sub menu
        </td>
        <td>
        		Sort
        </td>
        <td>
            Action
        </td>
    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['admin_menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php echo $this->_sections['i']['index']+1; ?>

        </td>
        <td>
            <?php echo $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['title']; ?>

        </td>
        <td>
            <?php echo $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['url']; ?>

        </td>
        <td>
           <a href="menu_builder.php?action=sub_menu&menu_id=<?php echo $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['id']; ?>
"> view(<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'count_submenu', 'menu_id' => $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['id'])), $this); ?>
)</a>
        </td>
        <td>
            <a href="menu_builder.php?a=up&pid=<?php echo $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['id']; ?>
"><img src="../images/up.gif" border="0"></a> &nbsp <a href="menu_builder.php?a=down&pid=<?php echo $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['id']; ?>
"><img src="../images/down.gif" border="0"></a>
        </td>        
        <td>
            <a href="menu_builder.php?action=add_menu&menu_id=<?php echo $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['id']; ?>
">Edit</a> | <a href="menu_builder.php?delete=<?php echo $this->_tpl_vars['admin_menu'][$this->_sections['i']['index']]['id']; ?>
" onclick="return confirm('Are you sure to delete this menu ?');">Delete</a>
        </td>
    </tr>
    <?php endfor; endif; ?>
</table>
<?php endif; ?>