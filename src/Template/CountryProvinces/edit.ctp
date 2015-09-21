<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $countryProvince->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $countryProvince->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Country Provinces'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="countryProvinces form large-10 medium-9 columns">
    <?= $this->Form->create($countryProvince) ?>
    <fieldset>
        <legend><?= __('Edit Country Province') ?></legend>
        <?php
            echo $this->Form->input('country_id');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
