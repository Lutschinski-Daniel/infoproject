<?php
/* Smarty version 3.1.30, created on 2017-08-16 17:06:23
  from "C:\xampp\htdocs\Crexam\templates\exam_question.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59945f6fbd3731_75165637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03f24495972031350d0ca3ec1fc06d20e8802e9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_question.tpl',
      1 => 1502895902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59945f6fbd3731_75165637 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="exam-question"> 
    <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
</span>
    <div class="nav-arrow-div">
        <span class="vorschlag-question-delete" title="Aufgabe aus Klausur entfernen">X</span>
        <span class="vorschlag-question-top">TOP</span>
        <span class="vorschlag-question-up">UP</span>
        <span class="vorschlag-question-down">DOWN</span>
        <span class="vorschlag-question-bot">BOT</span>
        <span class="vorschlag-question-switch">Switch</span>
        
        <?php if ($_smarty_tpl->tpl_vars['question']->value->type != 0) {?>
        <span class="vorschlag-question-edit" title="Punkte der Aufgabe nur für diese Klausur anpassen">E</span>
        <span class="point-minus hidden" title="Punktzahl verringern">-</span>
        <span class="point-plus hidden" title="Punktzahl erhöhen">+</span>
        <span class="point-done hidden" title="Punktanpassung abschließen">H</span>
        <?php }?>
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
