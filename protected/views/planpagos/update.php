<?php
/* @var $this PLANPAGOSController */
/* @var $model PLANPAGOS */

$this->breadcrumbs=array(
	'Planpagoses'=>array('index'),
	$model->K_ID_PLAN=>array('view','id'=>$model->K_ID_PLAN),
	'Update',
);

$this->menu=array(
	array('label'=>'List PLANPAGOS', 'url'=>array('index')),
	array('label'=>'Create PLANPAGOS', 'url'=>array('create')),
	array('label'=>'View PLANPAGOS', 'url'=>array('view', 'id'=>$model->K_ID_PLAN)),
	array('label'=>'Manage PLANPAGOS', 'url'=>array('admin')),
);
?>

<h1>Update PLANPAGOS <?php echo $model->K_ID_PLAN; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>