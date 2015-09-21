<div class="actions columns large-2 medium-3">
    
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Instrucciones') ?></legend>
        ¡Esto te interesa!
Ahora que has registrado tu nombre de usuario y contraseña podrás ingresar tus datos
personales, laborales y sindicales.
Una vez que termines podrás registrar participantes (incluyéndote a ti mismo) en
cualquiera de los programas que ofrece el INDET.
En todo momento se mostrará en el panel de la izquierda, información relevante sobre
la información requerida para efectuar el registro de los participantes.
Además de esta ayuda, los siguientes iconos proporcionan información adicional al
dar clic en ellos:
Ayuda contextual (información sobre el elemento al que acompaña)
Se requiere tu atención
Información guardada exitosamente
La información solicitada Ayuda es obligatoria
    </fieldset>
    <?= $this->Form->button(__('Iniciar Registro')) ?>
    <?= $this->Form->end() ?>
</div>
