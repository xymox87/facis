<?php

class Conversion {
    
    public static function conversionDouble($a_convertir){
        if($a_convertir{0}=="," || $a_convertir==".")
            $a_convertir = "0".$a_convertir;
        $a_convertir = str_replace(",", ".", $a_convertir);
        return doubleval($a_convertir);
    }
    
    public static function conversionInt($a_convertir){
        return intval($a_convertir);
    }
    
    public static function ponerNuevaPrecision($numero,$precision){
        if($precision>=0){
            $parteFlotante = 0;
            $numero=(string)$numero;
            $nuevo="";
            $i=0;
            for(;$numero{$i}!="." && $i<strlen($numero);$i++)
                $nuevo = $nuevo.$numero{$i};
            for($j=0;$i<strlen($numero) && $j<=$precision;$j++)
                $nuevo = $nuevo.$numero{$i++};
            return Conversion::conversionDouble($nuevo);
        }
    }
}
