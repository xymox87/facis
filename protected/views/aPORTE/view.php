<?php
/* @var $this APORTEController */
/* @var $model APORTE */

$this->breadcrumbs=array(
	'Aportes'=>array('index'),
	$model->K_NUMCONSIGNACION,
);

$this->menu=array(
	array('label'=>'Listar aportes', 'url'=>array('index')),
	array('label'=>'Crear aportes', 'url'=>array('create')),
	//array('label'=>'Update APORTE', 'url'=>array('update', 'id'=>$model->K_NUMCONSIGNACION)),
	//array('label'=>'Delete APORTE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_NUMCONSIGNACION),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar aportes', 'url'=>array('admin')),
);
?>

<h1>View APORTE #<?php echo $model->K_NUMCONSIGNACION; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'V_APORTE',
		'F_CONSIGNACION',
		'K_NUMCONSIGNACION',
		'K_DESCAPORTE',
		'K_IDENTIFICACION',
		'K_CUENTA',
		'K_FPAGO',
                'V_MULTA',
	),
)); ?>
