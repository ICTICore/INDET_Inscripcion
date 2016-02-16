<?php
if (!empty($estados_municipios)) {
        echo '<option value="">' . __('Selecciona un municipio') . '</option>';
        foreach ($estados_municipios as $v){
            
            if(isset($estado_inicio)){
                if($estado_inicio==$v->id)
                    echo '<option  value="' . $v->id . '" selected="selected">' . h($v->nombre) . '</option>';
                else{
                    echo '<option  value="' . $v->id . '">' . h($v->nombre) . '</option>';
                }
            }
            else{
                echo '<option  value="' . $v->id . '">' . h($v->nombre) . '</option>';
            }
            
            
        }
    } else {
        echo '<option value="0">' . __('No hay municipios disponibles') . '</option>';
    }
?>
