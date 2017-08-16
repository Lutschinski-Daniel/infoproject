<?php
/* Smarty version 3.1.30, created on 2017-08-16 17:17:54
  from "C:\xampp\htdocs\Crexam\templates\exam_questions.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599462228bbf46_23220964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '243b084146ac9590ea1836ab224c04787704f6db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_questions.tpl',
      1 => 1502896579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./exam_question.tpl' => 3,
  ),
),false)) {
function content_599462228bbf46_23220964 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2 class="vorschlag-titel">Klausurvorschlag</h2>
<?php if (isset($_smarty_tpl->tpl_vars['exam_average']->value)) {?><div class="exam-average">Durchschnittliche Schwierigkeit: <?php echo $_smarty_tpl->tpl_vars['exam_average']->value;?>
</div><?php }
if (isset($_smarty_tpl->tpl_vars['exam_points']->value)) {?><div class="exam-points">Tatsächliche Punkte: <span><?php echo $_smarty_tpl->tpl_vars['exam_points']->value;?>
</span></div><?php }
if (count($_smarty_tpl->tpl_vars['questions']->value['MC']) > 0) {?>
    <div class="type-title">Multiple-Choice</div>
    <div class="exam-questions-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['MC'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
            <div class="exam-question"> 
                <?php $_smarty_tpl->_subTemplateRender("file:./exam_question.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>   
<?php }
if (count($_smarty_tpl->tpl_vars['questions']->value['WI']) > 0) {?>
    <div class="type-title">Wissen</div>
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
    <div class="type-title">Transfer</div>
    <div class="exam-questions-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['TR'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
            <div class="exam-question"> 
                <?php $_smarty_tpl->_subTemplateRender("file:./exam_question.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>   
<?php }
}
}
