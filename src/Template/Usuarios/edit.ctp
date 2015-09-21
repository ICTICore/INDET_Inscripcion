<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?></li>
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
<div class="usuarios form large-10 medium-9 columns">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Edit Usuario') ?></legend>
        <?php
            echo $this->Form->input('curp');
            echo $this->Form->input('dato_personal_id', ['options' => $datoPersonals, 'empty' => true]);
            echo $this->Form->input('dato_sindical_id', ['options' => $datoSindicals, 'empty' => true]);
            echo $this->Form->input('dato_laboral_id', ['options' => $datoLaborals, 'empty' => true]);
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
