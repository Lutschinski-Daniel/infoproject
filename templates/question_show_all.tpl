<div class="questions-info-box">
    <h1>Alle Fragen der Vorlesung: {$lecture_bez}!</h1>
    <h4>Durchschnittliche Schwierigkeit: {$average}</h4>
    <h4>Fragen insgesamt: {$quest_count}</h4>
    <div title='Multiple-Choice-Fragen'>MC: {$anz_MC}</div>
    <div title='Wissenfragen'>WI: {$anz_WI}</div>
    <div title='Transferfragen'>TR: {$anz_TR}</div>
</div>
{foreach from=$questions item=$question}
    <div class="question-box" id="{$question->id}" name="{$question->id}">
        <div class="question-box-frage-text"><b>
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
        {if $question->type eq 0} <!--Mult-Choice-->
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
            <li>Letzte Verwendung: {$question->last_usage}</li>
        </ul>
        <span class="edit-question edit-toggle"><i class="material-icons">settings</i></span>
        <span class="delete-question" title="Aufgabe aus Datenbank löschen!"><i class="material-icons">delete</i></span>
    </div>
{/foreach}


