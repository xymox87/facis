<?php
/* @var $this GANANCIAController */
/* @var $model GANANCIA */

$this->breadcrumbs=array(
	'Ganancias'=>array('index'),
	$model->K_ID_GANANCIA,
);

$this->menu=array(
	array('label'=>'List GANANCIA', 'url'=>array('index')),
	array('label'=>'Create GANANCIA', 'url'=>array('create')),
	array('label'=>'Update GANANCIA', 'url'=>array('update', 'id'=>$model->K_ID_GANANCIA)),
	array('label'=>'Delete GANANCIA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_ID_GANANCIA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GANANCIA', 'url'=>array('admin')),
);
?>

<h1>View GANANCIA #<?php echo $model->K_ID_GANANCIA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_ID_GANANCIA',
		'V_GANANCIA',
		'F_CORTE',
		'O_PROCESO',
		'K_IDENTIFICACION',
	),
)); ?>
