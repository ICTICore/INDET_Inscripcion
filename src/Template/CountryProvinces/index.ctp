<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Country Province'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="countryProvinces index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('country_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($countryProvinces as $countryProvince): ?>
        <tr>
            <td><?= $this->Number->format($countryProvince->id) ?></td>
            <td><?= $this->Number->format($countryProvince->country_id) ?></td>
            <td><?= h($countryProvince->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $countryProvince->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $countryProvince->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $countryProvince->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countryProvince->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
