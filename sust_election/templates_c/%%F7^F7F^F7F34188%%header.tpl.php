<?php /* Smarty version 2.6.6, created on 2010-10-03 19:40:21
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'show_day', 'header.tpl', 24, false),array('insert', 'show_date', 'header.tpl', 24, false),array('modifier', 'date_format', 'header.tpl', 24, false),)), $this); ?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"  />
<meta http-equiv="Content-Language" content="en-us" />

<TITLE><?php echo $this->_tpl_vars['PROJECT_NAME']; ?>
</TITLE>

<meta name="KeyWords" content="">
<meta name="author" content="Hasan Mohammad">
<meta name="Description" content="">
<meta http-equiv="Content-Language" content="en-us" />
<meta name="language" content="en">
<meta http-equiv="content-language" content="en">

<link href="css/admin.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/main.js"></script>
</head>
<BODY>
    <div id="border-top">
        <div>
            <div>
                <span class="title" ><font color="#ffffff" face="Arial Narrow"><?php if ($this->_tpl_vars['election']['date'] == $this->_tpl_vars['current_date']): ?> <?php echo $this->_tpl_vars['election']['title'];  else:  echo $this->_tpl_vars['PROJECT_NAME']; ?>
 <?php endif; ?></font>  </span>
                <span class="date"><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_day', 'assign' => 'day')), $this);  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'show_date', 'assign' => 'date')), $this);  echo $this->_tpl_vars['day']; ?>
 , <?php echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</span>
            </div>
        </div>
    </div>

    <div id="content-box">

<TABLE WIDTH="100%" height="400" BORDER=0 CELLPADDING=1 CELLSPACING=0 ALIGN="center" bgcolor="#FFFFFF">
<tr><td valign="top">

        <table cellpadding="5" cellspacing="5" width="100%" bgcolor="#FFFFFF">



            <td align="center" valign="top">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "errmsg.tpl", 'smarty_include_vars' => array('width' => '400')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


