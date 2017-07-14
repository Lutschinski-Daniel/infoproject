<?php
/* Smarty version 3.1.30, created on 2017-07-14 19:06:00
  from "C:\xampp\htdocs\Crexam\templates\lecture_add_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5968f9f8985f54_80410566',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '475ef7328fe598e419d0b759a0905f9437818870' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_add_form.tpl',
      1 => 1500047994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5968f9f8985f54_80410566 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Neue Vorlesung erstellen</h1>

<div class="add-lecture-form">
    <label>Name:</label> 
    <br>
    <input type="text" name="bezeichnung"></input>
    <br>
    <label>Kürzel (max. 6 Zeichen):</label> 
    </br>
    <input type="text" name="bezeichnung_kurz" maxlength="6"></input>
    <br>
    <button class="create-lecture-btn">Erstellen</button>
</div><?php }
}
