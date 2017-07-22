<h1>Klausur für: {$lecture}</h1>

<ul class="exam-input-list">
    <li>
        Klausurlänge: 
        <select class="exam-laenge">
            <option {if $punkte eq 60}selected="selected"{/if}>60</option>
            <option {if $punkte eq 90}selected="selected"{/if}>90</option>
            <option {if $punkte eq 120}selected="selected"{/if}>120</option>
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
<button class="exam-create-btn">
    Klausur erstellen
</button>
    
{if $questions != ""}
    <div class="exam-questions">
        {foreach from=$questions item=question}
            Frage: {$question} <br />
        {/foreach}
    </div>    
{/if}

{debug}