<?php
/* @var $this PAGOController */
/* @var $model PAGO */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PAGO', 'url'=>array('index')),
	array('label'=>'Manage PAGO', 'url'=>array('admin')),
);
?>

<h1>Create PAGO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>