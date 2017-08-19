<?php
/* Smarty version 3.1.30, created on 2017-08-19 12:07:53
  from "C:\xampp\htdocs\Crexam\templates\exam_questions.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59980df9cb99c2_31458463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '243b084146ac9590ea1836ab224c04787704f6db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_questions.tpl',
      1 => 1503136849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./exam_question.tpl' => 3,
  ),
),false)) {
function content_59980df9cb99c2_31458463 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3 class="vorschlag-titel">Klausurvorschlag</h3>
<?php if (isset($_smarty_tpl->tpl_vars['exam_average']->value)) {?><div class="exam-average">Durchschnittliche Schwierigkeit: <b><?php echo $_smarty_tpl->tpl_vars['exam_average']->value;?>
</b></div><?php }
if (isset($_smarty_tpl->tpl_vars['exam_points']->value)) {?><div class="exam-points">Tatsächliche Punkte: <span><?php echo $_smarty_tpl->tpl_vars['exam_points']->value;?>
</span></div><?php }
if (count($_smarty_tpl->tpl_vars['questions']->value['MC']) > 0) {?>
    <div class="type-title">Typ: Multiple-Choice</div>
    <div class="exam-questions-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['MC'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender("file:./exam_question.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>   
<?php }
if (count($_smarty_tpl->tpl_vars['questions']->value['WI']) > 0) {?>
    <div class="type-title">Typ: Wissen</div>
    <div class="exam-questions-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['WI'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender("file:./exam_question.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>   
<?php }
if (count($_smarty_tpl->tpl_vars['questions']->value['TR']) > 0) {?>
    <div class="type-title">Typ: Transfer</div>
    <div class="exam-questions-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['TR'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
            <?php $_smarty_tpl->_subTemplateRender("file:./exam_question.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>   
<?php }
}
}
