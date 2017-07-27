\documentclass[addpoints,a4paper,ngerman,12pt,answers]{exam}
\usepackage {babel}	
\usepackage[utf8]{inputenc}
\usepackage[a4paper,top=2.5cm,bottom=3cm,left=2.5cm,right=2cm]{geometry}

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
\runningheader{}{<<$lecture>>}{<<$date>>}
\firstpagefooter{}{}{}
\runningfooter{}{Seite \thepage\ von \numpages}{}

\title{Klausur im Fach <<$lecture>>}
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
