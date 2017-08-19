<?php
/* Smarty version 3.1.30, created on 2017-08-19 12:07:53
  from "C:\xampp\htdocs\Crexam\templates\exam_question.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59980df9d4a260_73475875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03f24495972031350d0ca3ec1fc06d20e8802e9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\templates\\exam_question.tpl',
      1 => 1503136849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59980df9d4a260_73475875 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="exam-question"> 
    <span class="hidden"><?php echo $_smarty_tpl->tpl_vars['question']->value->id;?>
</span>
    <div class="nav-arrow-div">
        <span class="vorschlag-question-delete" title="Aufgabe aus Klausur entfernen"><i class="material-icons">delete</i></span>
        <span class="vorschlag-question-top" title="Ganz oben einordnen (innerhalb Typs)"><i class="material-icons">vertical_align_top</i></span>
        <span class="vorschlag-question-up" title="Nach oben verschieben"><i class="material-icons">arrow_upward</i></span>
        <span class="vorschlag-question-down" title="Nach unten verschieben"><i class="material-icons">arrow_downward</i></span>
        <span class="vorschlag-question-bot" title="Ganz unten einordnen (innerhalb Typs)"><i class="material-icons">vertical_align_bottom</i></span>
        <span class="vorschlag-question-switch" title="Tauschen mit Aufgabe aus der Datenbank"><i class="material-icons">swap_horiz</i></span>
        
        <?php if ($_smarty_tpl->tpl_vars['question']->value->type != 0) {?>
        <span class="vorschlag-question-edit" title="Punkte der Aufgabe nur für diese Klausur anpassen"><i class="material-icons">settings</i></span>
        <span class="point-minus hidden" title="Punktzahl verringern"><i class="material-icons">remove</i></span>
        <span class="point-plus hidden" title="Punktzahl erhöhen"><i class="material-icons">add</i></span>
        <span class="point-done hidden" title="Punktanpassung abschließen"><i class="material-icons">done</i></span>
        <?php }?>
    </div>
    <div class="short-info-div">
        <span class="vorschlag-question-points" title="Punkte"><?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
</span>
        <span class="vorschlag-question-difficulty" title="Schwierigkeitsgrad"><?php echo $_smarty_tpl->tpl_vars['question']->value->difficulty;?>
</span>
        <span class="vorschlag-question-frequency" title="Häufigkeit"><?php echo $_smarty_tpl->tpl_vars['question']->value->frequency;?>
</span>
        <span class="vorschlag-question-last-usage" title="Letzte Verwendung"><?php echo $_smarty_tpl->tpl_vars['question']->value->last_usage;?>
</span>
    </div>
    <div class='exam-question-text'><b>F: </b><?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['question']->value->type == 0) {?>
        <div class='exam-answer-text'>
            <?php $_smarty_tpl->_assignInScope('answers', json_decode($_smarty_tpl->tpl_vars['question']->value->answer,1));
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
 
                </span><br/>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    <?php } else { ?>
        <div class='exam-answer-text'><b>A: </b><?php echo $_smarty_tpl->tpl_vars['question']->value->answer;?>
</div>
    <?php }?>
</div><?php }
}
