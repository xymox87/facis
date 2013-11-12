<?php

class ValidacionAportesAlDia extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $objetoFecha = new Fecha;
        $objetoFecha->setZonaHoraria("America/Bogota");
        $fecha_aporte = $objetoFecha->arrayFecha(APORTE::model()->obtenerFechaUltimoAporte($object->$attribute));
        $fecha_actual = $objetoFecha->getFechaActual();
        $pagado_mes = $fecha_actual['a']==$fecha_aporte['a'] &&
                      $fecha_actual['m']==$fecha_aporte['m'];
        $dentro_mes = ($fecha_actual['a']==$fecha_aporte['a'] || 
                       $fecha_actual['a'] == $fecha_aporte['a']%99 + 1) &&
                      $fecha_actual['m'] == $fecha_aporte['m']%12 + 1 &&
                $fecha_actual['d'] <= DESCRIPCIONAPORTE::model()->obtenerDiasActual();
    if(!($pagado_mes || $dentro_mes))
            $this->addError($object, $attribute, 'No se encuentra al dia con sus aportes');
    }

}
