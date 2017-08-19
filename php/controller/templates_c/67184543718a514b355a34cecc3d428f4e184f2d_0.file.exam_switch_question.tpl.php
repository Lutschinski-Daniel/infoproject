<?php
/* Smarty version 3.1.30, created on 2017-08-19 13:43:48
  from "C:\xampp\htdocs\Crexam\templates\exam_switch_question.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59982474cfa763_64182021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67184543718a514b355a34cecc3d428f4e184f2d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_switch_question.tpl',
      1 => 1503136849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59982474cfa763_64182021 (Smarty_Internal_Template $_smarty_tpl) {
?>
<span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
 </span>
<span class="switch-btn" title="Diese Frage wählen"><i class="material-icons">swap_horiz</i></span> 
<span class="quesiton-type"><b>
    <?php if ($_smarty_tpl->tpl_vars['question']->value->type == 0) {?>
        MC
    <?php } elseif ($_smarty_tpl->tpl_vars['question']->value->type == 1) {?>    
        WI
    <?php } else { ?>
        TR
    <?php }?></b>
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
    <div class="switch-question-text"><b>F:</b> <?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
</div>
<hr>
<?php }
}
