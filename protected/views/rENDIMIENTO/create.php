<?php
/* @var $this RENDIMIENTOController */
/* @var $model RENDIMIENTO */

$this->breadcrumbs=array(
	'Rendimientos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RENDIMIENTO', 'url'=>array('index')),
	array('label'=>'Manage RENDIMIENTO', 'url'=>array('admin')),
);
?>

<h1>Create RENDIMIENTO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>