<?php

class ValidacionFechaAporte extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $descaporte = new DESCRIPCIONAPORTE;
        $q_dias = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'Q_DIAS');
        $n_descaporte = (int) $descaporte->count();
        $dia = (int) $this->obtenerDia($object->$attribute);
        $dia_maximo = (int) $q_dias[(string) $n_descaporte];
        if ($dia_maximo <= $dia && $object->V_MULTA == NULL)
            $this->addError($object,$attribute,"Debe agregar el valor de la multa: Numero de día máximo: $dia_maximo. Numero de dia encontrado: $dia");
    }
    
    private function obtenerDia($f_aporte){
        $dia = "";
        for ($i = 0; $i < strlen($f_aporte); $i++)
            if ($f_aporte{$i} != "/")
                $dia = $dia . $f_aporte{$i};
            else
                break;
        return $dia;
    }

}
