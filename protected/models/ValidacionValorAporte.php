<?php


class ValidacionValorAporte extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $descaporte = new DESCRIPCIONAPORTE;
        $n_descaporte = (int) $descaporte->count();
        $v_maxaporte = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'V_MAXAPORTE');
        $v_minaporte = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'V_MINAPORTE');
        $v_aporte = $object->$attribute;
        if ((float) $v_aporte > (float) $v_maxaporte[(string) ($n_descaporte)] ||
            (float) $v_aporte < (float) $v_minaporte[(string) ($n_descaporte)])
            $this->addError($object,$attribute,'Valor del aporte no valido');
    }

}
