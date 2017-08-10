<?php
/* Smarty version 3.1.30, created on 2017-08-10 20:52:06
  from "C:\xampp\htdocs\Crexam\templates\exam_update.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598cab56345a98_23699088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f54d55ed9d5073977ae6ae280255636a021321a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_update.tpl',
      1 => 1502391107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598cab56345a98_23699088 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['question']->value)) {?>
    <div class="exam-question"> 
        <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
</span>
        <span class="vorschlag-question-top">TOP</span>
        <span class="vorschlag-question-up">UP</span>
        <span class="vorschlag-question-down">DOWN</span>
        <span class="vorschlag-question-bot">BOT</span>
        <span class="vorschlag-question-switch">Switch</span>
        <div class='exam-question-text'><?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
</div>
        <hr>
    </div>
<?php }
}
}
