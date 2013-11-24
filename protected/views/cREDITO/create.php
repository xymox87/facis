<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */

$this->breadcrumbs=array(
	'Creditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar creditos', 'url'=>array('index')),
	array('label'=>'Gestionar creditos', 'url'=>array('admin')),
);
?>

<h1>Crear credito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
