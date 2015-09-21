<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Dato Sindical'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="datoSindicals index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('siglas') ?></th>
            <th><?= $this->Paginator->sort('sindicato') ?></th>
            <th><?= $this->Paginator->sort('rfc') ?></th>
            <th><?= $this->Paginator->sort('sector') ?></th>
            <th><?= $this->Paginator->sort('representante') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($datoSindicals as $datoSindical): ?>
        <tr>
            <td><?= $this->Number->format($datoSindical->id) ?></td>
            <td><?= h($datoSindical->siglas) ?></td>
            <td><?= h($datoSindical->sindicato) ?></td>
            <td><?= h($datoSindical->rfc) ?></td>
            <td><?= h($datoSindical->sector) ?></td>
            <td><?= h($datoSindical->representante) ?></td>
            <td><?= h($datoSindical->email) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $datoSindical->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $datoSindical->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $datoSindical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datoSindical->id)]) ?>
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
