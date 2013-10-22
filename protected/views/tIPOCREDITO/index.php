<?php
/* @var $this TIPOCREDITOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipocreditos',
);

$this->menu=array(
	array('label'=>'Create TIPOCREDITO', 'url'=>array('create')),
	array('label'=>'Manage TIPOCREDITO', 'url'=>array('admin')),
);
?>

<h1>Tipocreditos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
