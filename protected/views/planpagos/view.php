<?php
/* @var $this PLANPAGOSController */
/* @var $model PLANPAGOS */

$this->breadcrumbs=array(
	'Planpagoses'=>array('index'),
	$model->K_ID_PLAN,
);

$this->menu=array(
	array('label'=>'List PLANPAGOS', 'url'=>array('index')),
	array('label'=>'Create PLANPAGOS', 'url'=>array('create')),
	array('label'=>'Update PLANPAGOS', 'url'=>array('update', 'id'=>$model->K_ID_PLAN)),
	array('label'=>'Delete PLANPAGOS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_ID_PLAN),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PLANPAGOS', 'url'=>array('admin')),
);
?>

<h1>View PLANPAGOS #<?php echo $model->K_ID_PLAN; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_ID_PLAN',
		'Q_CUOTA',
		'V_XINTERES',
		'V_XCAPITAL',
		'F_ACONSIGNAR',
		'K_ID_CREDITO',
	),
)); ?>
