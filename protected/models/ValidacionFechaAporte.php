<?php

class validacionFechaAporte extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $descaporte = new DESCRIPCIONAPORTE;
        $q_dias = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'Q_DIAS');
        $n_descaporte = (int) $descaporte->count();
        $objetoFecha = new Fecha;
        $fecha = $objetoFecha->arrayFecha($object->$attribute);
        $dia = $fecha['d'];
        $dia_maximo = (int) $q_dias[(string) $n_descaporte];
        if ($dia_maximo < $dia && $object->V_MULTA == NULL)
            $this->addError($object,$attribute,"Debe ingrsarse un valor para la multa: Dia maximo de pago: $dia_maximo. Dia encontrado: $dia");
    }
    
}

?>