<?php
/* @var $this TIPOCREDITOController */
/* @var $model TIPOCREDITO */

$this->breadcrumbs=array(
	'Tipocreditos'=>array('index'),
	$model->K_IDENTIFICADOR=>array('view','id'=>$model->K_IDENTIFICADOR),
	'Update',
);

$this->menu=array(
	array('label'=>'List TIPOCREDITO', 'url'=>array('index')),
	array('label'=>'Create TIPOCREDITO', 'url'=>array('create')),
	array('label'=>'View TIPOCREDITO', 'url'=>array('view', 'id'=>$model->K_IDENTIFICADOR)),
	array('label'=>'Manage TIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>Update TIPOCREDITO <?php echo $model->K_IDENTIFICADOR; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>