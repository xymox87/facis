<?php
/* @var $this DESCRIPCIONAPORTEController */
/* @var $model DESCRIPCIONAPORTE */

$this->breadcrumbs=array(
	'Descripcionaportes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DESCRIPCIONAPORTE', 'url'=>array('index')),
	array('label'=>'Manage DESCRIPCIONAPORTE', 'url'=>array('admin')),
);
?>

<h1>Create DESCRIPCIONAPORTE</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>