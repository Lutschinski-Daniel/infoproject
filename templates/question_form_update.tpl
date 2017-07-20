<div class="question-update-form" id="{$question.id}">

    <label class="frage-text-label">Fragetext:</label> <br />
    <textarea name="frage-text" rows="5" class="frage-antwort-textareas">{$question.text}</textarea>
    <br>
    {if ($question.type === 0)}
        <label class="mc-antwort-label">Anworten:</label><br />
        {assign var=answers value=$question.answer|json_decode:1}
        {foreach from=$answers item=$mc}
            <span class="mc-antwort">
                <input type="text" name="antwort" value="{$mc.antwort}"></input>
                <input name="antwort-gruppe" type="checkbox" value="WAHR" {if ($mc.wahrheitswert == 1)}checked{/if}>WAHR</input>
            </span><br />
            {/foreach}
        <button class="add-answer-btn">Zusätzliche Antwort</button><br />
        <label>Punkte: </label><label class="mc-punkte-label">0</label>
    {else}
        <label>Musterantwort:</label><br />
        <textarea name="antwort-text" rows="6" class="frage-antwort-textareas">{$question.answer}</textarea><br />
        <label class="punkte-label">Punkte: </label>
        <input id="frage-antwort-punkte" type="number" name="points" value="{$question.points}" max="50" min="1"></input>
    {/if}
    <br>
    <label>Schwierigkeit ( 1 = leicht, 5 = schwer ):</label> 
    <select class="difficulty" name="difficulty">
        {for $var=1 to 5}
            <option value="{$var}" {if ($question.difficulty == $var)}selected{/if}>{$var}</option>
        {/for}
    </select>
    <br>
    <label>Häufigkeit ( 1 = selten, 5 = häufig ):</label> 
    <select class="frequency" name="frequency">
        {for $var=1 to 5}
            <option value="{$var}" {if ($question.frequency == $var)}selected{/if}>{$var}</option>
        {/for}
    </select>
    <br>
    <label>Platzbedarf ( halbe Seiten x ... ):</label> 
    <select class="space-needed" name="space-needed">
        {for $var=1 to 4}
            {if ($var != 3)}
                <option value="{$var}" {if ($question.space == $var)}selected{/if}>{$var}</option>
            {/if}
        {/for}
    </select>
    <br>
    <button class="question-update-btn">Update</button>
</div>


