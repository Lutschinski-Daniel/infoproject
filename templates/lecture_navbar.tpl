<ul class = "lectures-list">
    <li class = "add-lecture-btn" title="Neue Vorlesung erstellen">
        <a href = "#">+</a>
    </li>
    {foreach from=$lectures item=$lecture}
        <li class="lecture">
            <a href="#" id="{$lecture.id}">{$lecture.bezeichnung_kurz}</a>
        </li>
    {/foreach}
</ul>