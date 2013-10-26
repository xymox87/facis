<?php
/* @var $this SOCIOController */
/* @var $model SOCIO */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Socios', 'url'=>array('index')),
	array('label'=>'Gestion de Socios', 'url'=>array('admin')),
);
?>

<h1>Crear Socio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>