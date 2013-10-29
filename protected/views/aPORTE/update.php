<?php
/* @var $this APORTEController */
/* @var $model APORTE */

$this->breadcrumbs=array(
	'Aportes'=>array('index'),
	$model->K_NUMCONSIGNACION=>array('view','id'=>$model->K_NUMCONSIGNACION),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar aportes', 'url'=>array('index')),
	array('label'=>'Crear aporte', 'url'=>array('create')),
	array('label'=>'Ver aportes', 'url'=>array('view', 'id'=>$model->K_NUMCONSIGNACION)),
	array('label'=>'Gestionar aportes', 'url'=>array('admin')),
);
?>

<h1>Update APORTE <?php echo $model->K_NUMCONSIGNACION; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>