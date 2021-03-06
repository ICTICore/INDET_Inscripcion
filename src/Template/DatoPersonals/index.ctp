<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Dato Personal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="datoPersonals index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('rfc') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('a_paterno') ?></th>
            <th><?= $this->Paginator->sort('a_materno') ?></th>
            <th><?= $this->Paginator->sort('genero') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($datoPersonals as $datoPersonal): ?>
        <tr>
            <td><?= $this->Number->format($datoPersonal->id) ?></td>
            <td>
                <?= $datoPersonal->has('user') ? $this->Html->link($datoPersonal->user->full_name, ['controller' => 'Users', 'action' => 'view', $datoPersonal->user->id]) : '' ?>
            </td>
            <td><?= h($datoPersonal->rfc) ?></td>
            <td><?= h($datoPersonal->nombre) ?></td>
            <td><?= h($datoPersonal->a_paterno) ?></td>
            <td><?= h($datoPersonal->a_materno) ?></td>
            <td><?= h($datoPersonal->genero) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $datoPersonal->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $datoPersonal->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $datoPersonal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datoPersonal->id)]) ?>
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
