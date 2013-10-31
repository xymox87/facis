<?php

class ValidacionAportesAlDia extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $objetoFecha = new Fecha;
        $objetoFecha->setZonaHoraria("America/Bogota");
        $fecha = $objetoFecha->arrayFecha(APORTE::model()->obtenerFechaUltimoAporte($object->$attribute));
        $fecha_actual = $objetoFecha->getFechaActual();
        $pasado_en_dias_mes = $fecha_actual['m']>$fecha['m'] && 
           $fecha_actual['a']==$fecha['a'] &&
           $fecha['d']>DESCRIPCIONAPORTE::model()->obtenerDiasAporte(
           APORTE::model()->obtenerIdDescApUltimoAporte($object->$attribute));
        $pasado_en_dias_anio = $fecha_actual['m']==1 &&
           $fecha['m']==12 &&
           $fecha_actual['a'] - 1==$fecha['a'] &&
           $fecha['d']>DESCRIPCIONAPORTE::model()->obtenerDiasAporte(
           APORTE::model()->obtenerIdDescApUltimoAporte($object->$attribute));
        $pasado_en_dias = $fecha_actual['m']==$fecha['m'] && 
           $fecha_actual['a']==$fecha['a'] &&
           $fecha['d']>DESCRIPCIONAPORTE::model()->obtenerDiasAporte(
           APORTE::model()->obtenerIdDescApUltimoAporte($object->$attribute));
    if($pasado_en_dias || $pasado_en_dias_mes || $pasado_en_dias_anio)
            $this->addError($object, $attribute, 'No se encuentra al dia con sus aportes');
    }

}
