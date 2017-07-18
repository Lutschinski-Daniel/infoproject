<?php
/* Smarty version 3.1.30, created on 2017-07-18 14:37:11
  from "C:\xampp\htdocs\Crexam\templates\lecture_show.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596e00f7745c33_20762412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3adb63211311692c824bae24af447b3d7d05c81' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_show.tpl',
      1 => 1500381427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596e00f7745c33_20762412 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1><?php echo $_smarty_tpl->tpl_vars['bez_kurz']->value;?>
</h1>
<h2><?php echo $_smarty_tpl->tpl_vars['bez']->value;?>
</h2>
Anzahl Fragen: <?php echo $_smarty_tpl->tpl_vars['anz_fragen']->value;?>

Peter: <?php echo $_smarty_tpl->tpl_vars['obj']->value->peter;
}
}
