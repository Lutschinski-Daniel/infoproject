<?php
/* Smarty version 3.1.30, created on 2017-08-10 20:23:45
  from "C:\xampp\htdocs\Crexam\templates\exam.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598ca4b1252514_45582338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69340f40b2655043bad288a164c98d6bc8ca97bd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam.tpl',
      1 => 1502389377,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598ca4b1252514_45582338 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php if (isset($_smarty_tpl->tpl_vars['questions']->value)) {?>
    <div class="exam-box">
        <h2 class="vorschlag-titel">Klausurvorschlag</h2>
        <?php if (isset($_smarty_tpl->tpl_vars['exam_average']->value)) {?><div class="exam-average">Durchschnittliche Schwierigkeit: <?php echo $_smarty_tpl->tpl_vars['exam_average']->value;?>
</div><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['exam_points']->value)) {?><div class="exam-points">Tatsächliche Punkte: <?php echo $_smarty_tpl->tpl_vars['exam_points']->value;?>
</div><?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['questions']->value['MC']) > 0) {?>
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
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['questions']->value['WI']) > 0) {?>
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
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['questions']->value['TR']) > 0) {?>
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
        <?php }?>
    </div>
    <button class="exam-create-btn">
        Klausur erstellen
    </button>
<?php }
}
}
