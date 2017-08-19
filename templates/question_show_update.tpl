<div class="question-box-frage-text">
    <b>
        {if $question->type eq 0}
            MC :
        {elseif ($question->type eq 1)}
            Wissen:
        {else}
            Transfer:
        {/if}
    </b>
    {$question->text}
</div>
<div class="question-box-antwort">
    {if $question->type == 0} <!--Mult-Choice-->
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
            </span><br>
        {/foreach}
    {else}<!--Frage-Antwort-->
        Musterantwort: {$question->answer}
    {/if}
</div>
<ul class="question-additional-info">
    <li>Punkte: {$question->points}</li>
    <li>Schwierigkeit: {$question->difficulty}</li>
    <li>Häufigkeit: {$question->frequency}</li>
    {if $question->type > 0}<li>Platzbedarf: {$question->space}</li>{/if}
</ul>
<span class="edit-question edit-toggle"><i class="material-icons">settings</i></span>
<span class="delete-question"><i class="material-icons">delete</i></span>