<?php
/* Smarty version 3.1.30, created on 2017-07-26 18:50:48
  from "C:\xampp\htdocs\Crexam\vorlage\klausur1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5978c86888a025_54019462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6584fafdf2c32227d3af884b0db5d84c50f2f346' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\vorlage\\klausur1.tpl',
      1 => 1501087846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5978c86888a025_54019462 (Smarty_Internal_Template $_smarty_tpl) {
?>
\documentclass[addpoints]{exam}
\usepackage[ngerman]{babel}	

%
% Format exam-class-keywords to german
\pointpoints{Punkt}{Punkte}
\bonuspointpoints{Extrapunkt}{Extrapunkte}
\chqword{Augfabe}
\chpgword{Seite}
\chpword{Punkte}
\chbpword{Extrapunkte}
\chsword{Erreicht}
\chtword{Total}

\usepackage[utf8]{inputenc}
\title{Klausur im Fach ...}
\author{Professor: Dr. rer. nat., Professor Tobias Eggendorfer}
\date{30.06.17}
\setlength{\textheight}{235mm}
\setlength{\headheight}{13mm}
\setlength{\topskip}{10mm}
\begin{document}
\maketitle
\makebox [\textwidth]{Name:\enspace\hrulefill}

\begin{center}
\gradetable[h][questions]
\end{center}

\newpage

\begin{questions}

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value, 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
\question[<?php echo $_smarty_tpl->tpl_vars['question']->value['points'];?>
]<?php echo $_smarty_tpl->tpl_vars['question']->value['text'];?>

    <?php if (($_smarty_tpl->tpl_vars['question']->value['type'] == 0)) {?> 
        \begin{checkboxes}
        <?php $_smarty_tpl->_assignInScope('answers', json_decode($_smarty_tpl->tpl_vars['question']->value['answer'],1));
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['answers']->value, 'mc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mc']->value) {
?>
            \choice <?php echo $_smarty_tpl->tpl_vars['mc']->value['antwort'];?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        \end{checkboxes}
        %\fillwithlines{1in}

    <?php } else { ?>
        \newcount\grenze
        <?php if (($_smarty_tpl->tpl_vars['question']->value['space'] == 1)) {?>\grenze=8<?php }?>
        <?php if (($_smarty_tpl->tpl_vars['question']->value['space'] == 2)) {?>\grenze=16<?php }?>
        <?php if (($_smarty_tpl->tpl_vars['question']->value['space'] == 4)) {?>\grenze=32<?php }?>
        \newcount\Scount
        \Scount=0
        \loop\vspace*{1cm}\par\goodbreak\advance\Scount by 1 \ifnum\Scount<\grenze\repeat
    <?php }?>
    \vspace{1cm}
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


\end{questions}

\end{document}
<?php }
}
