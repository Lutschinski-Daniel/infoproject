<?php
/* Smarty version 3.1.30, created on 2017-07-18 16:10:43
  from "C:\xampp\htdocs\Crexam\templates\questions_show_all.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596e16e36906b7_20092631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '652ab5478c83a528e58fff56fea01ad0c8f192a8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\questions_show_all.tpl',
      1 => 1500387038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596e16e36906b7_20092631 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value, 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
    <section class="question-box" id="<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">
        <div>Fragetext: <?php echo $_smarty_tpl->tpl_vars['question']->value['text'];?>
</div>
        <?php if ($_smarty_tpl->tpl_vars['question']->value['type'] == 0) {?> <!--Mult-Choice-->
            <?php $_smarty_tpl->_assignInScope('answers', json_decode($_smarty_tpl->tpl_vars['question']->value['answer'],1));
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['answers']->value, 'mc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mc']->value) {
?>
                <div>
                    <label class="true-false-label">
                    <?php if ($_smarty_tpl->tpl_vars['mc']->value['wahrheitswert'] == false) {?>
                        (F)
                    <?php } else { ?>
                        (W)
                    <?php }?>
                    </label>
                    <?php echo $_smarty_tpl->tpl_vars['mc']->value['antwort'];?>
 
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?><!--Frage-Antwort-->
        <div>Musterantwort: <?php echo $_smarty_tpl->tpl_vars['question']->value['answer'];?>
</div>
        <?php }?>
        <ul class="question-additional-info">
            <li>Schwierigkeit: <?php echo $_smarty_tpl->tpl_vars['question']->value['difficulty'];?>
</li>
            <li>Häufigkeit: <?php echo $_smarty_tpl->tpl_vars['question']->value['frequency'];?>
</li>
            <li>Punkte: <?php echo $_smarty_tpl->tpl_vars['question']->value['points'];?>
</li>
            <li>Platzbedarf: <?php echo $_smarty_tpl->tpl_vars['question']->value['space'];?>
</li>
        </ul>
    </section>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



<?php }
}
