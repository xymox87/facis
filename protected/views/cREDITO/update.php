<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */

$this->breadcrumbs=array(
	'Creditos'=>array('index'),
	$model->K_ID_CREDITO=>array('view','id'=>$model->K_ID_CREDITO),
	'Update',
);

$this->menu=array(
	array('label'=>'List CREDITO', 'url'=>array('index')),
	array('label'=>'Create CREDITO', 'url'=>array('create')),
	array('label'=>'View CREDITO', 'url'=>array('view', 'id'=>$model->K_ID_CREDITO)),
	array('label'=>'Manage CREDITO', 'url'=>array('admin')),
);
?>

<h1>Update CREDITO <?php echo $model->K_ID_CREDITO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>