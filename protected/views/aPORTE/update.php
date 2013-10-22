<?php
/* @var $this APORTEController */
/* @var $model APORTE */

$this->breadcrumbs=array(
	'Aportes'=>array('index'),
	$model->K_NUMCONSIGNACION=>array('view','id'=>$model->K_NUMCONSIGNACION),
	'Update',
);

$this->menu=array(
	array('label'=>'List APORTE', 'url'=>array('index')),
	array('label'=>'Create APORTE', 'url'=>array('create')),
	array('label'=>'View APORTE', 'url'=>array('view', 'id'=>$model->K_NUMCONSIGNACION)),
	array('label'=>'Manage APORTE', 'url'=>array('admin')),
);
?>

<h1>Update APORTE <?php echo $model->K_NUMCONSIGNACION; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>