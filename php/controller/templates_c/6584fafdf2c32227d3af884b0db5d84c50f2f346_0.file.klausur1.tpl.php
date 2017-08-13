<?php
/* Smarty version 3.1.30, created on 2017-08-11 18:13:29
  from "C:\xampp\htdocs\Crexam\vorlage\klausur1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598dd7a9e3d919_05826060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6584fafdf2c32227d3af884b0db5d84c50f2f346' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\vorlage\\klausur1.tpl',
      1 => 1502468004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598dd7a9e3d919_05826060 (Smarty_Internal_Template $_smarty_tpl) {
?>
\documentclass[addpoints,a4paper,ngerman,12pt,answers]{exam}
\usepackage {babel}	
\usepackage[utf8]{inputenc}
\usepackage[a4paper,top=2.5cm,bottom=3cm,left=2.5cm,right=2cm]{geometry}
\usepackage{background}
\usepackage{xcolor}

\SetBgScale{1}
\SetBgAngle{0}
\SetBgContents{\rule{.8pt}{0.85\paperheight}}
\SetBgHshift{6cm}

\pointpoints{Punkt}{Punkte}
\bonuspointpoints{Bonuspunkt}{Bonuspunkte}
\renewcommand{\solutiontitle}{\noindent\textbf{Lösung:}\enspace}
 
\chqword{Frage}   
\chpgword{Seite} 
\chpword{Punkte}   
\chbpword{Bonus Punkte} 
\chsword{Erreicht}   
\chtword{Gesamt}

\hpword{Punkte:} 
\hsword{Erreicht:}
\hqword{Aufgabe:}
\htword{Summe:}

\pagestyle{headandfoot}
\runningheadrule
\firstpageheader{}{}{}
\runningheader{}{<?php echo $_smarty_tpl->tpl_vars['lecture']->value;?>
}{<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
}
\firstpagefooter{}{}{}
\runningfooter{}{Seite \thepage\ von \numpages}{}
{\color{red}\runningfootrule}

\title{Klausur im Fach <?php echo $_smarty_tpl->tpl_vars['lecture']->value;?>
}
\author{Professor: Dr. rer. nat., Professor Tobias Eggendorfer}

\begin{document}
\maketitle
\vspace{5cm}
\makebox [\textwidth]{Name:\enspace\hrulefill}
\vspace{1cm}
\begin{center}
\gradetable[h][questions]
\end{center}

\newpage

\begin{questions}

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['WI'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
\question[<?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
]<?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>

<?php if (($_smarty_tpl->tpl_vars['question']->value->type == 0)) {?> 
        \begin{checkboxes}
        <?php $_smarty_tpl->_assignInScope('answers', json_decode($_smarty_tpl->tpl_vars['question']->value->answer,1));
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
        <?php if (($_smarty_tpl->tpl_vars['question']->value->space == 1)) {?>\grenze=8<?php }?>
        <?php if (($_smarty_tpl->tpl_vars['question']->value->space == 2)) {?>\grenze=16<?php }?>
        <?php if (($_smarty_tpl->tpl_vars['question']->value->space == 4)) {?>\grenze=32<?php }?>
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

\end{document}<?php }
}
