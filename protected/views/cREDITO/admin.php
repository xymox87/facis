<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */

$this->breadcrumbs=array(
	'Creditos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CREDITO', 'url'=>array('index')),
	array('label'=>'Create CREDITO', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#credito-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Creditos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'credito-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'K_ID_CREDITO',
		'F_APROBACION',
		'F_DESEMBOLSO',
		'F_ULTIMO_PAGO',
		'V_ULTIMO_PAGO',
		'V_CREDITO',
		/*
		'V_SALDO',
		'I_ESTADO',
		'Q_CUOTAS',
		'K_IDENTIFICACION',
		'Q_CUOTA',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
