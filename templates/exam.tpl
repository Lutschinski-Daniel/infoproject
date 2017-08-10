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
{if isset($questions)}
    <div class="exam-box">
        <h2 class="vorschlag-titel">Klausurvorschlag</h2>
        {if isset($exam_average)}<div class="exam-average">Durchschnittliche Schwierigkeit: {$exam_average}</div>{/if}
        {if isset($exam_points)}<div class="exam-points">Tatsächliche Punkte: {$exam_points}</div>{/if}
        {if count($questions['MC']) > 0}
            <div class="type-title">Multiple-Choice</div>
            <div class="exam-questions-box">
                {foreach from=$questions['MC'] item=question}
                    <div class="exam-question"> 
                        <span class="hidden">{$question->id}</span>
                        <span class="vorschlag-question-top">TOP</span>
                        <span class="vorschlag-question-up">UP</span>
                        <span class="vorschlag-question-down">DOWN</span>
                        <span class="vorschlag-question-bot">BOT</span>
                        <span class="vorschlag-question-switch">Switch</span>
                        <div class='exam-question-text'>{$question->text}</div>
                        <hr>
                    </div>
                {/foreach}
            </div>   
        {/if}
        {if count($questions['WI']) > 0}
            <div class="type-title">Wissen</div>
            <div class="exam-questions-box">
                {foreach from=$questions['WI'] item=question}
                    <div class="exam-question"> 
                        <span class="hidden">{$question->id}</span>
                        <span class="vorschlag-question-top">TOP</span>
                        <span class="vorschlag-question-up">UP</span>
                        <span class="vorschlag-question-down">DOWN</span>
                        <span class="vorschlag-question-bot">BOT</span>
                        <span class="vorschlag-question-switch">Switch</span>
                        <div class='exam-question-text'>{$question->text}</div>
                        <hr>
                    </div>
                {/foreach}
            </div>   
        {/if}
        {if count($questions['TR']) > 0}
            <div class="type-title">Transfer</div>
            <div class="exam-questions-box">
                {foreach from=$questions['TR'] item=question}
                    <div class="exam-question"> 
                        <span class="hidden">{$question->id}</span>
                        <span class="vorschlag-question-top">TOP</span>
                        <span class="vorschlag-question-up">UP</span>
                        <span class="vorschlag-question-down">DOWN</span>
                        <span class="vorschlag-question-bot">BOT</span>
                        <span class="vorschlag-question-switch">Switch</span>
                        <div class='exam-question-text'>{$question->text}</div>
                        <hr>
                    </div>
                {/foreach}
            </div>   
        {/if}
    </div>
    <button class="exam-create-btn">
        Klausur erstellen
    </button>
{/if}
