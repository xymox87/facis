<?php
/* @var $this SOCIOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Socios',
);

$this->menu=array(
	array('label'=>'Create SOCIO', 'url'=>array('create')),
	array('label'=>'Manage SOCIO', 'url'=>array('admin')),
);
?>

<h1>Socios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
