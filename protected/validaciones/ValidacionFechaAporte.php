<?php

class validacionFechaAporte extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $descaporte = new DESCRIPCIONAPORTE;
        $q_dias = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'Q_DIAS');
        $objetoFecha = new Fecha;
        $fecha = $objetoFecha->arrayFecha($object->$attribute);
        if($fecha != NULL){
            $dia = $fecha['d'];
            $dia_maximo = (int) $q_dias[(string)$descaporte->count()];
            if ($dia_maximo < $dia && $object->V_MULTA == NULL)
                $this->addError($object,$object->V_MULTA,"Debe ingresarse un valor para la multa: Dia maximo de pago: $dia_maximo. Dia encontrado: $dia");
            if($dia_maximo >= $dia && $object->V_MULTA != NULL)
                $this->addError ($object, $object->V_MULTA, 'No se ha excedido en el día de pago. No se debe ejecutar una multa al asociado.');
        }
    }
    
}

?>