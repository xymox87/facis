<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class DynamicConnection {

    public static function connect() {
        Yii::app()->db->setActive(false);
        Yii::app()->db->username = Yii::app()->session["username"];
        Yii::app()->db->password = Yii::app()->session["password"];
        Yii::app()->db->setActive(true);
    }

}