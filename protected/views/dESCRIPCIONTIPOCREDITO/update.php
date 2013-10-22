<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $model DESCRIPCIONTIPOCREDITO */

$this->breadcrumbs=array(
	'Descripciontipocreditos'=>array('index'),
	$model->K_ID_DESCRIPCION=>array('view','id'=>$model->K_ID_DESCRIPCION),
	'Update',
);

$this->menu=array(
	array('label'=>'List DESCRIPCIONTIPOCREDITO', 'url'=>array('index')),
	array('label'=>'Create DESCRIPCIONTIPOCREDITO', 'url'=>array('create')),
	array('label'=>'View DESCRIPCIONTIPOCREDITO', 'url'=>array('view', 'id'=>$model->K_ID_DESCRIPCION)),
	array('label'=>'Manage DESCRIPCIONTIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>Update DESCRIPCIONTIPOCREDITO <?php echo $model->K_ID_DESCRIPCION; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>