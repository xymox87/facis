<?php
/* @var $this PLANPAGOSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Planpagoses',
);

$this->menu=array(
	array('label'=>'Create PLANPAGOS', 'url'=>array('create')),
	array('label'=>'Manage PLANPAGOS', 'url'=>array('admin')),
);
?>

<h1>Planpagoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
