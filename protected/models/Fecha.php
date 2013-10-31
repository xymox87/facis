<?php

class Fecha {
    
    function Fecha(){}
    
    public function setZonaHoraria($zonaHoraria){
        date_default_timezone_set($zonaHoraria);
    }
    
    public function getFechaActual(){
        return arrayFecha(date("j/n/y"));
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
        return array('d'=>(int)$dia,'m'=>(int)$mes,'a'=>(int)$anio);
    }
    
    function arrayFechaToString($fecha){
        return $fecha['d']."/".$fecha['m']."/".$fecha['a'];
    }
}
