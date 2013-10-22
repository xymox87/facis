<?php
/* @var $this APORTEController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aportes',
);

$this->menu=array(
	array('label'=>'Create APORTE', 'url'=>array('create')),
	array('label'=>'Manage APORTE', 'url'=>array('admin')),
);
?>

<h1>Aportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
