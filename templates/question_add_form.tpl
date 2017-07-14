<h1>Neue Frage erstellen für Vorlesung: {$vorlesung}</h1>
<!--
id 0-32757)
welche VL?(0-255)

antwort (!!!)
punkte (0-100)

datum erstellung
datum zuletzt genutzt
-->
<div class="add-question-form">
    <label>Typ:</label> 
    <select class="frage-typ">
        <option value="mult-ch">Multiple-Choice</option>
        <option value="frag-ant" selected>Frage-Anwort</option>
    </select><br>
    <label>Fragetext:</label> <br />
    <textarea rows="4" cols="50"></textarea>
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
            <textarea rows="6" cols="50"></textarea><br />
            <label>Punkte: </label><input type="number" min="1" max="50"></input>
        </span>
    </div>
    <label>Schwierigkeitsgrad ( 1 = leicht, 5 = schwer ):</label> 
    <select class="difficulty">
        <option value="difficulty">1</option>
        <option value="difficulty">2</option>
        <option value="difficulty" selected>3</option>
        <option value="difficulty">4</option>
        <option value="difficulty">5</option>
    </select>
    <br>
    <label>Häufigkeit ( 1 = selten, 5 = häufig ):</label> 
    <select class="quantity">
        <option value="quantity">1</option>
        <option value="quantity">2</option>
        <option value="quantity" selected>3</option>
        <option value="quantity">4</option>
        <option value="quantity">5</option>
    </select>
    <br>
    <label>Platzbedarf ( halbe Seiten x ... ):</label> 
    <select class="space-needed">
        <option value="space-needed" selected>1</option>
        <option value="space-needed">2</option>
        <option value="space-needed">4</option>
    </select>
    <br>
    <button class="create-question-btn">Erstellen</button>
</div>
