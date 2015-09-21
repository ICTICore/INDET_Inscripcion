<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Dato Laborals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="datoLaborals form large-10 medium-9 columns">
    <?= $this->Form->create($datoLaboral) ?>
    <fieldset>
        <legend><?= __('Add Dato Laboral') ?></legend>
        <?php
            echo $this->Form->input('siglas');
            echo $this->Form->input('empresa');
            echo $this->Form->input('rfc');
            echo $this->Form->input('sector');
            echo $this->Form->input('representante');
            echo $this->Form->input('email');
            echo $this->Form->input('sucursal');
            echo $this->Form->input('codigo_postal');
            echo $this->Form->input('estado_id');
            echo $this->Form->input('municipio_id');
            echo $this->Form->input('num_ext');
            echo $this->Form->input('num_int');
            echo $this->Form->input('calle');
            echo $this->Form->input('localidad');
            echo $this->Form->input('telefono_1');
            echo $this->Form->input('telefono_2');
            echo $this->Form->input('fotografia_logo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
