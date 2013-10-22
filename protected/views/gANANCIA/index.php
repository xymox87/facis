<?php
/* @var $this GANANCIAController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ganancias',
);

$this->menu=array(
	array('label'=>'Create GANANCIA', 'url'=>array('create')),
	array('label'=>'Manage GANANCIA', 'url'=>array('admin')),
);
?>

<h1>Ganancias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
