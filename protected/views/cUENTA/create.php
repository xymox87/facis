<?php
/* @var $this CUENTAController */
/* @var $model CUENTA */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CUENTA', 'url'=>array('index')),
	array('label'=>'Manage CUENTA', 'url'=>array('admin')),
);
?>

<h1>Create CUENTA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>