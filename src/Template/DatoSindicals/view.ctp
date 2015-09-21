<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Dato Sindical'), ['action' => 'edit', $datoSindical->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dato Sindical'), ['action' => 'delete', $datoSindical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $datoSindical->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dato Sindicals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dato Sindical'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="datoSindicals view large-10 medium-9 columns">
    <h2><?= h($datoSindical->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Siglas') ?></h6>
            <p><?= h($datoSindical->siglas) ?></p>
            <h6 class="subheader"><?= __('Sindicato') ?></h6>
            <p><?= h($datoSindical->sindicato) ?></p>
            <h6 class="subheader"><?= __('Rfc') ?></h6>
            <p><?= h($datoSindical->rfc) ?></p>
            <h6 class="subheader"><?= __('Sector') ?></h6>
            <p><?= h($datoSindical->sector) ?></p>
            <h6 class="subheader"><?= __('Representante') ?></h6>
            <p><?= h($datoSindical->representante) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($datoSindical->email) ?></p>
            <h6 class="subheader"><?= __('Sucursal') ?></h6>
            <p><?= h($datoSindical->sucursal) ?></p>
            <h6 class="subheader"><?= __('Codigo Postal') ?></h6>
            <p><?= h($datoSindical->codigo_postal) ?></p>
            <h6 class="subheader"><?= __('Estado') ?></h6>
            <p><?= h($datoSindical->estado) ?></p>
            <h6 class="subheader"><?= __('Municipio') ?></h6>
            <p><?= h($datoSindical->municipio) ?></p>
            <h6 class="subheader"><?= __('Num Ext') ?></h6>
            <p><?= h($datoSindical->num_ext) ?></p>
            <h6 class="subheader"><?= __('Num Int') ?></h6>
            <p><?= h($datoSindical->num_int) ?></p>
            <h6 class="subheader"><?= __('Calle') ?></h6>
            <p><?= h($datoSindical->calle) ?></p>
            <h6 class="subheader"><?= __('Localidad') ?></h6>
            <p><?= h($datoSindical->localidad) ?></p>
            <h6 class="subheader"><?= __('Telefono 1') ?></h6>
            <p><?= h($datoSindical->telefono_1) ?></p>
            <h6 class="subheader"><?= __('Telefono 2') ?></h6>
            <p><?= h($datoSindical->telefono_2) ?></p>
            <h6 class="subheader"><?= __('Fotografia Logo') ?></h6>
            <p><?= h($datoSindical->fotografia_logo) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($datoSindical->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($datoSindical->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($datoSindical->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Usuarios') ?></h4>
    <?php if (!empty($datoSindical->usuarios)): ?>
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
        <?php foreach ($datoSindical->usuarios as $usuarios): ?>
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
