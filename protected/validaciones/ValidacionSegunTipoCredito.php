<?php

class ValidacionSegunTipoCredito extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $id_tipo_credito = Yii::app()->db->createCommand(
                "SELECT k_identificador FROM descripcion_tipo_credito"
                ." WHERE k_id_descripcion=".$object->K_ID_DESCRIPCION)->queryColumn();
        if($id_tipo_credito != NULL){
            $aportesTotales = APORTE::model()->obtenerAportesTotalesSocio($object->$attribute);
            $aportesRequeridos = DESCRIPCIONTIPOCREDITO::model()->obtenerValorAportesRequerido($id_tipo_credito);
            if($aportesRequeridos > $aportesTotales)
                $this->addError ($object, $attribute, 'Aportes minimos no cumplidos.'
                        . ' El aporte minimo debe ser de '.$aportesRequeridos.
                        ' y el socio tiene '.$aportesTotales);
        }else
            $this->addError ($object, $attribute, "No hay descripcion de tipo credito existente o no hay tipos de credito.");
    }

}
