<?php use Cake\Routing\Router; ?> 

<script type="text/javascript">
    $(function() {
        $('#performAjaxLink').click(function() {
            var parametro = $('#introField').val();
            var url_base = "<?php echo Router::Url(array('controller'=>'CountryProvinces' ,'action'=>'helloAjax'));?>";
            targeturl = url_base + "/" +parametro;
            
            $.ajax({
                type: 'get',
                url: targeturl,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                },
                success: function(response) {
                    $('#provinces').html(response);
                },
                error: function(e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });
    });
       
</script>
<a href="#" id="performAjaxLink" onclick="updateResult()">Do Ajax </a>
<?php echo $this->Form->input('intro', array('id' => 'introField')); ?>
<?php echo $this->Form->input('your_field', array('id' => 'resultField')); ?>
<?php //$empty = count($countryProvinces) > 0 ? __('pleaseSelect') : array('0' => __('noOptionAvailable'));?>
<?php echo $this->Form->input('country_province_id', array('id' => 'provinces'/*, 'empty' => $empty*/)); ?>


<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Prueba'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="pruebas index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('country_id') ?></th>
            <th><?= $this->Paginator->sort('country_province_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pruebas as $prueba): ?>
        <tr>
            <td><?= $this->Number->format($prueba->id) ?></td>
            <td><?= $this->Number->format($prueba->country_id) ?></td>
            <td><?= $this->Number->format($prueba->country_providence_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $prueba->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prueba->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prueba->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prueba->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>



