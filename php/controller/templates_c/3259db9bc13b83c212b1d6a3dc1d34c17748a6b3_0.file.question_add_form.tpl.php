<?php
/* Smarty version 3.1.30, created on 2017-07-19 22:31:33
  from "C:\xampp\htdocs\Crexam\templates\question_add_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596fc1a56d6d10_42143710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3259db9bc13b83c212b1d6a3dc1d34c17748a6b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\question_add_form.tpl',
      1 => 1500496289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596fc1a56d6d10_42143710 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Neue Frage erstellen für Vorlesung: <?php echo $_smarty_tpl->tpl_vars['vorlesung']->value;?>
</h1>

<div class="add-question-form">
    <label>Typ:</label> 
    <select class="frage-typ" name="frage-typ">
        <option value="0">Multiple-Choice</option>
        <option value="1" selected>Frage-Anwort</option>
    </select><br>
    <label class="frage-text-label">Fragetext:</label> <br />
    <textarea name="frage-text" rows="5" class="frage-antwort-textareas"></textarea>
    <br>
    <div class="frage-typ-platzhalter">
        <div class="mult-ch-platzhalter platzhalter update-mc-antworten">
            <label class="mc-antwort-label">Anworten:</label><br />
            <?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['anworten_default']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['anworten_default']->value-1)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
                <span class="mc-antwort"><input type="text" name="antwort"></input>
                    <input name="antwort-gruppe" type="checkbox" value="WAHR">WAHR</input></span><br />
            <?php }
}
?>

            <button class="add-answer-btn">Zusätzliche Antwort</button><br />
            <label>Punkte: </label><label class="mc-punkte-label">0</label>
        </div>
        <div class="frag-ant-platzhalter">
            <label>Musterantwort:</label><br />
            <textarea name="antwort-text" rows="6" cols="50" class="frage-antwort-textareas"></textarea><br />
            <label class="punkte-label">Punkte: </label><input id="frage-antwort-punkte" type="number" name="points" value="10" max="50" min="1"></input>
        </div>
    </div>
    <label>Schwierigkeit ( 1 = leicht, 5 = schwer ):</label> 
    <select class="difficulty" name="difficulty">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <label>Häufigkeit ( 1 = selten, 5 = häufig ):</label> 
    <select class="frequency" name="frequency">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <label>Platzbedarf ( halbe Seiten x ... ):</label> 
    <select class="space-needed" name="space-needed">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="4">4</option>
    </select>
    <br>
    <button class="create-question-btn">Erstellen</button>
</div><?php }
}
