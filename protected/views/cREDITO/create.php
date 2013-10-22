<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */

$this->breadcrumbs=array(
	'Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CREDITO', 'url'=>array('index')),
	array('label'=>'Manage CREDITO', 'url'=>array('admin')),
);
?>

<h1>Create CREDITO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>