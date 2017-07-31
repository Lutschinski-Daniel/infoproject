<h1>Neue Frage erstellen für Vorlesung: {$vorlesung}</h1>

<div class="add-question-form">
    <label>Typ:</label> 
    <select class="frage-typ" name="frage-typ">
        <option value="0">Multiple-Choice</option>
        <option value="1" selected>Frage-Anwort</option>
    </select><br>
    <label class="frage-text-label">Fragetext:</label> <br />
    <textarea name="frage-text" rows="5" class="frage-antwort-textareas"></textarea>
    <br>
    <div class="frage-typ-platzhalter">
        <div class="mult-ch-platzhalter platzhalter">
            <label class="mc-antwort-label">Anworten:</label><br />
            {for $var=0 to $anworten_default-1}
                <span class="mc-antwort">
                    <input type="text" name="antwort"></input><!--
                    --><input name="antwort-gruppe" type="checkbox" value="WAHR">WAHR</input>
                </span><br />
            {/for}
            <button class="add-answer-btn">Zusätzliche Antwort</button><br />
            <label>Punkte: </label><label class="mc-punkte-label">0</label>
        </div>
        <div class="frag-ant-platzhalter">
            <label>Musterantwort:</label><br />
            <textarea name="antwort-text" rows="6" class="frage-antwort-textareas"></textarea><br />
            <label class="punkte-label">Punkte: </label>
            <input type="number" name="points" value="10" max="50" min="1"></input>
            <br>
            <label>Platzbedarf ( halbe Seiten x ... ):</label> 
            <select class="space-needed" name="space-needed">
                {for $var=1 to 4}
                    {if ($var != 3)}
                        <option value="{$var}">{$var}</option>
                    {/if}
                {/for}
            </select>
        </div>
    </div>
    <label>Schwierigkeit ( 1 = leicht, 5 = schwer ):</label> 
    <select class="difficulty" name="difficulty">
        {for $var=1 to 5}
            <option value="{$var}">{$var}</option>
        {/for}
    </select>
    <br>
    <label>Häufigkeit ( 1 = selten, 5 = häufig ):</label> 
    <select class="frequency" name="frequency">
        {for $var=1 to 5}
            <option value="{$var}">{$var}</option>
        {/for}
    </select>
    <br>
    <button class="create-question-btn">Erstellen</button>
</div>