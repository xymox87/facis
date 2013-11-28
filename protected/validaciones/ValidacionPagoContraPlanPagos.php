<?php

class ValidacionPagoContraPlanPagos extends CValidator{

    protected function validateAttribute($object, $attribute) {
        $especificacion = PLANPAGOS::model()->obtenerEspecificacionPlanPagos(
                $object->K_ID_PLAN);
        if($especificacion != NULL){
            $valorxcapital = Conversion::conversionInt($especificacion['V_XINTERES']);
            $valorxinteres = Conversion::conversionInt($especificacion['V_XCAPITAL']);
            $total = $valorxcapital+$valorxinteres;
            if($total != $object->$attribute)
                $this->addError ($object, $attribute, "Valor no valido. El valor"
                        . " esperado es ".$total." según el plan de pagos");
        }else
            $this->addError($object, $attribute, "No existe combinación "
                    . "(número de credito, número de cuota)");
    }

}
