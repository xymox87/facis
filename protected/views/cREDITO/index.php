<?php
/* @var $this CREDITOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Creditos',
);

$this->menu=array(
	array('label'=>'Create CREDITO', 'url'=>array('create')),
	array('label'=>'Manage CREDITO', 'url'=>array('admin')),
);
?>

<h1>Creditos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
