<?php
/* Smarty version 3.1.30, created on 2017-07-13 17:39:35
  from "C:\xampp\htdocs\Crexam\templates\lecture_show.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5967943701f923_80008496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3adb63211311692c824bae24af447b3d7d05c81' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_show.tpl',
      1 => 1499960368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5967943701f923_80008496 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Vorlesung: <?php echo $_smarty_tpl->tpl_vars['bez_kurz']->value;?>
</h1>
<h2><?php echo $_smarty_tpl->tpl_vars['bez']->value;?>
</h2>
Anzahl Fragen: <?php echo $_smarty_tpl->tpl_vars['anz_fragen']->value;
}
}
