<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */

$this->breadcrumbs=array(
	'Creditos'=>array('index'),
	$model->K_ID_CREDITO,
);

$this->menu=array(
	array('label'=>'Listar creditos', 'url'=>array('index')),
	array('label'=>'Crear credito', 'url'=>array('create')),
	array('label'=>'Modificar credito', 'url'=>array('update', 'id'=>$model->K_ID_CREDITO)),
	array('label'=>'Borrar credito', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_ID_CREDITO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar creditos', 'url'=>array('admin')),
);
?>

<h1>View CREDITO #<?php echo $model->K_ID_CREDITO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_ID_CREDITO',
		'F_APROBACION',
		'F_DESEMBOLSO',
		'F_ULTIMO_PAGO',
		'V_ULTIMO_PAGO',
		'V_CREDITO',
		'V_SALDO',
		'I_ESTADO',
		'Q_CUOTAS',
		'K_IDENTIFICACION',
		'Q_CUOTA',
                'K_ID_DESCRIPCION',
	),
)); ?>
