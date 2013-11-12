<?php

class ValidacionCantidadCuotas extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        if($object->$attribute <= 0)
            $this->addError ($object, $attribute, "Solo se pueden ingresar valores positivos para la cantidad de cuotas");
    }

}
