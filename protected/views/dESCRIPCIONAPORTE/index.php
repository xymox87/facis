<?php
/* @var $this DESCRIPCIONAPORTEController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descripcionaportes',
);

$this->menu=array(
	array('label'=>'Create DESCRIPCIONAPORTE', 'url'=>array('create')),
	array('label'=>'Manage DESCRIPCIONAPORTE', 'url'=>array('admin')),
);
?>

<h1>Descripcionaportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
