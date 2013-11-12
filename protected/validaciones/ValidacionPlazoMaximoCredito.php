<?php

class ValidacionPlazoMaximoCredito extends CValidator{
   
    protected function validateAttribute($object, $attribute) {
        $id_tipo_credito = Yii::app()->db->createCommand(
                "SELECT k_identificador FROM descripcion_tipo_credito"
                ." WHERE k_id_descripcion=".$object->K_ID_DESCRIPCION)->queryColumn();
        if($id_tipo_credito != NULL){
            $maximo_plazo = DESCRIPCIONTIPOCREDITO::model()->obtenerPlazoMaximoDescripcionActual($id_tipo_credito);
            if($object->$attribute > $maximo_plazo)
                $this->addError($object, $attribute, "De momento es imposible "
                        . "registrar un crédito con el número de cuotas propuesto."
                        . " De momento es aceptado un máximo de ".$maximo_plazo);
        }else
            $this->addError ($object, $attribute, "No existe descripcion de tipo de cedito o no existen tipos de credito");
    }

}
