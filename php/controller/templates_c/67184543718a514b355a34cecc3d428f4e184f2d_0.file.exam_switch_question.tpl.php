<?php
/* Smarty version 3.1.30, created on 2017-08-14 18:28:06
  from "C:\xampp\htdocs\Crexam\templates\exam_switch_question.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5991cf96a68949_48669089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67184543718a514b355a34cecc3d428f4e184f2d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_switch_question.tpl',
      1 => 1502728079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5991cf96a68949_48669089 (Smarty_Internal_Template $_smarty_tpl) {
?>
<span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
 </span>
<span class="switch-btn">+</span> 
<span class="quesiton-type">
    <?php if ($_smarty_tpl->tpl_vars['question']->value->type == 0) {?>
        MC
    <?php } elseif ($_smarty_tpl->tpl_vars['question']->value->type == 1) {?>    
        WI
    <?php } else { ?>
        TR
    <?php }?>
</span>
<span class="switch-question-info">
    <span title="Punkte"><?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
</span>
    <span title="Schwierigkeit"><?php echo $_smarty_tpl->tpl_vars['question']->value->difficulty;?>
</span>
    <span title="Häufigkeit"><?php echo $_smarty_tpl->tpl_vars['question']->value->frequency;?>
</span>
    <span title="Häufigkeit"><?php echo $_smarty_tpl->tpl_vars['question']->value->last_usage;?>
</span>
</span>
<div class="switch-question-text"><?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
</div>
<hr>
<?php }
}
