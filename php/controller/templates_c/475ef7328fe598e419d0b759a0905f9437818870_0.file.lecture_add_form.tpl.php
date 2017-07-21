<?php
/* Smarty version 3.1.30, created on 2017-07-21 16:34:00
  from "C:\xampp\htdocs\Crexam\templates\lecture_add_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597210d8865b78_38455010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '475ef7328fe598e419d0b759a0905f9437818870' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_add_form.tpl',
      1 => 1500647241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597210d8865b78_38455010 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Neue Vorlesung erstellen</h1>

<div class="add-lecture-form">
    <label>Name:</label> 
    <br>
    <input type="text" name="bezeichnung"></input>
    <br>
    <label>Kürzel (max. 8 Zeichen):</label> 
    </br>
    <input type="text" name="bezeichnung_kurz" maxlength="8"></input>
    <br>
    <button class="create-lecture-btn">Erstellen</button>
</div><?php }
}
