<?php
/* Smarty version 3.1.30, created on 2017-07-25 17:43:54
  from "C:\xampp\htdocs\Crexam\templates\settings.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5977673a560781_56036248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4925059784bc496e61875e3cf658f0d1fcdf6899' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\settings.tpl',
      1 => 1500997430,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5977673a560781_56036248 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Einstellungen</h1>
<h2>Globale Einstellungen:</h2>
<h2>Vorlagen-Änderungen hierher:</h2>
<br />
<textarea class="vorlage-textarea" cols="60" rows="40" spellcheck="false"><?php echo $_smarty_tpl->tpl_vars['vorlage']->value;?>
</textarea>
<br />
<button class="save-vorlage-btn">
    speichern
</button><?php }
}
