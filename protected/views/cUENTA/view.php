<?php
/* @var $this CUENTAController */
/* @var $model CUENTA */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	$model->K_CUENTA,
);

$this->menu=array(
	array('label'=>'List CUENTA', 'url'=>array('index')),
	array('label'=>'Create CUENTA', 'url'=>array('create')),
	array('label'=>'Update CUENTA', 'url'=>array('update', 'id'=>$model->K_CUENTA)),
	array('label'=>'Delete CUENTA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_CUENTA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CUENTA', 'url'=>array('admin')),
);
?>

<h1>View CUENTA #<?php echo $model->K_CUENTA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'N_BANCO',
		'K_CUENTA',
		'N_DESCUENTA',
	),
)); ?>
