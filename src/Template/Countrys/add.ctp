<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Countrys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Country Provinces'), ['controller' => 'CountryProvinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country Province'), ['controller' => 'CountryProvinces', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="countrys form large-10 medium-9 columns">
    <?= $this->Form->create($country) ?>
    <fieldset>
        <legend><?= __('Add Country') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
