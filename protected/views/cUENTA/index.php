<?php
/* @var $this CUENTAController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuentas',
);

$this->menu=array(
	array('label'=>'Create CUENTA', 'url'=>array('create')),
	array('label'=>'Manage CUENTA', 'url'=>array('admin')),
);
?>

<h1>Cuentas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
