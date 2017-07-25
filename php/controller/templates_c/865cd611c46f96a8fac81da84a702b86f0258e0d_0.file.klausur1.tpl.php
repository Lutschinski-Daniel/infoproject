<?php
/* Smarty version 3.1.30, created on 2017-07-25 18:13:29
  from "C:\xampp\htdocs\Crexam\klausur_layout\klausur1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59776e297a9006_85332050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '865cd611c46f96a8fac81da84a702b86f0258e0d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\klausur_layout\\klausur1.tpl',
      1 => 1500999191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59776e297a9006_85332050 (Smarty_Internal_Template $_smarty_tpl) {
?>
\documentclass{ article }
\title{ Klausurtest }
\author{ Bud Spencer }
\date{ 30.06.17 }
\begin{ document }
\maketitle
\newpage
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, 'questions', 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
\section{ Frage }
    <?php echo $_smarty_tpl->tpl_vars['question']->value;?>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

\end{ document }

<?php }
}
