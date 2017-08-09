<div>
    {if isset($quests_bypassed) && count($quests_bypassed) > 0}
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die übersprungen wurde(n) (da Klausur sonst zu schwer/zu leicht):
            </div>
            {*{foreach from=$quests_unused item=question}*}
            {foreach from=$quests_bypassed item=question}
                <div class="switch-question"> 
                    <span class="hidden">{$question->id} </span>
                    <span class="switch-btn">+</span> {$question->text} 
                </div>
            {/foreach}
        </div>
    {/if}
    {if isset($quests_unused) && count($quests_unused) > 0}
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die nicht genutzt wurde(n):
            </div>
            {foreach from=$quests_unused item=question}
                <div class="switch-question"> 
                    <span class="hidden">{$question->id} </span>
                    <span class="switch-btn">+</span> {$question->text} 
                </div>
            {/foreach}
        </div>
    {/if}
</div>  