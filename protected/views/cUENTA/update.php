<?php
/* @var $this CUENTAController */
/* @var $model CUENTA */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	$model->K_CUENTA=>array('view','id'=>$model->K_CUENTA),
	'Update',
);

$this->menu=array(
	array('label'=>'List CUENTA', 'url'=>array('index')),
	array('label'=>'Create CUENTA', 'url'=>array('create')),
	array('label'=>'View CUENTA', 'url'=>array('view', 'id'=>$model->K_CUENTA)),
	array('label'=>'Manage CUENTA', 'url'=>array('admin')),
);
?>

<h1>Update CUENTA <?php echo $model->K_CUENTA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>