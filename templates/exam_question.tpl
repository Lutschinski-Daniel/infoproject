<div class="exam-question"> 
    <span class="hidden">{$question->id}</span>
    <div class="nav-arrow-div">
        <span class="vorschlag-question-delete" title="Aufgabe aus Klausur entfernen"><i class="material-icons">delete</i></span>
        <span class="vorschlag-question-top" title="Ganz oben einordnen (innerhalb Typs)"><i class="material-icons">vertical_align_top</i></span>
        <span class="vorschlag-question-up" title="Nach oben verschieben"><i class="material-icons">arrow_upward</i></span>
        <span class="vorschlag-question-down" title="Nach unten verschieben"><i class="material-icons">arrow_downward</i></span>
        <span class="vorschlag-question-bot" title="Ganz unten einordnen (innerhalb Typs)"><i class="material-icons">vertical_align_bottom</i></span>
        <span class="vorschlag-question-switch" title="Tauschen mit Aufgabe aus der Datenbank"><i class="material-icons">swap_horiz</i></span>
        
        {if $question->type neq 0}
        <span class="vorschlag-question-edit" title="Punkte der Aufgabe nur für diese Klausur anpassen"><i class="material-icons">settings</i></span>
        <span class="point-minus hidden" title="Punktzahl verringern"><i class="material-icons">remove</i></span>
        <span class="point-plus hidden" title="Punktzahl erhöhen"><i class="material-icons">add</i></span>
        <span class="point-done hidden" title="Punktanpassung abschließen"><i class="material-icons">done</i></span>
        {/if}
    </div>
    <div class="short-info-div">
        <span class="vorschlag-question-points" title="Punkte">{$question->points}</span>
        <span class="vorschlag-question-difficulty" title="Schwierigkeitsgrad">{$question->difficulty}</span>
        <span class="vorschlag-question-frequency" title="Häufigkeit">{$question->frequency}</span>
        <span class="vorschlag-question-last-usage" title="Letzte Verwendung">{$question->last_usage}</span>
    </div>
    <div class='exam-question-text'><b>F: </b>{$question->text}</div>
    {if $question->type eq 0}
        <div class='exam-answer-text'>
            {assign var=answers value=$question->answer|json_decode:1}
            {foreach from=$answers item=$mc}
                <span>
                    <label class="true-false-label">
                        {if $mc.wahrheitswert == false}
                            (F)
                        {else}
                            (W)
                        {/if}
                    </label>
                    {$mc.antwort} 
                </span><br/>
            {/foreach}
        </div>
    {else}
        <div class='exam-answer-text'><b>A: </b>{$question->answer}</div>
    {/if}
</div>