<div class="switch-box">
    {counter assign=i start=0 print=false}
    {if isset($quests['BY']) && count($quests['BY']) > 0}
        <div  class="switch-questions-box">
            <div class="title">Frage(n), die übersprungen wurde(n) (da Klausur sonst zu schwer/zu leicht):
            </div>
            {*{foreach from=$quests_unused item=question}*}
            {foreach from=$quests['BY'] item=question}
                <div class="switch-question"> 
                    <span class="hidden">{$question->id} </span>
                    <span class="switch-btn">+</span> 
                    {if $question->type == 0}
                        MC
                    {elseif $question->type == 1}    
                        WI
                    {else}
                        TR
                    {/if}
                    {$question->text} 
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
                    <span class="hidden">{$question->id} </span>
                    <span class="switch-btn">+</span>
                    {if $question->type == 0}
                        MC
                    {elseif $question->type == 1}    
                        WI
                    {else}
                        TR
                    {/if}
                    {$question->text} 
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
                    <span class="hidden">{$question->id} </span>
                    <span class="switch-btn">+</span> 
                    <span class="quesiton-type">
                    {if $question->type == 0}
                        MC
                    {elseif $question->type == 1}    
                        WI
                    {else}
                        TR
                    {/if}
                    </span>
                    {$question->text} 
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
    <span class="cancel-switch-btn">cancel</span>
</div>  