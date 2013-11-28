<?php

class ValidacionPagoContraPlanPagos extends CValidator{

    protected function validateAttribute($object, $attribute) {
        $especificacion = PLANPAGOS::model()->obtenerEspecificacionPlanPagos(
                $object->K_ID_CREDITO, $object->Q_NUMCUOTA);
        if($especificación != NULL){
            $valor_esperado = Conversion::conversionDouble($especificacion['V_PAGO']);
            if($valor_esperado != $object->$attribute)
                $this->addError ($object, $attribute, "Valor no valido. El valor"
                        . " esperado es ".$valor_esperado." según el plan de pagos");
        }else
            $this->addError($object, $attribute, "No existe combinación "
                    . "(número de credito, número de cuota)");
    }

}
