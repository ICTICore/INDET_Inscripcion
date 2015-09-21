<?php
    if (!empty($countryProvinces)) {
        echo '<option value="">' . __('pleaseSelect') . '</option>';
        foreach ($countryProvinces as $v) {
            echo '<option value="' . $v->id . '">' . h($v->name) . '</option>';
        }
    } else {
        echo '<option value="0">' . __('noOptionAvailable') . '</option>';
    }
?>