<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Dato Personal'), ['action' => 'edit', $datoPersonal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dato Personal'), ['action' => 'delete', $datoPersonal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datoPersonal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dato Personals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dato Personal'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="datoPersonals view large-10 medium-9 columns">
    <h2><?= h($datoPersonal->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Rfc') ?></h6>
            <p><?= h($datoPersonal->rfc) ?></p>
            <h6 class="subheader"><?= __('Nombre') ?></h6>
            <p><?= h($datoPersonal->nombre) ?></p>
            <h6 class="subheader"><?= __('A Paterno') ?></h6>
            <p><?= h($datoPersonal->a_paterno) ?></p>
            <h6 class="subheader"><?= __('A Materno') ?></h6>
            <p><?= h($datoPersonal->a_materno) ?></p>
            <h6 class="subheader"><?= __('Genero') ?></h6>
            <p><?= h($datoPersonal->genero) ?></p>
            <h6 class="subheader"><?= __('Telefono 1') ?></h6>
            <p><?= h($datoPersonal->telefono_1) ?></p>
            <h6 class="subheader"><?= __('Telefono 2') ?></h6>
            <p><?= h($datoPersonal->telefono_2) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($datoPersonal->email) ?></p>
            <h6 class="subheader"><?= __('Codigo Postal') ?></h6>
            <p><?= h($datoPersonal->codigo_postal) ?></p>
            <h6 class="subheader"><?= __('Estado') ?></h6>
            <p><?= h($datoPersonal->estado) ?></p>
            <h6 class="subheader"><?= __('Municipio') ?></h6>
            <p><?= h($datoPersonal->municipio) ?></p>
            <h6 class="subheader"><?= __('Calle') ?></h6>
            <p><?= h($datoPersonal->calle) ?></p>
            <h6 class="subheader"><?= __('Num Ext') ?></h6>
            <p><?= h($datoPersonal->num_ext) ?></p>
            <h6 class="subheader"><?= __('Num Int') ?></h6>
            <p><?= h($datoPersonal->num_int) ?></p>
            <h6 class="subheader"><?= __('Localidad') ?></h6>
            <p><?= h($datoPersonal->localidad) ?></p>
            <h6 class="subheader"><?= __('Ayudas') ?></h6>
            <p><?= h($datoPersonal->ayudas) ?></p>
            <h6 class="subheader"><?= __('Tipo Sanguineo') ?></h6>
            <p><?= h($datoPersonal->tipo_sanguineo) ?></p>
            <h6 class="subheader"><?= __('Alergias') ?></h6>
            <p><?= h($datoPersonal->alergias) ?></p>
            <h6 class="subheader"><?= __('Institucion Seguridad') ?></h6>
            <p><?= h($datoPersonal->institucion_seguridad) ?></p>
            <h6 class="subheader"><?= __('Numero Afiliacion') ?></h6>
            <p><?= h($datoPersonal->numero_afiliacion) ?></p>
            <h6 class="subheader"><?= __('Fotografia') ?></h6>
            <p><?= h($datoPersonal->fotografia) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($datoPersonal->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha Nacimiento') ?></h6>
            <p><?= h($datoPersonal->fecha_nacimiento) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($datoPersonal->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($datoPersonal->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Usuarios') ?></h4>
    <?php if (!empty($datoPersonal->usuarios)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Curp') ?></th>
            <th><?= __('Dato Personal Id') ?></th>
            <th><?= __('Dato Sindical Id') ?></th>
            <th><?= __('Dato Laboral Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($datoPersonal->usuarios as $usuarios): ?>
        <tr>
            <td><?= h($usuarios->id) ?></td>
            <td><?= h($usuarios->curp) ?></td>
            <td><?= h($usuarios->dato_personal_id) ?></td>
            <td><?= h($usuarios->dato_sindical_id) ?></td>
            <td><?= h($usuarios->dato_laboral_id) ?></td>
            <td><?= h($usuarios->user_id) ?></td>
            <td><?= h($usuarios->created) ?></td>
            <td><?= h($usuarios->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuarios->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuarios->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarios->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
