<?php
/* @var $this RENDIMIENTOController */
/* @var $model RENDIMIENTO */

$this->breadcrumbs=array(
	'Rendimientos'=>array('index'),
	$model->K_FECHA_RENDIMIENTO=>array('view','id'=>$model->K_FECHA_RENDIMIENTO),
	'Update',
);

$this->menu=array(
	array('label'=>'List RENDIMIENTO', 'url'=>array('index')),
	array('label'=>'Create RENDIMIENTO', 'url'=>array('create')),
	array('label'=>'View RENDIMIENTO', 'url'=>array('view', 'id'=>$model->K_FECHA_RENDIMIENTO)),
	array('label'=>'Manage RENDIMIENTO', 'url'=>array('admin')),
);
?>

<h1>Update RENDIMIENTO <?php echo $model->K_FECHA_RENDIMIENTO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>