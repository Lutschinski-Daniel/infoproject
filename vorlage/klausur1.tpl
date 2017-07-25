\documentclass{ article }
\title{ Klausurtest }
\author{ Bud Spencer }
\date{ 30.06.17 }
\begin{ document }
\maketitle
\newpage
{foreach from=$questions item=$question}
\section{ Frage }
    {$question}
{/foreach}
\end{ document }

