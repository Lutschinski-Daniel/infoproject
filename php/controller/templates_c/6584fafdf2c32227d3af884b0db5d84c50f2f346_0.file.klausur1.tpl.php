<?php
/* Smarty version 3.1.30, created on 2017-08-16 15:57:04
  from "C:\xampp\htdocs\Crexam\vorlage\klausur1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59944f30979343_19903609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6584fafdf2c32227d3af884b0db5d84c50f2f346' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Crexam\\vorlage\\klausur1.tpl',
      1 => 1502891776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59944f30979343_19903609 (Smarty_Internal_Template $_smarty_tpl) {
?>
\documentclass[addpoints,a4paper,ngerman,10pt,answers]{exam}
\usepackage {babel}	
\usepackage[utf8]{inputenc}
\usepackage[a4paper,top=2.5cm,bottom=3cm,left=2.25cm,right=2cm]{geometry}
\usepackage{background}
\usepackage{enumitem}
\usepackage{multido}
\usepackage{eso-pic}
\usepackage{calc}
\usepackage[document]{ragged2e}
\usepackage[scaled]{uarial}
\usepackage{blindtext}

\renewcommand{\solutiontitle}{\noindent\textbf{Lösung:}\enspace}
\pointformat{}
\nopointsinmargin
<?php if (isset($_smarty_tpl->tpl_vars['prof']->value)) {?>
\printanswers
<?php } else { ?>
\noprintanswers
<?php }?>

\pagestyle{headandfoot}
\headrule
\footrule
\extraheadheight{4cm}
\header{\begin{minipage}{0.4\textwidth}\textbf{Name, Vorname:}\\[\baselineskip]\textbf{Matrikelnummer:}\\[\baselineskip]\textbf{Prüfer: Prof. Dr. Tobias Eggendorfer}\vspace{.42cm}\end{minipage}}
{}{\parbox{0.225\textwidth}{\textbf{Übertrag:}\\\vspace{.1cm}\textbf{Punkte:}\\\vspace{.1cm}\textbf{Gesamt:}}}
\footer{\textbf{<?php echo $_smarty_tpl->tpl_vars['lecture']->value;?>
}}{}{\textbf{Blatt \thepage\ / \numpages}}

\newcommand\BackGroundImage[1]{%
\BgThispage
\backgroundsetup{
pages=all,scale=1,angle=0,position={current page.north}, hshift=5cm, vshift=-2.5cm, opacity=1,
contents={%
\includegraphics[width=5cm]{#1}
}}}


\newlength{\rightrule}
\setlength{\rightrule}{.90\textwidth}
\AddToShipoutPicture{%
   \AtPageLowerLeft{%
     \put(\LenToUnit{\rightrule},60){\rule{.5pt}{1.2\textheight}}  
   }
}

\begin{document}
\BackGroundImage{logo}

\begin{minipage}{0.75\textwidth} 
\begin{flushleft}
{\textbf{\large Hinweise:}}
\vspace{.6cm}
\begin{enumerate}[leftmargin=*]
\item[1.] Schreiben Sie auf \underline{\textit{\textbf{jedes}}} Blatt Ihren Namen und Matrikelnummer.
\\[\baselineskip]
\item[2.] Diese Prüfung hat einen Umfang von \numpages\ Seiten. Bitte prüfen Sie Ihre Angabe
auf Vollständigkeit.
\\[\baselineskip]
\item[3.] Lassen Sie den Prüfungsbogen bitte zusammengeheftet.
\\[\baselineskip]
\item[4.] Schreiben Sie bitte Ihre Antworten in die vorgesehenen Felder. Bitte lassen Sie
den vorgesehenen Korrekturrand rechts frei. Sollte Ihnen der Platz nicht
reichen, schreiben Sie bitte auf der Rückseite der Bögen. Geben Sie dabei klar
an, auf welche Aufgabe sich Ihre Lösung bezieht.\\
Für umfangreichere Antworten kann es auch leere Seiten zwischen den
Aufgaben geben. Bitte arbeiten Sie die ganze Prüfung durch.
\\[\baselineskip]
\item[5.] Schreiben Sie bitte lesbar. Unlesbare Antworten werden nicht bewertet.
\\[\baselineskip]
\item[6.] Bitte schreiben Sie nicht mit roter (Korrektur) oder grüner (Zweitkorrektur)
Farbe.
\\[\baselineskip]
\item[7.] Geben Sie eindeutige Antworten. Wenn Sie mehr als eine mögliche Lösung
angeben, wird die schlechteste bewertet.
\\[\baselineskip]
\item[8.] Geben Sie bei Berechnungen etc. stets Ihren Rechenweg an.
\\[\baselineskip]
\item[9.] „Schmierpapier“ ist mit abzugeben. Sie finden am Schluß dieses
Prüfungsbogens Seiten für Ihre Notizen / Nebenrechnungen. Der Inhalt dieser
Seiten wird \underline{nicht} bewertet.
\\[\baselineskip]
\item[10.] Diese Prüfung hat einen Umfang von \numpoints\ Punkten.
\\[\baselineskip]
\item[11.] Die Prüfung wurde für eine Bearbeitungszeit von <?php echo $_smarty_tpl->tpl_vars['laenge']->value;?>
 Minuten konzipiert.
\\[\baselineskip]
\item[12.] Die Verwendung von anderen als den unten angegebenen zulässigen
Hilfsmitteln führt zum sofortigen Ausschluß von der Prüfung.
\end{enumerate}
\vspace{.75cm}
{\textbf{\large Zulässige Hilfsmittel:}}
\\[2\baselineskip]
- keine -
\\[2\baselineskip]
{\textbf{\large Erreichte Punktzahl:\ \underline{\hspace{1.2cm}}\ / \numpoints\ $\rightarrow$ Note:\ \underline{\hspace{1.2cm}}}}
\end{flushleft}
\end{minipage}
\hspace{1cm}
\begin{minipage}{0.20\textwidth}
Punkte\hspace{.15cm} Note\\\vspace{.3cm}
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['noten']->value, 'note', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['note']->value) {
echo $_smarty_tpl->tpl_vars['note']->value;?>
 \hspace{.8cm} <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 \\\vspace{.1cm}
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
\vspace{2.5cm}
\end{minipage}

\newpage
\newcounter{counter}
\addtocounter{counter}{1}
\begin{questions}
\pointsinrightmargin
<?php if (count($_smarty_tpl->tpl_vars['questions']->value['MC']) > 0) {?>
\fullwidth{\textbf{\large Teil \thecounter\ - Mutltiple Choice Fragen}}
\addtocounter{counter}{1}
\vspace{1cm}
\fullwidth{\textbf{Hinweis:}}
\fullwidth{\begin{minipage}{0.75\textwidth} Markieren Sie die korrekten Antworten eindeutig durch ein Kreuz. Sollten Sie Ihre
Markierung ändern müssen, schwärzen Sie bitte das entsprechende Feld. Soweit
nichts anderes angegeben ist, ist eine Antwort pro Frage richtig.\\\vspace{.25cm}
Eine richtige Antwort bedeutet einen Punkt. Unabhängig von der Zahl der richtigen
Antworten führt eine Falschantwort in einer Frage mit nur einer richtigen Antwort
für diese Frage zur Bewertung mit null Punkten.\\\vspace{.25cm}
Bei Fragen, bei denen mehrere Antwortmöglichkeiten bestehen, erhalten Sie für
jede richtige Antwort einen Punkt, für jedes falsch gesetzte Kreuz zwei Punkte
Abzug. In keinem Fall können Sie weniger als 0 Punkte erhalten.\vspace{.6cm}\end{minipage}}
\fullwidth{\textbf{Gesamtpunktzahl: <?php echo $_smarty_tpl->tpl_vars['bereichspunkte']->value['p_MC'];?>
 Punkte}}
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['MC'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
\question[<?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
]\begin{minipage}{0.70\textwidth}<?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
\end{minipage}
\begin{checkboxes}
<?php $_smarty_tpl->_assignInScope('answers', json_decode($_smarty_tpl->tpl_vars['question']->value->answer,1));
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['answers']->value, 'mc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mc']->value) {
if ($_smarty_tpl->tpl_vars['mc']->value['wahrheitswert'] == 1) {?>
\correctchoice <?php echo $_smarty_tpl->tpl_vars['mc']->value['antwort'];?>

<?php } else { ?>
\choice <?php echo $_smarty_tpl->tpl_vars['mc']->value['antwort'];?>

<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

\end{checkboxes}
\vspace{1cm}
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['questions']->value['WI']) > 0) {?>
\clearpage
\fullwidth{\textbf{\large Teil \thecounter\ - Wissensfragen}}
\addtocounter{counter}{1}
\vspace{.5cm}
\fullwidth{\textbf{Gesamtpunktzahl: <?php echo $_smarty_tpl->tpl_vars['bereichspunkte']->value['p_WI'];?>
 Punkte}}
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['WI'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
\question[<?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
] \parbox[t][][t]{0.65\textwidth}{<?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
\linebreak(<?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
\ Punkte)}
<?php $_smarty_tpl->_assignInScope('spacecount', 0);
if (($_smarty_tpl->tpl_vars['question']->value->space == 1)) {
$_smarty_tpl->_assignInScope('spacecount', 5);
}
if (($_smarty_tpl->tpl_vars['question']->value->space == 2)) {
$_smarty_tpl->_assignInScope('spacecount', 10);
}
if (($_smarty_tpl->tpl_vars['question']->value->space == 4)) {
$_smarty_tpl->_assignInScope('spacecount', 20);
}?>

\ifprintanswers
\begin{minipage}{0.7\textwidth}
\begin{solution}
\parbox[t][][t]{0.8\textwidth}{<?php echo $_smarty_tpl->tpl_vars['question']->value->answer;?>
}
\end{solution}
\end{minipage}
\else
\multido{}{<?php echo $_smarty_tpl->tpl_vars['spacecount']->value;?>
}{\vspace*{1cm}}
\fi
\vspace{1cm}
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['questions']->value['TR']) > 0) {?>
\clearpage
\fullwidth{\textbf{\large Teil \thecounter\ - Transferaufgaben}}
\addtocounter{counter}{1}
\vspace{.5cm}
\fullwidth{\textbf{Gesamtpunktzahl: <?php echo $_smarty_tpl->tpl_vars['bereichspunkte']->value['p_TR'];?>
 Punkte}}
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['questions']->value['TR'], 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
\question[<?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
] \parbox[t][][t]{0.65\textwidth}{<?php echo $_smarty_tpl->tpl_vars['question']->value->text;?>
\linebreak(<?php echo $_smarty_tpl->tpl_vars['question']->value->points;?>
\ Punkte)}
<?php $_smarty_tpl->_assignInScope('spacecount', 0);
if (($_smarty_tpl->tpl_vars['question']->value->space == 1)) {
$_smarty_tpl->_assignInScope('spacecount', 5);
}
if (($_smarty_tpl->tpl_vars['question']->value->space == 2)) {
$_smarty_tpl->_assignInScope('spacecount', 10);
}
if (($_smarty_tpl->tpl_vars['question']->value->space == 4)) {
$_smarty_tpl->_assignInScope('spacecount', 20);
}?>

\ifprintanswers
\begin{minipage}{0.7\textwidth}
\begin{solution} 
\parbox[t][][t]{.8\textwidth}{<?php echo $_smarty_tpl->tpl_vars['question']->value->answer;?>
}
\end{solution}
\end{minipage}
\else
\multido{}{<?php echo $_smarty_tpl->tpl_vars['spacecount']->value;?>
}{\vspace*{1cm}}
\fi
\vspace{1cm}
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }?>

\multido{}{2}{
\newpage
\fullwidth{\textbf{\large Anhang - Platz für Ihre Notizen}}
\vspace{.5cm}
\fullwidth{\begin{minipage}{0.75\textwidth}Die folgenden Seiten können Sie für Ihre Notizen, Nebenrechnungen etc. nutzen.
Der Inhalt dieserSeiten wird, sofern Sie es nicht explizit markieren, \underline{nicht} bewertet.\end{minipage}}}

\end{questions}
\end{document}<?php }
}
