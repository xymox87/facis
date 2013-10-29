<?php
/* @var $this APORTEController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aportes',
);

$this->menu=array(
	array('label'=>'Crear aporte', 'url'=>array('create')),
	array('label'=>'Gestionar aportes', 'url'=>array('admin')),
);
?>

<h1>Aportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
