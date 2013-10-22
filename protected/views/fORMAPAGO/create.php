<?php
/* @var $this FORMAPAGOController */
/* @var $model FORMAPAGO */

$this->breadcrumbs=array(
	'Formapagos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FORMAPAGO', 'url'=>array('index')),
	array('label'=>'Manage FORMAPAGO', 'url'=>array('admin')),
);
?>

<h1>Create FORMAPAGO</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>