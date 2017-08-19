\documentclass[addpoints,a4paper,ngerman,10pt,answers]{exam}
\usepackage {babel}	
\usepackage[utf8]{inputenc} 
\usepackage[T1]{fontenc} 
\usepackage[a4paper,top=2.5cm,bottom=3cm,left=2.25cm,right=2cm]{geometry}
\usepackage{background}
\usepackage{enumitem}
\usepackage{multido}
\usepackage{eso-pic}
\usepackage{calc}
\usepackage[document]{ragged2e}
%Einbinden von Times New Roman
\usepackage{mathptmx}

% Lösung statt Solution der Exam-Klasse, dazu kein Punkte anzeigen (aber rechnen)
\renewcommand{\solutiontitle}{\noindent\textbf{Lösung:}\enspace}
\pointformat{}
\nopointsinmargin

%Lösungen drucken, wenn Musterlösung
<<if isset($prof)>>
\printanswers
<<else>>
\noprintanswers
<</if>>

\pagestyle{headandfoot}

%Header-Formatierung
\headrule
\extraheadheight{4cm}
\header{\begin{minipage}{0.4\textwidth}\textbf{Name, Vorname:}\\[\baselineskip]\textbf{Matrikelnummer:}\\[\baselineskip]\textbf{Prüfer: Prof. Dr. Tobias Eggendorfer}\vspace{.42cm}\end{minipage}}
{}{\parbox{0.225\textwidth}{\textbf{Übertrag:}\\\vspace{.1cm}\textbf{Punkte:}\\\vspace{.1cm}\textbf{Gesamt:}}}

% Footer-Formatierung
\footrule
\footer{\textbf{<<$lecture>>}}{<<$date>>}{\textbf{Blatt \thepage\ / \numpages}}

% Logo-Positionierung
\newcommand\BackGroundImage[1]{%
\BgThispage
\backgroundsetup{
pages=all,scale=1,angle=0,position={current page.north}, hshift=5cm, vshift=-2.5cm, opacity=1,
contents={%
\includegraphics[width=5cm]{#1}
}}}


% Vertikale Linie, um Korrekturrand abzugrenzen
\newlength{\rightrule}
\setlength{\rightrule}{.90\textwidth}
\AddToShipoutPicture{%
   \AtPageLowerLeft{%
     \put(\LenToUnit{\rightrule},60){\rule{.5pt}{1.2\textheight}}  
   }
}

\begin{document}
\BackGroundImage{logo}

% Hinweise
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
\item[11.] Die Prüfung wurde für eine Bearbeitungszeit von <<$laenge>> Minuten konzipiert.
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
% Hier werden die Punkte/Noten ausgelesen
\begin{minipage}{0.20\textwidth}
Punkte\hspace{.15cm} Note\\\vspace{.3cm}
<<foreach from=$noten item=$note key=$key>>
<<$note>> \hspace{.8cm} <<$key>> \\\vspace{.1cm}
<</foreach>> 
\vspace{2.5cm}
\end{minipage}

\newpage
\newcounter{counter}
\addtocounter{counter}{1}
\begin{questions}
\pointsinrightmargin

% Multiple-Choice-Bereich
<<if count($questions['MC']) > 0>>
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
\fullwidth{\textbf{Gesamtpunktzahl: <<$bereichspunkte['p_MC']>> Punkte}}

<<foreach from=$questions['MC'] item=$question>>
\question[<<$question->points>>]\parbox[t][][t]{0.68\textwidth}{<<$question->text>>}
\begin{checkboxes}
<<assign var=answers value=$question->answer|json_decode:1>>
<<foreach from=$answers item=$mc>>
<<if $mc.wahrheitswert == 1>>
\correctchoice \parbox[t][][t]{0.6\textwidth}{<<$mc.antwort>>}
<<else>>
\choice \parbox[t][][t]{0.5\textwidth}{<<$mc.antwort>>}
<</if>>
<</foreach>>
\end{checkboxes}
\vspace{1cm}
<</foreach>>
<</if>>

% Wissensaufgaben-Bereich
<<if count($questions['WI']) > 0>>
\clearpage
\fullwidth{\textbf{\large Teil \thecounter\ - Wissensfragen}}
\addtocounter{counter}{1}
\vspace{.5cm}
\fullwidth{\textbf{Gesamtpunktzahl: <<$bereichspunkte['p_WI']>> Punkte}}
<<foreach from=$questions['WI'] item=$question>>
\question[<<$question->points>>] \parbox[t][][t]{0.68\textwidth}{<<$question->text>>
\linebreak(<<$question->points>>\ Punkte)}
<<assign var="spacecount" value=0>>
<<if ($question->space == 1)>><<$spacecount=5>><</if>>
<<if ($question->space == 2)>><<$spacecount=10>><</if>>
<<if ($question->space == 4)>><<$spacecount=20>><</if>>

\ifprintanswers
\begin{minipage}{0.7\textwidth}
\begin{solution}
\parbox[t][][t]{0.8\textwidth}{<<$question->answer>>}
\end{solution}
\end{minipage}
\else
\multido{}{<<$spacecount>>}{\vspace*{1cm}}
\fi
\vspace{1cm}
<</foreach>>
<</if>>

% Transferaufgaben-Bereich
<<if count($questions['TR']) > 0>>
\clearpage
\fullwidth{\textbf{\large Teil \thecounter\ - Transferaufgaben}}
\addtocounter{counter}{1}
\vspace{.5cm}
\fullwidth{\textbf{Gesamtpunktzahl: <<$bereichspunkte['p_TR']>> Punkte}}
<<foreach from=$questions['TR'] item=$question>>
\question[<<$question->points>>] \parbox[t][][t]{0.68\textwidth}{<<$question->text>> \linebreak(<<$question->points>>\ Punkte)}
<<assign var="spacecount" value=0>>
<<if ($question->space == 1)>><<$spacecount=5>><</if>>
<<if ($question->space == 2)>><<$spacecount=10>><</if>>
<<if ($question->space == 4)>><<$spacecount=20>><</if>>

\ifprintanswers
\begin{minipage}{0.7\textwidth}
\begin{solution} 
\parbox[t][][t]{.8\textwidth}{<<$question->answer>>}
\end{solution}
\end{minipage}
\else
\multido{}{<<$spacecount>>}{\vspace*{1cm}}
\fi
\vspace{1cm}
<</foreach>>
<</if>>

% Anhang
\multido{}{2}{
\newpage
\fullwidth{\textbf{\large Anhang - Platz für Ihre Notizen}}
\vspace{.5cm}
\fullwidth{\begin{minipage}{0.75\textwidth}Die folgenden Seiten können Sie für Ihre Notizen, Nebenrechnungen etc. nutzen.
Der Inhalt dieserSeiten wird, sofern Sie es nicht explizit markieren, \underline{nicht} bewertet.\end{minipage}}}

\end{questions}
\end{document}