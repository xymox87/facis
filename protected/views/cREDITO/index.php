<?php
/* @var $this CREDITOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Creditos',
);

$this->menu=array(
	array('label'=>'Crear credito', 'url'=>array('create')),
	array('label'=>'Gestionar creditos', 'url'=>array('admin')),
);
?>

<h1>Creditos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
