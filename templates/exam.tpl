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
        Punkte (min):
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
{if isset($questions)}
    <div class="exam-box">
        {include file='./exam_questions.tpl'}
    </div>
    <button class="exam-create-btn">
        Klausur erstellen
    </button>
{/if}
