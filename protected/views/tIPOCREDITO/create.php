<?php
/* @var $this TIPOCREDITOController */
/* @var $model TIPOCREDITO */

$this->breadcrumbs=array(
	'Tipocreditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TIPOCREDITO', 'url'=>array('index')),
	array('label'=>'Manage TIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>Create TIPOCREDITO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>