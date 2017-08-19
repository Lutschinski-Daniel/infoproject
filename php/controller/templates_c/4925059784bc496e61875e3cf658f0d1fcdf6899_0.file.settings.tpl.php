<?php
/* Smarty version 3.1.30, created on 2017-08-19 14:03:57
  from "C:\xampp\htdocs\Crexam\templates\settings.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5998292d595191_99880202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4925059784bc496e61875e3cf658f0d1fcdf6899' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\settings.tpl',
      1 => 1503136849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5998292d595191_99880202 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Einstellungen</h1>
<h3>Globale Einstellungen:</h3>
<div>Bsp. durchschnittliche Schwierigkeit von Klausuren</div>
<div>Bsp. Antworten in Vorschlag ein/ausschalten</div>
<div>Bsp. Defaults der Select-Boxen</div>
<div>...</div>
<h3>Vorlage hier anpassen:</h3>
<br />
<textarea class="vorlage-textarea" cols="60" rows="40" spellcheck="false"><?php echo $_smarty_tpl->tpl_vars['vorlage']->value;?>
</textarea>
<br />
<button class="save-vorlage-btn" value="speichern">
    speichern
</button><?php }
}
