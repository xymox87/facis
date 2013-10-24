<?php

class APORTEController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new APORTE;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['APORTE']))
		{
			$model->attributes=$_POST['APORTE'];
                        $descaporte = new DESCRIPCIONAPORTE;
                        $v_maxaporte = CHtml::listData($descaporte->findAll(),'K_DESCAPORTE','V_MAXAPORTE');
                        $v_minaporte = CHtml::listData($descaporte->findAll(),'K_DESCAPORTE','V_MINAPORTE');
                        $q_dias = CHtml::listData($descaporte->findAll(),'K_DESCAPORTE','Q_DIAS');
                        $n_descaporte = (int)$descaporte->count();
                        $f_aporte = $model->attributes['F_CONSIGNACION'];
                        $dia = "";
                        for($i=0;$i<strlen($f_aporte);$i++)
                            if($f_aporte{$i} != "/")
                                $dia = $dia.$f_aporte{$i};
                            else
                                break;
                        if((float)$model->attributes["V_APORTE"] <= (float)$v_maxaporte[$n_descaporte-1] && 
                           (float)$model->attributes["V_APORTE"] >= (float)$v_minaporte[$n_descaporte-1]){
                            if((int)$q_dias[count($q_dias)-1]<(int)$dia);//FALTA LA COLUMNA DE MULTA
                            $model->K_FPAGO=(string)$n_descaporte;
                            $model->K_NUMCONSIGNACION=$_POST['APORTE']['K_NUMCONSIGNACION'];
                            if($model->save())
				$this->redirect(array('view','id'=>$model->K_NUMCONSIGNACION));
                        }else
                            print false; //NECESITO SACAR UN MENSAJE DE ERROR O ALGO                        
		}

		$this->render('create',array(
			'model'=>$model,
                ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['APORTE']))
		{
			$model->attributes=$_POST['APORTE'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->K_NUMCONSIGNACION));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('APORTE');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new APORTE('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['APORTE']))
			$model->attributes=$_GET['APORTE'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return APORTE the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=APORTE::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param APORTE $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='aporte-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
