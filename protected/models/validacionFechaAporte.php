<?php

class validacionFechaAporte extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $descaporte = new DESCRIPCIONAPORTE;
        $q_dias = CHtml::listData($descaporte->findAll(), 'K_DESCAPORTE', 'Q_DIAS');
        $n_descaporte = (int) $descaporte->count();
        $f_aporte = $object->model()->F_CONSIGNACION;
        $dia = "";
        for ($i = 0; $i < strlen($f_aporte); $i++)
            if ($f_aporte{$i} != "/")
                $dia = $dia . $f_aporte{$i};
            else
                break;
        if ((int) $q_dias[(string) $n_descaporte] <= (int) $dia)
            return true;
        else
            return false;
    }

}
