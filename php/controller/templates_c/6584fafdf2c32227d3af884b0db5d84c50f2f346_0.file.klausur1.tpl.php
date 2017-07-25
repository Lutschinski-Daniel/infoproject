<?php
/* Smarty version 3.1.30, created on 2017-07-25 18:38:18
  from "C:\xampp\htdocs\Crexam\vorlage\klausur1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597773faa498f7_13226169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6584fafdf2c32227d3af884b0db5d84c50f2f346' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\vorlage\\klausur1.tpl',
      1 => 1501000688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597773faa498f7_13226169 (Smarty_Internal_Template $_smarty_tpl) {
?>
\documentclass{article}
\title{Klausurtest}
\author{Bud Spencer}
\date{30.06.17}
\begin{document}
\maketitle
\newpage
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value, 'question');
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

\end{document}

<?php }
}
