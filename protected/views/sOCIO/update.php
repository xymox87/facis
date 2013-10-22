<?php
/* @var $this SOCIOController */
/* @var $model SOCIO */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->K_IDENTIFICACION=>array('view','id'=>$model->K_IDENTIFICACION),
	'Update',
);

$this->menu=array(
	array('label'=>'List SOCIO', 'url'=>array('index')),
	array('label'=>'Create SOCIO', 'url'=>array('create')),
	array('label'=>'View SOCIO', 'url'=>array('view', 'id'=>$model->K_IDENTIFICACION)),
	array('label'=>'Manage SOCIO', 'url'=>array('admin')),
);
?>

<h1>Update SOCIO <?php echo $model->K_IDENTIFICACION; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>