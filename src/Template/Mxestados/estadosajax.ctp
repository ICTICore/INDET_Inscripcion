<?php
if (!empty($estados_municipios)) {
        echo '<option value="">' . __('Selecciona un municipio') . '</option>';
        foreach ($estados_municipios as $v){
            echo '<option value="' . $v->id . '">' . h($v->nombre) . '</option>';
        }
    } else {
        echo '<option value="0">' . __('No hay municipios disponibles') . '</option>';
    }
?>
