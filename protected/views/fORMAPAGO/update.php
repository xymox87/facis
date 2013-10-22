<?php
/* @var $this FORMAPAGOController */
/* @var $model FORMAPAGO */

$this->breadcrumbs=array(
	'Formapagos'=>array('index'),
	$model->K_FPAGO=>array('view','id'=>$model->K_FPAGO),
	'Update',
);

$this->menu=array(
	array('label'=>'List FORMAPAGO', 'url'=>array('index')),
	array('label'=>'Create FORMAPAGO', 'url'=>array('create')),
	array('label'=>'View FORMAPAGO', 'url'=>array('view', 'id'=>$model->K_FPAGO)),
	array('label'=>'Manage FORMAPAGO', 'url'=>array('admin')),
);
?>

<h1>Update FORMAPAGO <?php echo $model->K_FPAGO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>