<div class="actions columns large-2 medium-3">
    <h3><?= __('Acciones') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Invitar Usuarios'), ['action' => 'invitar']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('active', ['type' => 'hidden','value'=>1]);
            echo $this->Form->input('first_name',['label' => 'Nombre']);
            //echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name',['label' => 'A. Paterno']);
            echo $this->Form->input('email');
            //echo $this->Form->input('password');
            //echo $this->Form->input('created_by');
            //echo $this->Form->input('modified_by');
            echo $this->Form->input('roles._ids', ['options' => $roles]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
