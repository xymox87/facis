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
        if($fecha != NULL){
            $dia = "";
            $mes = "";
            $anio = "";
            $actual = "";
            $i=0;
            $actual = $fecha{$i};
            while($actual!="/"){
                $i++;
                $dia = $dia.$actual;
                if( $i!=strlen($fecha)){
                    $actual = $fecha{$i};
                }else
                    break;
            }
            $i++;
            $actual = $fecha{$i};
            while($actual!="/"){
                $i++;
                $mes = $mes.$actual;
                if( $i!=strlen($fecha)){
                    $actual = $fecha{$i};
                }else
                    break;
            }
            $i++;
            $actual = $fecha{$i};
            while($actual!="/"){
                $i++;
                $anio = $anio.$actual;
                if( $i!=strlen($fecha)){
                    $actual = $fecha{$i};
                }else
                    break;
            }
            return array('d'=>(int)$dia,'m'=>(int)$mes,'a'=>(int)$anio);
        }else
            return NULL;
    }
    
    function arrayFechaToString($fecha){
        return $fecha['d']."/".$fecha['m']."/".$fecha['a'];
    }
}
