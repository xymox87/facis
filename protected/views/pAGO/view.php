<?php
/* @var $this PAGOController */
/* @var $model PAGO */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->K_NUMCONSIGNACION,
);

$this->menu=array(
	//array('label'=>'List PAGO', 'url'=>array('index')),
	array('label'=>'Crear pagos de credito', 'url'=>array('create')),
	//array('label'=>'Update PAGO', 'url'=>array('update', 'id'=>$model->K_NUMCONSIGNACION)),
	//array('label'=>'Delete PAGO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_NUMCONSIGNACION),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar pagos de credito', 'url'=>array('admin')),
);
?>

<h1>View PAGO #<?php echo $model->K_NUMCONSIGNACION; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'F_PAGO',
		'K_NUMCONSIGNACION',
		'V_PAGO',
		'K_CUENTA',
		'K_FPAGO',
	),
)); ?>
