{foreach from=$questions item=$question}
    <section class="question-box" id="{$question.id}">
        <div>Fragetext: {$question.text}</div>
        {if $question.type == 0} <!--Mult-Choice-->
            {assign var=answers value=$question.answer|json_decode:1}
            {foreach from=$answers item=$mc}
                <div>
                    <label class="true-false-label">
                    {if $mc.wahrheitswert == false}
                        (F)
                    {else}
                        (W)
                    {/if}
                    </label>
                    {$mc.antwort} 
                </div>
            {/foreach}
        {else}<!--Frage-Antwort-->
        <div>Musterantwort: {$question.answer}</div>
        {/if}
        <ul class="question-additional-info">
            <li>Schwierigkeit: {$question.difficulty}</li>
            <li>Häufigkeit: {$question.frequency}</li>
            <li>Punkte: {$question.points}</li>
            <li>Platzbedarf: {$question.space}</li>
        </ul>
    </section>
{/foreach}


