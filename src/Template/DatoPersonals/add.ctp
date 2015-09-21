<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Dato Personals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="datoPersonals form large-10 medium-9 columns">
    <?= $this->Form->create($datoPersonal) ?>
    <fieldset>
        <legend><?= __('Add Dato Personal') ?></legend>
        <?php
            echo $this->Form->input('rfc');
            echo $this->Form->input('nombre');
            echo $this->Form->input('a_paterno');
            echo $this->Form->input('a_materno');
            echo $this->Form->input('genero');
            echo $this->Form->input('telefono_1');
            echo $this->Form->input('telefono_2');
            echo $this->Form->input('fecha_nacimiento', ['empty' => true, 'default' => '']);
            echo $this->Form->input('email');
            echo $this->Form->input('codigo_postal');
            echo $this->Form->input('estado');
            echo $this->Form->input('municipio');
            echo $this->Form->input('calle');
            echo $this->Form->input('num_ext');
            echo $this->Form->input('num_int');
            echo $this->Form->input('localidad');
            echo $this->Form->input('ayudas');
            echo $this->Form->input('tipo_sanguineo');
            echo $this->Form->input('alergias');
            echo $this->Form->input('institucion_seguridad');
            echo $this->Form->input('numero_afiliacion');
            echo $this->Form->input('fotografia');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>