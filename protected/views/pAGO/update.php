<?php
/* @var $this PAGOController */
/* @var $model PAGO */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->K_NUMCONSIGNACION=>array('view','id'=>$model->K_NUMCONSIGNACION),
	'Update',
);

$this->menu=array(
	//array('label'=>'List PAGO', 'url'=>array('index')),
	array('label'=>'Crear pago de creditos', 'url'=>array('create')),
	array('label'=>'Ver pago de creditos', 'url'=>array('view', 'id'=>$model->K_NUMCONSIGNACION)),
	array('label'=>'Gestionar pago de creditos', 'url'=>array('admin')),
);
?>

<h1>Update PAGO <?php echo $model->K_NUMCONSIGNACION; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>