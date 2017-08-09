    <div class="exam-questions-box">
        {foreach from=$questions item=question}
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