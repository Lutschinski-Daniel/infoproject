<?php
/* Smarty version 3.1.30, created on 2017-08-14 18:01:43
  from "C:\xampp\htdocs\Crexam\templates\exam_question.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5991c9675bb947_13699883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03f24495972031350d0ca3ec1fc06d20e8802e9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_question.tpl',
      1 => 1502726499,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5991c9675bb947_13699883 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="exam-question"> 
    <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
</span>
    <div class="nav-arrow-div">
        <span class="vorschlag-question-top">TOP</span>
        <span class="vorschlag-question-up">UP</span>
        <span class="vorschlag-question-down">DOWN</span>
        <span class="vorschlag-question-bot">BOT</span>
        <span class="vorschlag-question-switch">Switch</span>
    </div>
    <div class="short-info-div">
        <span class="vorschlag-question-points" title="Punkte"><?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
</span>
        <span class="vorschlag-question-difficulty" title="Schwierigkeitsgrad"><?php echo $_smarty_tpl->tpl_vars['question']->value->difficulty;?>
</span>
        <span class="vorschlag-question-frequency" title="Häufigkeit"><?php echo $_smarty_tpl->tpl_vars['question']->value->frequency;?>
</span>
        <span class="vorschlag-question-last-usage" title="Letzte Verwendung"><?php echo $_smarty_tpl->tpl_vars['question']->value->last_usage;?>
</span>
    </div>
    <div class='exam-question-text'><?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
</div>
    <hr>
</div><?php }
}
