<?php
/* @var $this PLANPAGOSController */
/* @var $model PLANPAGOS */

$this->breadcrumbs=array(
	'Planpagoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PLANPAGOS', 'url'=>array('index')),
	array('label'=>'Manage PLANPAGOS', 'url'=>array('admin')),
);
?>

<h1>Create PLANPAGOS</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>