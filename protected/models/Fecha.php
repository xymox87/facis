<?php

class Fecha {
    
    function Fecha(){}
    
    public function setZonaHoraria($zonaHoraria){
        date_default_timezone_set($zonaHoraria);
    }
    
    public function getFechaActual(){
        return $this->arrayFecha(date("j/n/y"));
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
    
    public function arrayFechaToString($fecha){
        return $fecha['d']."/".$fecha['m']."/".$fecha['a'];
    }
    
    public function fechaFuturaOActual($analizado){
        $actual = $this->getFechaActual();
        if(gettype($analizado)!="array")
            $analizado = $this->arrayFecha($analizado);
        if($analizado['d']>=$actual['d'] && 
           $analizado['m']>=$actual['m'] &&
           $analizado['a']>=$actual['a'])
            return true;
        else 
            return false;
    }
    
    public function compararFechas($fecha1,$fecha2){
        if(gettype($fecha1)!="array")
            $fecha1 = $this->arrayFecha($fecha1);
        if(gettype($fecha2)!="array")
            $fecha1 = $this->arrayFecha($fecha1);
        if($fecha1['d']>$fecha2['d'] && 
           $fecha1['m']>$fecha2['m'] &&
           $fecha1['a']>$fecha2['a'])
            return 1;
        else  if($fecha1['d']<$fecha2['d'] && 
                $fecha1['m']<$fecha2['m'] &&
                $fecha1['a']<$fecha2['a'])
            return 2;
        else
            return 0;
    }
}
