<?php

class ValidacionValorMulta extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        if($object->$attribute != NULL){
            $multas = $multas = CHtml::listData(DESCRIPCIONAPORTE::model()->findAll(),
                    'K_DESCAPORTE', "V_INTERES_MULTA");
            $interes_multa = (double)$multas[(string)DESCRIPCIONAPORTE::model()->count()];
            if($object->V_APORTE*$interes_multa > $object->$attribute)
                addError($object,$attribute,"Se ha excedido en el valor de la multa (maximo valor: ".$object->V_APORTE*$interes_multa.")");
        }
    }

}
