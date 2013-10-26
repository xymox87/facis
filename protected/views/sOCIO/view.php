<?php
/* @var $this SOCIOController */
/* @var $model SOCIO */

$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->K_IDENTIFICACION,
);

$this->menu=array(
	//array('label'=>'List SOCIO', 'url'=>array('index')),
    array('label'=>'Gestionar socio', 'url'=>array('admin')),
	array('label'=>'Crear SOCIO', 'url'=>array('create')),
	array('label'=>'Modificar SOCIO', 'url'=>array('update', 'id'=>$model->K_IDENTIFICACION)),
	array('label'=>'Eliminar socio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->K_IDENTIFICACION),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View SOCIO #<?php echo $model->K_IDENTIFICACION; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'K_IDENTIFICACION',
		'N_NOMBRE',
		'N_APELLIDO',
		'I_ESTADO_CIVIL',
		'N_OCUPACION',
		'O_TARJETA_PROFESIONAL',
		'I_GENERO',
		'O_DIRECCION_DOMICILIO',
		'O_DIRECCION_TRABAJO',
		'O_CORREO_ELECTRONICO',
		'O_TELEFONO_DOMICILIO',
		'O_TELEFONO_TRABAJO',
		'O_TELEFONO_CELULAR',
		'F_INGRESO',
		'F_RETIRO',
		'O_CAUSAL_RETIRO',
	),
)); ?>
