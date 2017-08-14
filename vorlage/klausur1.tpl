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
\footer{\textbf{<<$lecture>>}}{}{\textbf{Blatt \thepage\ / \numpages}}

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
11. Die Prüfung wurde für eine Bearbeitungszeit von <<$laenge>> Minuten konzipiert.
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

<<foreach from=$questions['WI'] item=$question>>
\question[<<$question->points>>]<<$question->text>>
<<if ($question->type == 0)>> 
        \begin{checkboxes}
        <<assign var=answers value=$question->answer|json_decode:1>>
        <<foreach from=$answers item=$mc>>
            \choice <<$mc.antwort>>
        <</foreach>>
        \end{checkboxes}
        %\fillwithlines{1in}

    <<else>>
        \newcount\grenze
        <<if ($question->space == 1)>>\grenze=8<</if>>
        <<if ($question->space == 2)>>\grenze=16<</if>>
        <<if ($question->space == 4)>>\grenze=32<</if>>
        \newcount\Scount
        \Scount=0
        \loop\vspace*{1cm}\par\goodbreak\advance\Scount by 1 \ifnum\Scount<\grenze\repeat
    <</if>>
    \vspace{1cm}
<</foreach>>

\end{questions}

\end{document}