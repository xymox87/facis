<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $model DESCRIPCIONTIPOCREDITO */

$this->breadcrumbs=array(
	'Descripciontipocreditos'=>array('index'),
	$model->K_ID_DESCRIPCION,
);

$this->menu=array(
	array('label'=>'List DESCRIPCIONTIPOCREDITO', 'url'=>array('index')),
	array('label'=>'Create DESCRIPCIONTIPOCREDITO', 'url'=>array('create')),
	array('label'=>'Update DESCRIPCIONTIPOCREDITO', 'url'=>array('update', 'id'=>$model->K_ID_DESCRIPCION)),
	array('label'=>'Delete DESCRIPCIONTIPOCREDITO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_ID_DESCRIPCION),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DESCRIPCIONTIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>View DESCRIPCIONTIPOCREDITO #<?php echo $model->K_ID_DESCRIPCION; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_ID_DESCRIPCION',
		'F_ESTABLECIMIENTO',
		'V_TASA_INTERES',
		'V_APORTE_MINIMO',
		'Q_PLAZO_MAXIMO',
	),
)); ?>
