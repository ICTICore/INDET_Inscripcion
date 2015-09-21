<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Countrys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Country Provinces'), ['controller' => 'CountryProvinces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country Province'), ['controller' => 'CountryProvinces', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="countrys view large-10 medium-9 columns">
    <h2><?= h($country->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($country->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($country->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Country Provinces') ?></h4>
    <?php if (!empty($country->country_provinces)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Country Id') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($country->country_provinces as $countryProvinces): ?>
        <tr>
            <td><?= h($countryProvinces->id) ?></td>
            <td><?= h($countryProvinces->country_id) ?></td>
            <td><?= h($countryProvinces->name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'CountryProvinces', 'action' => 'view', $countryProvinces->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'CountryProvinces', 'action' => 'edit', $countryProvinces->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CountryProvinces', 'action' => 'delete', $countryProvinces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryProvinces->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
