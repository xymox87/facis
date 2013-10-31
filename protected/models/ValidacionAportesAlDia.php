<?php

class ValidacionAportesAlDia extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        date_default_timezone_set("America/Bogota");
        $fecha = arrayFecha(APORTE::model()->obtenerFechaUltimoAporte($object->$attribute));
        $fecha_actual = arrayFecha(date('j/n/y'));
        $pasado_en_dias_mes = (int)$fecha_actual['m']>(int)$fecha['m'] && 
           (int)$fecha_actual['a']==(int)$fecha['a'] &&
           (int)$fecha['d']>DESCRIPCIONAPORTE::model()->obtenerDiasAporte(
           APORTE::model()->obtenerIdDescApUltimoAporte($object->$attribute));
        $pasado_en_dias_anio = (int)$fecha_actual['m']==1 &&
           (int)$fecha['m']==12 &&
           (int)$fecha_actual['a'] - 1==(int)$fecha['a'] &&
           (int)$fecha['d']>DESCRIPCIONAPORTE::model()->obtenerDiasAporte(
           APORTE::model()->obtenerIdDescApUltimoAporte($object->$attribute));
        $pasado_en_dias = (int)$fecha_actual['m']==(int)$fecha['m'] && 
           (int)$fecha_actual['a']==(int)$fecha['a'] &&
           (int)$fecha['d']>DESCRIPCIONAPORTE::model()->obtenerDiasAporte(
           APORTE::model()->obtenerIdDescApUltimoAporte($object->$attribute));
    if($pasado_en_dias || $pasado_en_dias_mes || $pasado_en_dias_anio)
            $this->addError($object, $attribute, 'No se encuentra al dia con sus aportes');
    }
    
    public function arrayFecha($fecha){
        $dia = "";
        $mes = "";
        $anio = "";
        $actual = "";
        $i=0;
        for(;$i<count($fecha);$i++){
            $actual = $fecha{$i};
            if($actual!="/")
                $dia = $dia + $actual;
            else
                break;
        }
        for($i++;$i<count($fecha);$i++){
            $actual = $fecha{$i};
            if($actual!="/")
                $mes = $mes + $actual;
            else
                break;
        }
        for($i++;$i<count($fecha);$i++){
            $actual = $fecha{$i};
            if($actual!="/")
                $anio = $anio + $actual;
            else
                break;
        }
        return array('d'=>$dia,'m'=>$mes,'a'=>$anio);
    }

}
