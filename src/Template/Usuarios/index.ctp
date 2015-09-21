<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dato Personals'), ['controller' => 'DatoPersonals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dato Personal'), ['controller' => 'DatoPersonals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dato Sindicals'), ['controller' => 'DatoSindicals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dato Sindical'), ['controller' => 'DatoSindicals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dato Laborals'), ['controller' => 'DatoLaborals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dato Laboral'), ['controller' => 'DatoLaborals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="usuarios index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('curp') ?></th>
            <th><?= $this->Paginator->sort('dato_personal_id') ?></th>
            <th><?= $this->Paginator->sort('dato_sindical_id') ?></th>
            <th><?= $this->Paginator->sort('dato_laboral_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $this->Number->format($usuario->id) ?></td>
            <td><?= h($usuario->curp) ?></td>
            <td>
                <?= $usuario->has('dato_personal') ? $this->Html->link($usuario->dato_personal->id, ['controller' => 'DatoPersonals', 'action' => 'view', $usuario->dato_personal->id]) : '' ?>
            </td>
            <td>
                <?= $usuario->has('dato_sindical') ? $this->Html->link($usuario->dato_sindical->id, ['controller' => 'DatoSindicals', 'action' => 'view', $usuario->dato_sindical->id]) : '' ?>
            </td>
            <td>
                <?= $usuario->has('dato_laboral') ? $this->Html->link($usuario->dato_laboral->id, ['controller' => 'DatoLaborals', 'action' => 'view', $usuario->dato_laboral->id]) : '' ?>
            </td>
            <td>
                <?= $usuario->has('user') ? $this->Html->link($usuario->user->full_name, ['controller' => 'Users', 'action' => 'view', $usuario->user->id]) : '' ?>
            </td>
            <td><?= h($usuario->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $usuario->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?>
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
