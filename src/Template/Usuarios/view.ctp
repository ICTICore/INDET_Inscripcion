<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dato Personals'), ['controller' => 'DatoPersonals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dato Personal'), ['controller' => 'DatoPersonals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dato Sindicals'), ['controller' => 'DatoSindicals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dato Sindical'), ['controller' => 'DatoSindicals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dato Laborals'), ['controller' => 'DatoLaborals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dato Laboral'), ['controller' => 'DatoLaborals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="usuarios view large-10 medium-9 columns">
    <h2><?= h($usuario->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Curp') ?></h6>
            <p><?= h($usuario->curp) ?></p>
            <h6 class="subheader"><?= __('Dato Personal') ?></h6>
            <p><?= $usuario->has('dato_personal') ? $this->Html->link($usuario->dato_personal->id, ['controller' => 'DatoPersonals', 'action' => 'view', $usuario->dato_personal->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Dato Sindical') ?></h6>
            <p><?= $usuario->has('dato_sindical') ? $this->Html->link($usuario->dato_sindical->id, ['controller' => 'DatoSindicals', 'action' => 'view', $usuario->dato_sindical->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Dato Laboral') ?></h6>
            <p><?= $usuario->has('dato_laboral') ? $this->Html->link($usuario->dato_laboral->id, ['controller' => 'DatoLaborals', 'action' => 'view', $usuario->dato_laboral->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $usuario->has('user') ? $this->Html->link($usuario->user->full_name, ['controller' => 'Users', 'action' => 'view', $usuario->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($usuario->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($usuario->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($usuario->modified) ?></p>
        </div>
    </div>
</div>
