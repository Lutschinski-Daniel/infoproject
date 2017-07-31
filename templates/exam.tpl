<h1>Klausur für: {$lecture}</h1>

<ul class="exam-input-list">
    <li>
        Klausurlänge: 
        <select class="exam-laenge">
            <option value="60">60</option>
            <option value="90">90</option>
            <option value="120">120</option>
        </select>
    </li>
    <li>
        Punkte (max):
        <input type="number" name="exam-punkte" min="1" max="200" value="{$punkte}" class="exam-punkte" col="3"/>
    </li>
    <li>
        Klausurdatum: 
        <input name="exam-date" class="exam-date" value="{$datum}"/><br />
    </li>
</ul>
<button class="exam-create-vorschlag">
    Klausurvorschlag
</button>
    
{if $questions != ""}
    <h2 class="vorschlag-titel">Klausurvorschlag</h2>
    <div class="exam-questions-box">
        {foreach from=$questions item=question}
            <div class="exam-question">
                <span class="vorschlag-question-top">TOP</span>
                <span class="vorschlag-question-up">UP</span>
                <span class="vorschlag-question-down">DOWN</span>
                <span class="vorschlag-question-bot">BOT</span>
                <span class="vorschlag-question-switch">Switch</span>
                Frage: {$question.text}
            </div>
        {/foreach}
    </div>    
    <h3 class="vorschlag-daten">Zusätzliche Daten (Durchschnittliche Schwierigkeit, tatsächliche Punkte ...)</h3>
    <button class="exam-create-btn">
        Klausur erstellen
    </button>
{/if}