<?php

class SOCIOController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        try {
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new SOCIO;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        try {
            if (isset($_POST['SOCIO'])) {
                $model->attributes = $_POST['SOCIO'];
                $model->K_IDENTIFICACION = $_POST['SOCIO']['K_IDENTIFICACION'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->K_IDENTIFICACION));

                $datos = $_POST['SOCIO'];
                $fecha_inicio = $this->actionFecha($datos['F_AFILIACION']);
                $fecha_final = $this->actionFecha($datos['F_AFILIACION']);
                if ($fecha_inicio <= $fecha_final) {
                    
                }

                //if()
            }


            $this->render('create', array(
                'model' => $model,
            ));
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    public function actionFecha($fecha) {
        $valoresfecha = explode("/", $fecha);
        $diafecha = $valoresfecha[0];
        $mesfecha = $valoresfecha[1];
        $anyofecha = "20" . $valoresfecha[2];
        $listofecha = $diafecha . "-" . $mesfecha . "-" . $anyofecha;
        $fecha_final = strtotime($listofecha);
        return $fecha_final;
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        try {
            if (isset($_POST['SOCIO'])) {
                $model->attributes = $_POST['SOCIO'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->K_IDENTIFICACION));
            }

            $this->render('update', array(
                'model' => $model,
            ));
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        try {
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        try {
            $dataProvider = new CActiveDataProvider('SOCIO');
            $this->render('index', array(
                'dataProvider' => $dataProvider,
            ));
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        try {
            $model = new SOCIO();
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['SOCIO']))
                $model->attributes = $_GET['SOCIO'];

            $this->render('admin', array(
                'model' => $model,
            ));
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SOCIO the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        try {
            $model = SOCIO::model()->findByPk($id);
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
            return $model;
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    /**
     * Performs the AJAX validation.
     * @param SOCIO $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        try {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'socio-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

}
