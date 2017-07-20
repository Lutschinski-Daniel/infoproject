<?php
/* Smarty version 3.1.30, created on 2017-07-20 19:42:32
  from "C:\xampp\htdocs\Crexam\templates\lecture_navbar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5970eb88b05227_31419390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f02a19a81fc64cdfe6b2df7375fba65304620b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\lecture_navbar.tpl',
      1 => 1500572549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5970eb88b05227_31419390 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class = "lectures-list">
    <li class = "add-lecture-btn">
        <a href = "#">+</a>
    </li>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lectures']->value, 'lecture');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lecture']->value) {
?>
        <li class="lecture">
            <a href="#" id="<?php echo $_smarty_tpl->tpl_vars['lecture']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lecture']->value['bezeichnung_kurz'];?>
</a>
        </li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul><?php }
}
