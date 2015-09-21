<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Country Province'), ['action' => 'edit', $countryProvince->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country Province'), ['action' => 'delete', $countryProvince->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryProvince->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Country Provinces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country Province'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="countryProvinces view large-10 medium-9 columns">
    <h2><?= h($countryProvince->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($countryProvince->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($countryProvince->id) ?></p>
            <h6 class="subheader"><?= __('Country Id') ?></h6>
            <p><?= $this->Number->format($countryProvince->country_id) ?></p>
        </div>
    </div>
</div>
