<?php
/* @var $this FORMAPAGOController */
/* @var $model FORMAPAGO */

$this->breadcrumbs=array(
	'Formapagos'=>array('index'),
	$model->K_FPAGO,
);

$this->menu=array(
	array('label'=>'List FORMAPAGO', 'url'=>array('index')),
	array('label'=>'Create FORMAPAGO', 'url'=>array('create')),
	array('label'=>'Update FORMAPAGO', 'url'=>array('update', 'id'=>$model->K_FPAGO)),
	array('label'=>'Delete FORMAPAGO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_FPAGO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FORMAPAGO', 'url'=>array('admin')),
);
?>

<h1>View FORMAPAGO #<?php echo $model->K_FPAGO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_FPAGO',
		'N_FPAGO',
	),
)); ?>
