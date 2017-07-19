<div class="question-update-form" id="{$question.id}">
    <label>Fragetext:</label> <br />
    <textarea name="update-frage-text" rows="4" cols="50" class="frage-antwort-textareas">{$question.text}</textarea>
    <br>
    {if ($question.type == 1)}
        <label>Musterantwort:</label><br />
        <textarea name="update-antwort-text" rows="6" cols="50" class="frage-antwort-textareas">{$question.answer}</textarea><br />
        <label>Punkte: </label><input name="update-points" type="number" min="1" max="50" value="{$question.points}"></input>
        <br />
    {else}
        {assign var=answers value=$question.answer|json_decode:1}
            <span class="update-mc-antworten">
                <label>Anworten:</label><br />
                {foreach from=$answers item=$mc}
                    <span class="update-mc-antwort">
                        <input type="text" name="antwort" value="{$mc.antwort}">
                        <input name="antwort-gruppe" type="checkbox" value="WAHR" {if ($mc.wahrheitswert == 1)}checked{/if}>WAHR</input>
                    </span>
                    <br />
                {/foreach}
                <button class="update-add-answer-btn">Zusätzliche Antwort</button><br />
                <label>Punkte: </label><label class="update-mc-punkte-label">0</label>
            </span>      
            <br />
    {/if}
    <label>Schwierigkeit ( 1 = leicht, 5 = schwer ):</label> 
    <select class="difficulty" name="update-difficulty">
        {for $var=1 to 5}
            <option value="{$var}" {if ($question.difficulty == $var)}selected{/if}>{$var}</option>
        {/for}
    </select>
    <br>
    <label>Häufigkeit ( 1 = selten, 5 = häufig ):</label> 
    <select class="frequency" name="update-frequency">
        {for $var=1 to 5}
            <option value="{$var}" {if ($question.frequency == $var)}selected{/if}>{$var}</option>
        {/for}
    </select>
    <br>
    <label>Platzbedarf ( halbe Seiten x ... ):</label> 
    <select class="space-needed" name="update-space-needed">
        {for $var=1 to 4}
            {if ($var != 3)}
                <option value="{$var}" {if ($question.space == $var)}selected{/if}>{$var}</option>
            {/if}
        {/for}
    </select>
    <br>
    <button class="question-update-btn">Update</button>
</div>


