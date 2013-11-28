<?php

class SecuenciaOracle {
    
    public static function aumentar($model,$prefijo="seq_",$sufijo=""){
        return (int)current(Yii::app()->db->createCommand(
                "SELECT ".$prefijo.$model->tableName().$sufijo
                .".nextval FROM dual")->queryColumn());
    }
    
}
