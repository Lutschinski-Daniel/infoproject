<?php
/* Smarty version 3.1.30, created on 2017-08-15 00:38:12
  from "C:\xampp\htdocs\Crexam\vorlage\klausur1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599226543c4519_16382784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6584fafdf2c32227d3af884b0db5d84c50f2f346' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\vorlage\\klausur1.tpl',
      1 => 1502750282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599226543c4519_16382784 (Smarty_Internal_Template $_smarty_tpl) {
?>
\documentclass[addpoints,a4paper,ngerman,10pt,answers]{exam}
\usepackage {babel}	
\usepackage[utf8]{inputenc}
\usepackage[a4paper,top=2.5cm,bottom=3cm,left=2.5cm,right=2cm]{geometry}
\usepackage{background}
\usepackage{xcolor}
\usepackage[document]{ragged2e}

\SetBgScale{1}
\SetBgAngle{0}
\SetBgContents{\rule{.5pt}{0.85\paperheight}}
\SetBgHshift{5cm}
\backgroundsetup{color=black}

\pagestyle{headandfoot}
\headrule
\footrule
\extraheadheight{3cm}
\header{\textbf{Name, Vorname:}\\[\baselineskip]\textbf{Matrikelnummer:}\\[\baselineskip]\textbf{Prüfer: Prof. Dr. Tobias Eggendorfer}}
{}{\textbf{Übertrag:}\\\textbf{Punkte:}\\\textbf{Gesamt:}}
\footer{\textbf{<?php echo $_smarty_tpl->tpl_vars['lecture']->value;?>
}}{}{\textbf{Blatt \thepage\ / \numpages}}

\begin{document}
\begin{minipage}{0.7\textwidth} 
\begin{flushleft}
{\textbf{\large Hinweise:}}
\\[\baselineskip]
1. Schreiben Sie auf \underline{\textit{\textbf{jedes}}} Blatt Ihren Namen und Matrikelnummer.
\\[\baselineskip]
2. Diese Prüfung hat einen Umfang von \numpages\ Seiten. Bitte prüfen Sie Ihre Angabe
auf Vollständigkeit.
\\[\baselineskip]
3. Lassen Sie den Prüfungsbogen bitte zusammengeheftet.
\\[\baselineskip]
4. Schreiben Sie bitte Ihre Antworten in die vorgesehenen Felder. Bitte lassen Sie
den vorgesehenen Korrekturrand rechts frei. Sollte Ihnen der Platz nicht
reichen, schreiben Sie bitte auf der Rückseite der Bögen. Geben Sie dabei klar
an, auf welche Aufgabe sich Ihre Lösung bezieht.\\
Für umfangreichere Antworten kann es auch leere Seiten zwischen den
Aufgaben geben. Bitte arbeiten Sie die ganze Prüfung durch.
\\[\baselineskip]
5. Schreiben Sie bitte lesbar. Unlesbare Antworten werden nicht bewertet.
\\[\baselineskip]
6. Bitte schreiben Sie nicht mit roter (Korrektur) oder grüner (Zweitkorrektur)
Farbe.
\\[\baselineskip]
7. Geben Sie eindeutige Antworten. Wenn Sie mehr als eine mögliche Lösung
angeben, wird die schlechteste bewertet.
\\[\baselineskip]
8. Geben Sie bei Berechnungen etc. stets Ihren Rechenweg an.
\\[\baselineskip]
9. „Schmierpapier“ ist mit abzugeben. Sie finden am Schluß dieses
Prüfungsbogens Seiten für Ihre Notizen / Nebenrechnungen. Der Inhalt dieser
Seiten wird \underline{nicht} bewertet.
\\[\baselineskip]
10. Diese Prüfung hat einen Umfang von \numpoints\ Punkten.
\\[\baselineskip]
11. Die Prüfung wurde für eine Bearbeitungszeit von <?php echo $_smarty_tpl->tpl_vars['laenge']->value;?>
 Minuten konzipiert.
\\[\baselineskip]
12. Die Verwendung von anderen als den unten angegebenen zulässigen
Hilfsmitteln führt zum sofortigen Ausschluß von der Prüfung.
\\[2\baselineskip]
{\textbf{\large Zulässige Hilfsmittel:}}
\\[2\baselineskip]
- keine -
\\[2\baselineskip]
{\textbf{\large Erreichte Punktzahl:\ \underline{\hspace{1.2cm}}\ / \numpoints\ $\rightarrow$ Note:\ \underline{\hspace{1.2cm}}}}
\end{flushleft}
\end{minipage}
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
