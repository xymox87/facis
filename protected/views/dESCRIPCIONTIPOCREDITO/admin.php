<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $model DESCRIPCIONTIPOCREDITO */

$this->breadcrumbs=array(
	'Descripciontipocreditos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DESCRIPCIONTIPOCREDITO', 'url'=>array('index')),
	array('label'=>'Create DESCRIPCIONTIPOCREDITO', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#descripciontipocredito-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Descripción de Tipo de Credito</h1>

<p>
Opciones para Ordenamiento(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) 
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'descripciontipocredito-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'K_ID_DESCRIPCION',
		'F_ESTABLECIMIENTO',
		'V_TASA_INTERES',
		'V_APORTE_MINIMO',
		'Q_PLAZO_MAXIMO',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
