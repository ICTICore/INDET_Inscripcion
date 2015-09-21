<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Prueba'), ['action' => 'edit', $prueba->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prueba'), ['action' => 'delete', $prueba->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prueba->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pruebas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prueba'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pruebas view large-10 medium-9 columns">
    <h2><?= h($prueba->id) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($prueba->id) ?></p>
            <h6 class="subheader"><?= __('Country Id') ?></h6>
            <p><?= $this->Number->format($prueba->country_id) ?></p>
            <h6 class="subheader"><?= __('Country Providence Id') ?></h6>
            <p><?= $this->Number->format($prueba->country_providence_id) ?></p>
        </div>
    </div>
</div>
