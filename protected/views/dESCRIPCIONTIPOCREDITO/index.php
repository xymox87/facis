<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descripciontipocreditos',
);

$this->menu=array(
	array('label'=>'Create DESCRIPCIONTIPOCREDITO', 'url'=>array('create')),
	array('label'=>'Manage DESCRIPCIONTIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>Descripciontipocreditos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
