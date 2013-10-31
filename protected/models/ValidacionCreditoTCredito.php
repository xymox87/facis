<?php

class ValidacionCreditoTCredito extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $aportesTotales = APORTE::model()->obtenerAportesTotalesSocio($object->$attribute);
        $aportesRequeridos = DESCRIPCIONTIPOCREDITO::model()->obtenerValorAportesRequerido($tipo_credito);
        if($aportesRequeridos > $aportesTotales)
            $this->addError ($object, $attribute, 'Aportes minimos no cumplidos');
    }

}
