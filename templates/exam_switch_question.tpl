<span class="hidden">{$question->id} </span>
<span class="switch-btn" title="Diese Frage wählen"><i class="material-icons">swap_horiz</i></span> 
<span class="quesiton-type"><b>
    {if $question->type == 0}
        MC
    {elseif $question->type == 1}    
        WI
    {else}
        TR
    {/if}</b>
</span>
<span class="switch-question-info">
    <span title="Punkte">{$question->points}</span>
    <span title="Schwierigkeit">{$question->difficulty}</span>
    <span title="Häufigkeit">{$question->frequency}</span>
    <span title="Häufigkeit">{$question->last_usage}</span>
</span>
    <div class="switch-question-text"><b>F:</b> {$question->text}</div>
<hr>
