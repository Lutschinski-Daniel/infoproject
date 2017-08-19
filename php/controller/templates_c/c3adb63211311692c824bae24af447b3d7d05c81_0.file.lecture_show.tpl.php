<?php
/* Smarty version 3.1.30, created on 2017-08-19 12:38:03
  from "C:\xampp\htdocs\Crexam\templates\lecture_show.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5998150ba69e16_31404698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3adb63211311692c824bae24af447b3d7d05c81' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_show.tpl',
      1 => 1503138822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5998150ba69e16_31404698 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1><?php echo $_smarty_tpl->tpl_vars['lecture']->value->bezeichnung;?>
 (<?php echo $_smarty_tpl->tpl_vars['lecture']->value->bezeichnung_kurz;?>
)</h1>
<h2>Erstellt: <?php echo $_smarty_tpl->tpl_vars['lecture']->value->created;?>
</h2>
<h3>Anzahl Fragen: <?php echo $_smarty_tpl->tpl_vars['anz_fragen']->value;?>
</h3>
Hier könnten noch weiter Infos zu Vorlesung oder beispielsweise Statistiken hinzugefügt werden!<?php }
}
