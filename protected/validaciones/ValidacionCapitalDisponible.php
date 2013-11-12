<?php

class ValidacionCapitalDisponible extends CValidator{
    
    protected function validateAttribute($object, $attribute) {
        $capital_disponible = APORTE::model()->obtenerAportesTotales() +
            PAGO::model()->obtenerValorTodosPagos() -
            CREDITO::model()->obtenerValorTodosCreditos();
        if($capital_disponible < (double)$object->$attribute)
            $this->addError ($object, $attribute, 'Capital insuficiente'.$capital_disponible);
    }

}
