<?php
/* @var $this PAGOController */
/* @var $model PAGO */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List PAGO', 'url'=>array('index')),
	array('label'=>'Gestionar pago de creditos', 'url'=>array('admin')),
);
?>

<h1>Crear pago de credito</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>