<?php
/* @var $this TIPOCREDITOController */
/* @var $model TIPOCREDITO */

$this->breadcrumbs=array(
	'Tipocreditos'=>array('index'),
	$model->K_IDENTIFICADOR,
);

$this->menu=array(
	array('label'=>'List TIPOCREDITO', 'url'=>array('index')),
	array('label'=>'Create TIPOCREDITO', 'url'=>array('create')),
	array('label'=>'Update TIPOCREDITO', 'url'=>array('update', 'id'=>$model->K_IDENTIFICADOR)),
	array('label'=>'Delete TIPOCREDITO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDENTIFICADOR),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>View TIPOCREDITO #<?php echo $model->K_IDENTIFICADOR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDENTIFICADOR',
		'I_TIPO',
		'N_DESCRIPCION',
	),
)); ?>
