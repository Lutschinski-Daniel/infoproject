<div class="exam-question"> 
    <span class="hidden">{$question->id}</span>
    <div class="nav-arrow-div">
        <span class="vorschlag-question-top">TOP</span>
        <span class="vorschlag-question-up">UP</span>
        <span class="vorschlag-question-down">DOWN</span>
        <span class="vorschlag-question-bot">BOT</span>
        <span class="vorschlag-question-switch">Switch</span>
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