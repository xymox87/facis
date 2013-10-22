<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $model DESCRIPCIONTIPOCREDITO */

$this->breadcrumbs=array(
	'Descripciontipocreditos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DESCRIPCIONTIPOCREDITO', 'url'=>array('index')),
	array('label'=>'Manage DESCRIPCIONTIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>Create DESCRIPCIONTIPOCREDITO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>