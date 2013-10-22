<?php
/* @var $this RENDIMIENTOController */
/* @var $model RENDIMIENTO */

$this->breadcrumbs=array(
	'Rendimientos'=>array('index'),
	$model->K_FECHA_RENDIMIENTO,
);

$this->menu=array(
	array('label'=>'List RENDIMIENTO', 'url'=>array('index')),
	array('label'=>'Create RENDIMIENTO', 'url'=>array('create')),
	array('label'=>'Update RENDIMIENTO', 'url'=>array('update', 'id'=>$model->K_FECHA_RENDIMIENTO)),
	array('label'=>'Delete RENDIMIENTO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_FECHA_RENDIMIENTO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RENDIMIENTO', 'url'=>array('admin')),
);
?>

<h1>View RENDIMIENTO #<?php echo $model->K_FECHA_RENDIMIENTO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'V_RENDIMIENTO',
		'K_FECHA_RENDIMIENTO',
	),
)); ?>
