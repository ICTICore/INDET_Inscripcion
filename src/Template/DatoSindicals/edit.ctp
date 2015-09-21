<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $datoSindical->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $datoSindical->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dato Sindicals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="datoSindicals form large-10 medium-9 columns">
    <?= $this->Form->create($datoSindical) ?>
    <fieldset>
        <legend><?= __('Edit Dato Sindical') ?></legend>
        <?php
            echo $this->Form->input('siglas');
            echo $this->Form->input('sindicato');
            echo $this->Form->input('rfc');
            echo $this->Form->input('sector');
            echo $this->Form->input('representante');
            echo $this->Form->input('email');
            echo $this->Form->input('sucursal');
            echo $this->Form->input('codigo_postal');
            echo $this->Form->input('estado');
            echo $this->Form->input('municipio');
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
