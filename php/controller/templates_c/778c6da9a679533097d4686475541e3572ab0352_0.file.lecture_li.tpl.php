<?php
/* Smarty version 3.1.30, created on 2017-08-19 12:47:09
  from "C:\xampp\htdocs\Crexam\templates\lecture_li.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5998172d55c6a0_79516188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '778c6da9a679533097d4686475541e3572ab0352' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_li.tpl',
      1 => 1503139619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5998172d55c6a0_79516188 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li class="lecture">
    <a href="#" id="<?php echo $_smarty_tpl->tpl_vars['lecture']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['lecture']->value->bezeichnung_kurz;?>
</a>
</li><?php }
}
