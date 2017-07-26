\documentclass[addpoints]{exam}
\usepackage[ngerman]{babel}	

%
% Format exam-class-keywords to german
\pointpoints{Punkt}{Punkte}
\bonuspointpoints{Extrapunkt}{Extrapunkte}
\qformat{\textbf{Aufgabe \thequestion}\quad (\totalpoints)\hfill}
\chtword{Gesamtpunkte}
\cvqword{Aufgabe}

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

<<foreach from=$questions item=$question>>
\question[<<$question.points>>]<<$question.text>>
    <<if ($question.type == 0)>> 
        \begin{checkboxes}
        <<assign var=answers value=$question.answer|json_decode:1>>
        <<foreach from=$answers item=$mc>>
            \choice <<$mc.antwort>>
        <</foreach>>
        \end{checkboxes}
        %\fillwithlines{1in}

    <<else>>
        \newcount\grenze
        <<if ($question.space == 1)>>\grenze=8<</if>>
        <<if ($question.space == 2)>>\grenze=16<</if>>
        <<if ($question.space == 4)>>\grenze=32<</if>>
        \newcount\Scount
        \Scount=0
        \loop\vspace*{1cm}\par\goodbreak\advance\Scount by 1 \ifnum\Scount<\grenze\repeat
    <</if>>
    \vspace{1cm}
<</foreach>>

\end{questions}

\end{document}
