<?php
/* Smarty version 3.1.30, created on 2017-07-22 10:42:15
  from "C:\xampp\htdocs\Crexam\templates\exam.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59730fe752d136_66656000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69340f40b2655043bad288a164c98d6bc8ca97bd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam.tpl',
      1 => 1500712904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59730fe752d136_66656000 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Klausur für: <?php echo $_smarty_tpl->tpl_vars['lecture']->value;?>
</h1>
<!--
<div class="exam-user-input">
<label>
    Klausurlänge:
</label>
<select class="exam-laenge">
    <option>60</option>
    <option>90</option>
    <option>120</option>
</select><br />

<label>
    Punkte (max):
</label>
<input type="number" name="exam-punkte" min="1" max="200" class="exam-punkte" col="3"/><br />

<label>
    Klausurdatum: 
</label>
<input name="exam-date" col="20"/><br />
</div>
-->
<ul class="exam-user-input-list">
<li>
    Klausurlänge: 
    <select class="exam-laenge">
    <option>60</option>
    <option>90</option>
    <option>120</option>
</select>
</li>
<li>
    Punkte (max):
    <input type="number" name="exam-punkte" min="1" max="200" class="exam-punkte" col="3"/>
</li>
<li>
    Klausurdatum: 
    <input name="exam-date" class="exam-date"/><br />
</li>
</ul><?php }
}
