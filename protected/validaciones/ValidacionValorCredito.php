<?php

class ValidacionValorCredito extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        if($object->$attribute <= 0)
            $this->addError ($object, $attribute, "Solo se pueden ingresar valores positivos para el valor del crédito");
    }

}
