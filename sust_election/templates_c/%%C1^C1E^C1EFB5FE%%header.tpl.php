<?php /* Smarty version 2.6.6, created on 2010-10-03 20:42:23
         compiled from admin/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'show_day', 'admin/header.tpl', 29, false),array('insert', 'show_date', 'admin/header.tpl', 29, false),array('insert', 'get_menu', 'admin/header.tpl', 42, false),array('insert', 'show_menu_url', 'admin/header.tpl', 44, false),array('insert', 'session_menu_id', 'admin/header.tpl', 62, false),array('insert', 'get_submenu', 'admin/header.tpl', 63, false),array('insert', 'show_menu', 'admin/header.tpl', 75, false),array('insert', 'show_sub_url', 'admin/header.tpl', 90, false),array('insert', 'session_sub_id', 'admin/header.tpl', 92, false),array('modifier', 'date_format', 'admin/header.tpl', 29, false),)), $this); ?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE>:: CONTROL PANEL :: <?php echo $this->_tpl_vars['PROJECT_NAME']; ?>
 ::</TITLE>

<meta name="KeyWords" content="">
<meta name="author" content="Hasan Md Suhag Chowdhury">
<meta name="Description" content="">
<meta http-equiv="Content-Language" content="en-us" />
<meta name="language" content="en">
<meta http-equiv="content-language" content="en">

<link href="../css/admin.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/main.js"></script>
<script language="JavaScript" src='../js/innovaeditor.js'></script>
<script language="JavaScript" src='../js/jquery-1.4.2.js'></script>
</head>
<BODY>
    <div id="border-top">
        <div>
            <div>
                <span class="title" ><font color="#ffffff" face="Arial Narrow"><?php echo $this->_tpl_vars['PROJECT_NAME']; ?>
</font> Administration</span>
                <?php if ($_SESSION['ADMIN_USERNAME']): ?>
                <span class="admin">Current User: <b><?php echo $_SESSION['ADMIN_USERNAME']; ?>
</b></span>
                <?php endif; ?>
                <span class="date"><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_day', 'assign' => 'day')), $this);  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_date', 'assign' => 'date')), $this);  echo $this->_tpl_vars['day']; ?>
 , <?php echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</span>
            </div>
        </div>
    </div>
    <div>
        <?php if ($this->_tpl_vars['session']['ADMIN_ID'] != "" && $this->_tpl_vars['top_column'] != 'hide_top_menu'): ?>
        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#1F456E" border="0">
        <tr>
            <td height="20" align="center" colspan="3">
                <table >
                <tr><td>

                        <b>
                        <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_menu', 'assign' => 'menu')), $this); ?>

                        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <a href="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_menu_url', 'url' => $this->_tpl_vars['menu'][$this->_sections['i']['index']]['url'], 'menu_id' => $this->_tpl_vars['menu'][$this->_sections['i']['index']]['id'])), $this); ?>
"class="w"><?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['title']; ?>
</a> &nbsp&nbsp&nbsp
                        <?php endfor; endif; ?>
                        </b>

                </td></tr>
                </table>
        </td></tr>
        </table>
        <?php endif; ?>
    </div>
    <div id="content-box">

<TABLE WIDTH="100%" height="400" BORDER=0 CELLPADDING=1 CELLSPACING=0 ALIGN="center" bgcolor="#FFFFFF">
<tr><td valign="top">

        <table cellpadding="5" cellspacing="5" width="100%" bgcolor="#FFFFFF">
        <tr height="370">
        <?php if ($this->_tpl_vars['request']['menu_id']): ?>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'session_menu_id', 'menu_id' => $this->_tpl_vars['request']['menu_id'])), $this); ?>

            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_submenu', 'assign' => 'submenu', 'menu_id' => $this->_tpl_vars['request']['menu_id'])), $this); ?>

        <?php else: ?>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_submenu', 'assign' => 'submenu', 'menu_id' => $this->_tpl_vars['session']['MENU_ID'])), $this); ?>

        <?php endif; ?>
           <?php if ($this->_tpl_vars['session']['ADMIN_ID'] != "" && $this->_tpl_vars['submenu'][0]['id'] != ""): ?>
            <td width="160" bgcolor="#efefef" valign="top" align="center" >

                <table cellpadding ="2" cellspacing="3" border="0" width="100%" >

                            <?php if ($this->_tpl_vars['request']['menu_id']): ?>                                
                                <tr>
                                        <td>
                                                <b><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_menu', 'menu_id' => $this->_tpl_vars['request']['menu_id'])), $this); ?>
</b>
                                        </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                        <td>
                                                <b><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_menu', 'menu_id' => $this->_tpl_vars['session']['MENU_ID'])), $this); ?>
</b>
                                        </td>
                                </tr>
                            <?php endif; ?>
                        
                        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <td >
                                        <?php if ($this->_tpl_vars['request']['menu_id'] != "" && $this->_sections['i']['index'] == '0'): ?>
                                            <img src="images/right.png" border="0"  width="15"> &nbsp<a href="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_sub_url', 'url' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['url'], 'sub_id' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['id'])), $this); ?>
" ><b><?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['title']; ?>
</b></a>
                                        <?php elseif ($this->_tpl_vars['request']['menu_id'] == "" && $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['id'] == $this->_tpl_vars['request']['sub_id']): ?>
                                            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'session_sub_id', 'sub_id' => $this->_tpl_vars['request']['sub_id'])), $this); ?>

                                            <img src="images/right.png" border="0"  width="15"> &nbsp<a href="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_sub_url', 'url' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['url'], 'sub_id' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['id'])), $this); ?>
" ><b><?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['title']; ?>
</b></a>
                                        <?php elseif ($this->_tpl_vars['request']['menu_id'] == "" && $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['id'] == $this->_tpl_vars['session']['SUB_ID'] && $this->_tpl_vars['request']['sub_id'] == ""): ?>
                                            <img src="images/right.png" border="0"  width="15"> &nbsp<a href="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_sub_url', 'url' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['url'], 'sub_id' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['id'])), $this); ?>
" ><b><?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['title']; ?>
</b></a>
                                        <?php else: ?>
                                            <img src="images/right.png" border="0" width="15"> &nbsp<a href="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_sub_url', 'url' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['url'], 'sub_id' => $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['id'])), $this); ?>
"><?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['title']; ?>
</a>
                                        <?php endif; ?>
                                </td>
                        </tr>
                        <?php endfor; endif; ?>
                        <?php endif; ?>
                </table>
            </td>

            <td align="center" valign="top">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "errmsg.tpl", 'smarty_include_vars' => array('width' => '400')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


