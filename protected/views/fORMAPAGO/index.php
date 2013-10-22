<?php
/* @var $this FORMAPAGOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Formapagos',
);

$this->menu=array(
	array('label'=>'Create FORMAPAGO', 'url'=>array('create')),
	array('label'=>'Manage FORMAPAGO', 'url'=>array('admin')),
);
?>

<h1>Formapagos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
