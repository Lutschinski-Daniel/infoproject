<?php
/* Smarty version 3.1.30, created on 2017-08-08 20:12:28
  from "C:\xampp\htdocs\Crexam\templates\exam.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5989ff0ce72787_34388411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69340f40b2655043bad288a164c98d6bc8ca97bd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam.tpl',
      1 => 1502215943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5989ff0ce72787_34388411 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Klausur für: <?php echo $_smarty_tpl->tpl_vars['lecture']->value;?>
</h1>

<ul class="exam-input-list">
    <li>
        Klausurlänge: 
        <select class="exam-laenge">
            <option value="60">60</option>
            <option value="90">90</option>
            <option value="120">120</option>
        </select>
    </li>
    <li>
        Punkte (max):
        <input type="number" name="exam-punkte" min="1" max="200" value="<?php echo $_smarty_tpl->tpl_vars['punkte']->value;?>
" class="exam-punkte" col="3"/>
    </li>
    <li>
        Klausurdatum: 
        <input name="exam-date" class="exam-date" value="<?php echo $_smarty_tpl->tpl_vars['datum']->value;?>
"/><br />
    </li>
</ul>
<button class="exam-create-vorschlag">
    Klausurvorschlag
</button>
<?php if ($_smarty_tpl->tpl_vars['questions']->value != '') {?>
    <h2 class="vorschlag-titel">Klausurvorschlag</h2>
    <?php if (isset($_smarty_tpl->tpl_vars['exam_average']->value)) {?><div class="exam-average">Durchschnittliche Schwierigkeit: <?php echo $_smarty_tpl->tpl_vars['exam_average']->value;?>
</div><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['exam_points']->value)) {?><div class="exam-points">Tatsächliche Punkte: <?php echo $_smarty_tpl->tpl_vars['exam_points']->value;?>
</div><?php }?>
    <div class="exam-questions-box">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value, 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
            <div class="exam-question">
                <span class="vorschlag-question-top">TOP</span>
                <span class="vorschlag-question-up">UP</span>
                <span class="vorschlag-question-down">DOWN</span>
                <span class="vorschlag-question-bot">BOT</span>
                <span class="vorschlag-question-switch">Switch</span>
                Frage: <?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>

            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>    
    <button class="exam-create-btn">
        Klausur erstellen
    </button>
<?php }
}
}
