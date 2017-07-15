<h1>Neue Frage erstellen für Vorlesung: {$vorlesung}</h1>

<div class="add-question-form">
    <label>Typ:</label> 
    <select class="frage-typ" name="frage-typ">
        <option value="0">Multiple-Choice</option>
        <option value="1" selected>Frage-Anwort</option>
    </select><br>
    <label>Fragetext:</label> <br />
    <textarea name="frage-text" rows="4" cols="50"></textarea>
    <br>
    <div class="frage-typ-platzhalter">
        <span class="mult-ch-platzhalter platzhalter">
            <label>Anworten:</label><br />
            {for $var=1 to $anworten_default}
                <input type="text"></input><input class="mc-antwort" name="antwort-gruppe" type="checkbox" value="WAHR">WAHR</input><br />
            {/for}
            <button class="add-answer-btn">Zusätzliche Antwort</button><br />
            <label>Punkte: </label><label class="mc-punkte-label">0</label>
        </span>
        <span class="frag-ant-platzhalter">
            <label>Musterantwort:</label><br />
            <textarea name="antwort-text" rows="6" cols="50"></textarea><br />
            <label>Punkte: </label><input name="points" type="number" min="1" max="50" value="10"></input>
        </span>
    </div>
    <label>Schwierigkeitsgrad ( 1 = leicht, 5 = schwer ):</label> 
    <select class="difficulty" name="difficulty">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <label>Häufigkeit ( 1 = selten, 5 = häufig ):</label> 
    <select class="frequency" name="frequency">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <label>Platzbedarf ( halbe Seiten x ... ):</label> 
    <select class="space-needed" name="space-needed">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="4">4</option>
    </select>
    <br>
    <button class="create-question-btn">Erstellen</button>
</div>