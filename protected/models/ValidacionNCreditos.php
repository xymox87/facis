<?php

class ValidacionNCreditos extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        if(CREDITO::model()->numeroCreditosVigentesSocio($object->$attribute) > 1)
            $this->addError ($object, $attribute, 'Numero de creditos máximo');
    }

}
