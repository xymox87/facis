<?php
/* @var $this PAGOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pagos',
);

$this->menu=array(
	array('label'=>'Create PAGO', 'url'=>array('create')),
	array('label'=>'Manage PAGO', 'url'=>array('admin')),
);
?>

<h1>Pagos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
