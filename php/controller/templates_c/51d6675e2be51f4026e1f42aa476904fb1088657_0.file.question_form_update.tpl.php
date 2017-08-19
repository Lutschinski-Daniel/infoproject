<?php
/* Smarty version 3.1.30, created on 2017-08-19 12:16:35
  from "C:\xampp\htdocs\Crexam\templates\question_form_update.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59981003ac11d3_07637000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51d6675e2be51f4026e1f42aa476904fb1088657' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\question_form_update.tpl',
      1 => 1503137716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59981003ac11d3_07637000 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="question-update-form" id="<?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
">

    <label class="frage-text-label">Fragetext:</label> <br />
    <textarea name="frage-text" rows="5" class="frage-antwort-textareas"><?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
</textarea>
    <br>
    <?php if (($_smarty_tpl->tpl_vars['question']->value->type === 0)) {?>
        <label class="mc-antwort-label">Anworten:</label><br />
        <?php $_smarty_tpl->_assignInScope('answers', json_decode($_smarty_tpl->tpl_vars['question']->value->answer,1));
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['answers']->value, 'mc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mc']->value) {
?>
            <span class="mc-antwort">
                <input type="text" name="antwort" value="<?php echo $_smarty_tpl->tpl_vars['mc']->value['antwort'];?>
"></input><!--
                --><input name="antwort-gruppe" type="checkbox" value="WAHR" <?php if (($_smarty_tpl->tpl_vars['mc']->value['wahrheitswert'] == 1)) {?>checked<?php }?>>WAHR</input>
            </span><br />
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <button class="add-answer-btn">Zusätzliche Antwort</button><br />
        <label>Punkte: </label><label class="mc-punkte-label">0</label>
    <?php } else { ?>
        <label>Musterantwort:</label><br />
        <textarea name="antwort-text" rows="6" class="frage-antwort-textareas"><?php echo $_smarty_tpl->tpl_vars['question']->value->answer;?>
</textarea><br />
        <label class="punkte-label">Punkte: </label>
        <input id="frage-antwort-punkte" type="number" name="points" value="<?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
" max="50" min="1"></input>
        <br>
        <label>Platzbedarf ( halbe Seiten x ... ):</label> 
        <select class="space-needed" name="space-needed">
            <?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 4+1 - (1) : 1-(4)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
                <?php if (($_smarty_tpl->tpl_vars['var']->value != 3)) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['question']->value->space == $_smarty_tpl->tpl_vars['var']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</option>
                <?php }?>
            <?php }
}
?>

        </select>
    <?php }?>
    <br>
    <label>Schwierigkeit ( 1 = leicht, 5 = schwer ):</label> 
    <select class="difficulty" name="difficulty">
        <?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['question']->value->difficulty == $_smarty_tpl->tpl_vars['var']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</option>
        <?php }
}
?>

    </select>
    <br>
    <label>Häufigkeit ( 1 = selten, 5 = häufig ):</label> 
    <select class="frequency" name="frequency">
        <?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['question']->value->frequency == $_smarty_tpl->tpl_vars['var']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</option>
        <?php }
}
?>

    </select>
    <br>
    <button class="question-update-btn">Update</button>
</div>


<?php }
}
