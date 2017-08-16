<div class="exam-question"> 
    <span class="hidden">{$question->id}</span>
    <div class="nav-arrow-div">
        <span class="vorschlag-question-delete" title="Aufgabe aus Klausur entfernen">X</span>
        <span class="vorschlag-question-top">TOP</span>
        <span class="vorschlag-question-up">UP</span>
        <span class="vorschlag-question-down">DOWN</span>
        <span class="vorschlag-question-bot">BOT</span>
        <span class="vorschlag-question-switch">Switch</span>
        
        {if $question->type neq 0}
        <span class="vorschlag-question-edit" title="Punkte der Aufgabe nur für diese Klausur anpassen">E</span>
        <span class="point-minus hidden" title="Punktzahl verringern">-</span>
        <span class="point-plus hidden" title="Punktzahl erhöhen">+</span>
        <span class="point-done hidden" title="Punktanpassung abschließen">H</span>
        {/if}
    </div>
    <div class="short-info-div">
        <span class="vorschlag-question-points" title="Punkte">{$question->points}</span>
        <span class="vorschlag-question-difficulty" title="Schwierigkeitsgrad">{$question->difficulty}</span>
        <span class="vorschlag-question-frequency" title="Häufigkeit">{$question->frequency}</span>
        <span class="vorschlag-question-last-usage" title="Letzte Verwendung">{$question->last_usage}</span>
    </div>
    <div class='exam-question-text'>{$question->text}</div>
    <hr>
</div>