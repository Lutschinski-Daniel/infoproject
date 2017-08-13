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