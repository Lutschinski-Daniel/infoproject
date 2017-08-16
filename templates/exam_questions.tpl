<h2 class="vorschlag-titel">Klausurvorschlag</h2>
{if isset($exam_average)}<div class="exam-average">Durchschnittliche Schwierigkeit: {$exam_average}</div>{/if}
{if isset($exam_points)}<div class="exam-points">Tatsächliche Punkte: <span>{$exam_points}</span></div>{/if}
{if count($questions['MC']) > 0}
    <div class="type-title">Multiple-Choice</div>
    <div class="exam-questions-box">
        {foreach from=$questions['MC'] item=question}
            <div class="exam-question"> 
                {include file='./exam_question.tpl'}
            </div>
        {/foreach}
    </div>   
{/if}
{if count($questions['WI']) > 0}
    <div class="type-title">Wissen</div>
    <div class="exam-questions-box">
        {foreach from=$questions['WI'] item=question}
            {include file='./exam_question.tpl'}
        {/foreach}
    </div>   
{/if}
{if count($questions['TR']) > 0}
    <div class="type-title">Transfer</div>
    <div class="exam-questions-box">
        {foreach from=$questions['TR'] item=question}
            <div class="exam-question"> 
                {include file='./exam_question.tpl'}
            </div>
        {/foreach}
    </div>   
{/if}