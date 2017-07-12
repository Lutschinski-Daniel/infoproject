<?php
/* Smarty version 3.1.30, created on 2017-07-12 17:22:49
  from "C:\xampp\htdocs\Crexam\templates\lecture_add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59663ec98ebcd2_77744057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'acc6776a16ca57ae57dfb3a1c216b3e084471e10' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_add.tpl',
      1 => 1499872964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59663ec98ebcd2_77744057 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Neue Vorlesung erstellen</h1>

<div class="add-lecture-form">
    <label>Name:</label> 
    <br>
    <input type="text" name="bezeichnung"></span>
    <br>
    <label>Kürzel (max. 6 Zeichen):</label> 
    </br>
    <input type="text" name="bezeichnung_kurz" maxlength="6"></span>
    <br>
    <button class="create-lecture-btn">Erstellen</button>
</div><?php }
}
