<?php


class validacionValorAporte extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $descaporte = new DESCRIPCIONAPORTE;
        $n_descaporte = (int) $descaporte->count();
        $v_maxaporte = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'V_MAXAPORTE');
        $v_minaporte = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'V_MINAPORTE');
        if ((float) $object->model()->V_APORTE <= (float) $v_maxaporte[(string) ($n_descaporte)] &&
            (float) $object->model()->V_APORTE >= (float) $v_minaporte[(string) ($n_descaporte)])
            return true;
        else
            return false;
    }

}
