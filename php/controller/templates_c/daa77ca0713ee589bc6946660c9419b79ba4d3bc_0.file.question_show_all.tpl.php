<?php
/* Smarty version 3.1.30, created on 2017-08-08 22:23:32
  from "C:\xampp\htdocs\Crexam\templates\question_show_all.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598a1dc4de9592_01501450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daa77ca0713ee589bc6946660c9419b79ba4d3bc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\question_show_all.tpl',
      1 => 1502223808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598a1dc4de9592_01501450 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Alle Fragen der Vorlesung: <?php echo $_smarty_tpl->tpl_vars['lecture_bez']->value;?>
!</h1>
<div>Durchschnittliche Schwierigkeit: <?php echo $_smarty_tpl->tpl_vars['average']->value;?>
</div>
<div>Anzahl Fragen: <?php echo $_smarty_tpl->tpl_vars['quest_count']->value;?>
</div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value, 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
    <section class="question-box" id="<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
">
        <div class="question-box-frage-text">Fragetext: <?php echo $_smarty_tpl->tpl_vars['question']->value['text'];?>

        </div>
        <div class="question-box-antwort">
        <?php if ($_smarty_tpl->tpl_vars['question']->value['type'] == 0) {?> <!--Mult-Choice-->
            <?php $_smarty_tpl->_assignInScope('answers', json_decode($_smarty_tpl->tpl_vars['question']->value['answer'],1));
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['answers']->value, 'mc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mc']->value) {
?>
                <span>
                    <label class="true-false-label">
                        <?php if ($_smarty_tpl->tpl_vars['mc']->value['wahrheitswert'] == false) {?>
                            (F)
                        <?php } else { ?>
                            (W)
                        <?php }?>
                    </label>
                    <?php echo $_smarty_tpl->tpl_vars['mc']->value['antwort'];?>
 
                </span><br>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?><!--Frage-Antwort-->
            Musterantwort: <?php echo $_smarty_tpl->tpl_vars['question']->value['answer'];?>

        <?php }?>
        </div>
        <ul class="question-additional-info">
            <li>Punkte: <?php echo $_smarty_tpl->tpl_vars['question']->value['points'];?>
</li>
            <li>Schwierigkeit: <?php echo $_smarty_tpl->tpl_vars['question']->value['difficulty'];?>
</li>
            <li>Häufigkeit: <?php echo $_smarty_tpl->tpl_vars['question']->value['frequency'];?>
</li>
            <?php if ($_smarty_tpl->tpl_vars['question']->value['type'] == 1) {?><li>Platzbedarf: <?php echo $_smarty_tpl->tpl_vars['question']->value['space'];?>
</li><?php }?>
        </ul>
        <span class="edit-question edit-toggle">E</span>
        <span class="delete-question">X</span>
    </section>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



<?php }
}
