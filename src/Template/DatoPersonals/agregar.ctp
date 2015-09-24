<?php use Cake\Routing\Router; ?> 
<script type="text/javascript">
    $(function() {
        $('#datopersonal-estado').change(function() {
            var parametro = $('#datopersonal-estado').val();
            var url_base = "<?php echo Router::Url(array('controller'=>'Mxestados' ,'action'=>'estadosajax'));?>";
            targeturl = url_base + "/" +parametro;
            
            $.ajax({
                type: 'get',
                url: targeturl,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                },
                success: function(response) {
                    $('#datopersonal-municipio').html(response);
                },
                error: function(e) {
                    alert("Un error ocurrio: " + e.responseText.message);
                    console.log(e);
                }
            });
        });
    });
       
</script>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Dato Personals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="datoPersonals form large-10 medium-9 columns">
    <?= $this->Form->create($datoPersonal) ?>
    <fieldset>
        <legend><?= __('Add Dato Personal') ?></legend>
        <?php
        echo $this->Form->input('DatoPersonal.user_id', ['options' => $users, 'value' => $user_dato['id']]);
        echo $this->Form->input('User.id', ['value' => $user_dato['id']]);
        echo $this->Form->input('User.first_name', ['value' => $user_dato['first_name']]);
        echo $this->Form->input('User.last_name', ['value' => $user_dato['last_name']]);
        echo $this->Form->input('User.middle_name', ['value' => $user_dato['middle_name']]);
        echo $this->Form->input('User.email', ['value' => $user_dato['email']]);


        echo $this->Form->input('DatoPersonal.rfc');
        echo $this->Form->input('DatoPersonal.curp');
        echo $this->Form->input('DatoPersonal.nombre', ['value' => $user_dato['first_name']]);
        echo $this->Form->input('DatoPersonal.a_paterno', ['value' => $user_dato['last_name']]);
        echo $this->Form->input('DatoPersonal.a_materno', ['value' => $user_dato['middle_name']]);

        echo $this->Form->input('DatoPersonal.genero');
        echo $this->Form->input('DatoPersonal.telefono_1');
        echo $this->Form->input('DatoPersonal.telefono_2');
        echo $this->Form->input('DatoPersonal.fecha_nacimiento', ['empty' => true, 'default' => '','minYear'=>1900,'maxYear'=>date("Y")]);
        echo $this->Form->input('DatoPersonal.email', ['value' => $user_dato['email']]);
        echo $this->Form->input('DatoPersonal.codigo_postal');
        echo $this->Form->input('DatoPersonal.estado',['type'=>'select','options'=>$mxestados]);
        echo $this->Form->input('DatoPersonal.municipio',['type'=>'select']);
        echo $this->Form->input('DatoPersonal.calle');
        echo $this->Form->input('DatoPersonal.num_ext');
        echo $this->Form->input('DatoPersonal.num_int');
        echo $this->Form->input('DatoPersonal.localidad');
        echo $this->Form->input('DatoPersonal.ayudas');
        echo $this->Form->input('DatoPersonal.tipo_sanguineo');
        echo $this->Form->input('DatoPersonal.alergias');
        echo $this->Form->input('DatoPersonal.institucion_seguridad');
        echo $this->Form->input('DatoPersonal.numero_afiliacion');
        echo $this->Form->input('DatoPersonal.fotografia');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function () {
        
        $('#datopersonal-nombre').change(function(){
            $('#user-first-name').val($('#datopersonal-nombre').val());
        });
        $('#datopersonal-a-paterno').change(function(){
            $('#user-last-name').val($('#datopersonal-a-paterno').val());
        });
        $('#datopersonal-a-materno').change(function(){
            $('#user-middle-name').val($('#datopersonal-a-materno').val());
        });
         $('#datopersonal-email').change(function(){
            $('#user-email').val($('#datopersonal-email').val());
        });

    });
</script>
