<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Dato Laboral'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="datoLaborals index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('siglas') ?></th>
            <th><?= $this->Paginator->sort('empresa') ?></th>
            <th><?= $this->Paginator->sort('rfc') ?></th>
            <th><?= $this->Paginator->sort('sector') ?></th>
            <th><?= $this->Paginator->sort('representante') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($datoLaborals as $datoLaboral): ?>
        <tr>
            <td><?= $this->Number->format($datoLaboral->id) ?></td>
            <td><?= h($datoLaboral->siglas) ?></td>
            <td><?= h($datoLaboral->empresa) ?></td>
            <td><?= h($datoLaboral->rfc) ?></td>
            <td><?= h($datoLaboral->sector) ?></td>
            <td><?= h($datoLaboral->representante) ?></td>
            <td><?= h($datoLaboral->email) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $datoLaboral->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $datoLaboral->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $datoLaboral->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datoLaboral->id)]) ?>
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
