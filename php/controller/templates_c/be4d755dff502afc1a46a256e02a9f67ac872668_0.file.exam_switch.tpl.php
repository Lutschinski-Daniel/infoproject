<?php
/* Smarty version 3.1.30, created on 2017-08-13 19:34:42
  from "C:\xampp\htdocs\Crexam\templates\exam_switch.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59908db2335cc7_41997562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be4d755dff502afc1a46a256e02a9f67ac872668' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_switch.tpl',
      1 => 1502645665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59908db2335cc7_41997562 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once 'C:\\xampp\\htdocs\\Crexam\\libs\\plugins\\function.counter.php';
?>
<div class="switch-box">
    <?php smarty_function_counter(array('assign'=>'i','start'=>0,'print'=>false),$_smarty_tpl);?>

    <?php if (isset($_smarty_tpl->tpl_vars['quests']->value['BY']) && count($_smarty_tpl->tpl_vars['quests']->value['BY']) > 0) {?>
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die übersprungen wurde(n) (da Klausur sonst zu schwer/zu leicht):
            </div>
            
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quests']->value['BY'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
                <div class="switch-question"> 
                    <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
 </span>
                    <span class="switch-btn">+</span> 
                    <?php if ($_smarty_tpl->tpl_vars['question']->value->type == 0) {?>
                        MC
                    <?php } elseif ($_smarty_tpl->tpl_vars['question']->value->type == 1) {?>    
                        WI
                    <?php } else { ?>
                        TR
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
 
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

        </div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['quests']->value['UN']) && count($_smarty_tpl->tpl_vars['quests']->value['UN']) > 0) {?>
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die nicht genutzt wurde(n):
            </div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quests']->value['UN'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
                <div class="switch-question"> 
                    <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
 </span>
                    <span class="switch-btn">+</span>
                    <?php if ($_smarty_tpl->tpl_vars['question']->value->type == 0) {?>
                        MC
                    <?php } elseif ($_smarty_tpl->tpl_vars['question']->value->type == 1) {?>    
                        WI
                    <?php } else { ?>
                        TR
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
 
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

        </div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['quests']->value['SW']) && count($_smarty_tpl->tpl_vars['quests']->value['SW']) > 0) {?>
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die schon getauscht wurde(n):
            </div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quests']->value['SW'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
                <div class="switch-question"> 
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
                    <?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
 
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {?>
        <div  class="switch-questions-box">
            Keine passende Frage vorhanden!
        </div>
    <?php }?>
    <span class="cancel-switch-btn">cancel</span>
</div>  <?php }
}
