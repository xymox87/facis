<?php
/* @var $this SOCIOController */
/* @var $model SOCIO */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->K_IDENTIFICACION=>array('view','id'=>$model->K_IDENTIFICACION),
	'Update',
);

$this->menu=array(
	array('label'=>'Gestionar socios', 'url'=>array('admin')),
	array('label'=>'Crear socio', 'url'=>array('create')),
	array('label'=>'Ver socio', 'url'=>array('view', 'id'=>$model->K_IDENTIFICACION)),
);
?>

<h1>Update SOCIO <?php echo $model->K_IDENTIFICACION; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>