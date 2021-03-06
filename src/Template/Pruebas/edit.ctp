<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $prueba->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prueba->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pruebas'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="pruebas form large-10 medium-9 columns">
    <?= $this->Form->create($prueba) ?>
    <fieldset>
        <legend><?= __('Edit Prueba') ?></legend>
        <?php
            echo $this->Form->input('country_id');
            echo $this->Form->input('country_providence_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
