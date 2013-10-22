<?php
/* @var $this DESCRIPCIONAPORTEController */
/* @var $model DESCRIPCIONAPORTE */

$this->breadcrumbs=array(
	'Descripcionaportes'=>array('index'),
	$model->K_DESCAPORTE=>array('view','id'=>$model->K_DESCAPORTE),
	'Update',
);

$this->menu=array(
	array('label'=>'List DESCRIPCIONAPORTE', 'url'=>array('index')),
	array('label'=>'Create DESCRIPCIONAPORTE', 'url'=>array('create')),
	array('label'=>'View DESCRIPCIONAPORTE', 'url'=>array('view', 'id'=>$model->K_DESCAPORTE)),
	array('label'=>'Manage DESCRIPCIONAPORTE', 'url'=>array('admin')),
);
?>

<h1>Update DESCRIPCIONAPORTE <?php echo $model->K_DESCAPORTE; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>