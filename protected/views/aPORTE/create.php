<?php
/* @var $this APORTEController */
/* @var $model APORTE */

$this->breadcrumbs=array(
	'Aportes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar aportes', 'url'=>array('index')),
	array('label'=>'Gestionar aportes', 'url'=>array('admin')),
);
?>

<h1>Crear aporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>