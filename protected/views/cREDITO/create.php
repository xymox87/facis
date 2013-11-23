<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */

$this->breadcrumbs=array(
	'Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Creditos', 'url'=>array('index')),
	array('label'=>'Gestionar Creditos', 'url'=>array('admin')),
);
?>

<h1>Create CREDITO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>