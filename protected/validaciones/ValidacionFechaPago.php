<?php

class ValidacionFechaPago extends CValidator{

    protected function validateAttribute($object, $attribute) {
        $objetoFecha = new Fecha();
        $objetoFecha->setZonaHoraria("America/Bogota");
        $fecha_desembolso = CREDITO::model()->obtenerFechaDesembolsoCredito(
                $object->K_ID_CREDITO);
        $especificacion = PLANPAGOS::model()->obtenerEspecificacionPlanPagos(
                $object->K_ID_CREDITO,$object->Q_NUMCUOTA);
        if(!(($objetoFecha->compararFechas($object->$attribute, $fecha_desembolso)==1 ||
              $objetoFecha->compararFechas($object->$attribute, $fecha_desembolso)==0)
             && 
             ($objetoFecha->compararFechas($especificacion['F_PAGO'], $object->$attribute)==1 ||
              $objetoFecha->compararFechas($especificacion['F_PAGO'], $object->$attribute)==2)))
                $this->addError ($object, $attribute, "Fecha no valida. Fecha mayor a la fecha de pago o menor a la fecha de desembolso");
    }

}
