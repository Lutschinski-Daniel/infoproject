<?php
/* Smarty version 3.1.30, created on 2017-08-09 21:40:06
  from "C:\xampp\htdocs\Crexam\templates\exam_switch.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598b65160c3c35_53401186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be4d755dff502afc1a46a256e02a9f67ac872668' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_switch.tpl',
      1 => 1502307596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598b65160c3c35_53401186 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div>
    <?php if (isset($_smarty_tpl->tpl_vars['quests_bypassed']->value) && count($_smarty_tpl->tpl_vars['quests_bypassed']->value) > 0) {?>
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die übersprungen wurde(n) (da Klausur sonst zu schwer/zu leicht):
            </div>
            
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quests_bypassed']->value, 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
                <div class="switch-question"> 
                    <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
 </span>
                    <span class="switch-btn">+</span> <?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
 
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['quests_unused']->value) && count($_smarty_tpl->tpl_vars['quests_unused']->value) > 0) {?>
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die nicht genutzt wurde(n):
            </div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quests_unused']->value, 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
                <div class="switch-question"> 
                    <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
 </span>
                    <span class="switch-btn">+</span> <?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
 
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    <?php }?>
</div>  <?php }
}
