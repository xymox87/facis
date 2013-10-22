<?php
/* @var $this RENDIMIENTOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rendimientos',
);

$this->menu=array(
	array('label'=>'Create RENDIMIENTO', 'url'=>array('create')),
	array('label'=>'Manage RENDIMIENTO', 'url'=>array('admin')),
);
?>

<h1>Rendimientos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
