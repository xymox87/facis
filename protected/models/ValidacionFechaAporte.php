<?php

class validacionFechaAporte extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $descaporte = new DESCRIPCIONAPORTE;
        $q_dias = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'Q_DIAS');
        $n_descaporte = (int) $descaporte->count();
        $dia = (int) $this->obtenerDiaAporte($object->$attribute);
        $dia_maximo = (int) $q_dias[(string) $n_descaporte];
        if ($dia_maximo < $dia)
            $this->addError($object,$attribute,"Debe ingrsarse un valor para la multa: Dia maximo de pago: $dia_maximo. Dia encontrado: $dia");
    }
    
    public function obtenerDiaAporte($f_aporte){
        $dia = "";
        for ($i = 0; $i < strlen($f_aporte); $i++)
            if ($f_aporte{$i} != "/")
                $dia = $dia . $f_aporte{$i};
            else
                break;
        return $dia;
    }
}

?>