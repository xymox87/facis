<?php
/* @var $this GANANCIAController */
/* @var $model GANANCIA */

$this->breadcrumbs=array(
	'Ganancias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GANANCIA', 'url'=>array('index')),
	array('label'=>'Manage GANANCIA', 'url'=>array('admin')),
);
?>

<h1>Create GANANCIA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>