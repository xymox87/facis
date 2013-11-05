<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */

$this->breadcrumbs=array(
	'Creditos'=>array('index'),
	$model->K_ID_CREDITO=>array('view','id'=>$model->K_ID_CREDITO),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar creditos', 'url'=>array('index')),
	array('label'=>'Crear creditos', 'url'=>array('create')),
	array('label'=>'Ver creditos', 'url'=>array('view', 'id'=>$model->K_ID_CREDITO)),
	array('label'=>'Gestionar creditos', 'url'=>array('admin')),
);
?>

<h1>Update CREDITO <?php echo $model->K_ID_CREDITO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>