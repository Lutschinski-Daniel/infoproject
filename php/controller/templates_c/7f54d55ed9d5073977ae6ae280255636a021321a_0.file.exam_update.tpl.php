<?php
/* Smarty version 3.1.30, created on 2017-08-13 20:07:29
  from "C:\xampp\htdocs\Crexam\templates\exam_update.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59909561e315e1_92198062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f54d55ed9d5073977ae6ae280255636a021321a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_update.tpl',
      1 => 1502647599,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59909561e315e1_92198062 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2 class="vorschlag-titel">Klausurvorschlag</h2>
<?php if (isset($_smarty_tpl->tpl_vars['exam_average']->value)) {?><div class="exam-average">Durchschnittliche Schwierigkeit: <?php echo $_smarty_tpl->tpl_vars['exam_average']->value;?>
</div><?php }
if (isset($_smarty_tpl->tpl_vars['exam_points']->value)) {?><div class="exam-points">Tatsächliche Punkte: <?php echo $_smarty_tpl->tpl_vars['exam_points']->value;?>
</div><?php }
if (count($_smarty_tpl->tpl_vars['questions']->value['MC']) > 0) {?>
    <div class="type-title">Multiple-Choice</div>
    <div class="exam-questions-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['MC'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
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
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>   
<?php }
}
}
