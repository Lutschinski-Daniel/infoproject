<div class="switch-box">
    {counter assign=i start=0 print=false}
    {if isset($quests['BY']) && count($quests['BY']) > 0}
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die übersprungen wurde(n) (da Klausur sonst zu schwer/zu leicht):
            </div>
            {*{foreach from=$quests_unused item=question}*}
            {foreach from=$quests['BY'] item=question}
                <div class="switch-question"> 
                    {include file="./exam_switch_question.tpl"}
                </div>
            {/foreach}
            {counter}
        </div>
    {/if}
    {if isset($quests['UN']) && count($quests['UN']) > 0}
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die nicht genutzt wurde(n):
            </div>
            {foreach from=$quests['UN'] item=question}
                <div class="switch-question"> 
                    {include file="./exam_switch_question.tpl"}
                </div>
            {/foreach}
            {counter}
        </div>
    {/if}
    {if isset($quests['SW']) && count($quests['SW']) > 0}
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die schon getauscht wurde(n):
            </div>
            {foreach from=$quests['SW'] item=question}
                <div class="switch-question"> 
                    {include file="./exam_switch_question.tpl"}
                </div>
            {/foreach}
            {counter}
        </div>
    {/if}
    {if $i eq 0}
        <div  class="switch-questions-box">
            Keine passende Frage vorhanden!
        </div>
    {/if}
    <span class="cancel-switch-btn"><i class="material-icons">clear</i> cancel</span>
</div>  