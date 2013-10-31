<?php

class ValidacionNCreditos extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        if(CREDITO::model()->numeroCreditosSocio($object->$attribute) > 1)
            $this->addError ($object, $attribute, 'Numero de creditos máximo');
    }

}
