<?php
/* @var $this DESCRIPCIONAPORTEController */
/* @var $model DESCRIPCIONAPORTE */

$this->breadcrumbs=array(
	'Descripcionaportes'=>array('index'),
	$model->K_DESCAPORTE,
);

$this->menu=array(
	array('label'=>'List DESCRIPCIONAPORTE', 'url'=>array('index')),
	array('label'=>'Create DESCRIPCIONAPORTE', 'url'=>array('create')),
	array('label'=>'Update DESCRIPCIONAPORTE', 'url'=>array('update', 'id'=>$model->K_DESCAPORTE)),
	array('label'=>'Delete DESCRIPCIONAPORTE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_DESCAPORTE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DESCRIPCIONAPORTE', 'url'=>array('admin')),
);
?>

<h1>View DESCRIPCIONAPORTE #<?php echo $model->K_DESCAPORTE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'F_MODIFICACION',
		'Q_DIAS',
		'V_MAXAPORTE',
		'V_MINAPORTE',
		'V_INTERES_MULTA',
		'K_DESCAPORTE',
	),
)); ?>
