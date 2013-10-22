<?php
/* @var $this SOCIOController */
/* @var $model SOCIO */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SOCIO', 'url'=>array('index')),
	array('label'=>'Manage SOCIO', 'url'=>array('admin')),
);
?>

<h1>Create SOCIO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>