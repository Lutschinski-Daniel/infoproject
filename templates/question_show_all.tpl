<h1>Alle Fragen der Vorlesung: {$lecture_bez}!</h1>
{foreach from=$questions item=$question}
    <section class="question-box" id="{$question.id}" name="{$question.id}">
        <div class="question-box-frage-text">Fragetext: {$question.text}
        </div>
        <div class="question-box-antwort">
        {if $question.type == 0} <!--Mult-Choice-->
            {assign var=answers value=$question.answer|json_decode:1}
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
            Musterantwort: {$question.answer}
        {/if}
        </div>
        <ul class="question-additional-info">
            <li>Punkte: {$question.points}</li>
            <li>Schwierigkeit: {$question.difficulty}</li>
            <li>Häufigkeit: {$question.frequency}</li>
            <li>Platzbedarf: {$question.space}</li>
        </ul>
        <span class="edit-question edit-toggle">E</span>
        <span class="delete-question">X</span>
    </section>
{/foreach}


