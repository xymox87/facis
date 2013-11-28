<?php

class ValidacionFechaDesembolso extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $objetoFecha = new Fecha();
        if(!$objetoFecha->fechaFuturaOActual($object->$attribute))
            $this->addError ($object, $attribute, "Fecha no puede ser menor a la actual");
    }

}
