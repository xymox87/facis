<?php
/* @var $this GANANCIAController */
/* @var $model GANANCIA */

$this->breadcrumbs=array(
	'Ganancias'=>array('index'),
	$model->K_ID_GANANCIA=>array('view','id'=>$model->K_ID_GANANCIA),
	'Update',
);

$this->menu=array(
	array('label'=>'List GANANCIA', 'url'=>array('index')),
	array('label'=>'Create GANANCIA', 'url'=>array('create')),
	array('label'=>'View GANANCIA', 'url'=>array('view', 'id'=>$model->K_ID_GANANCIA)),
	array('label'=>'Manage GANANCIA', 'url'=>array('admin')),
);
?>

<h1>Update GANANCIA <?php echo $model->K_ID_GANANCIA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>