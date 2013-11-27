<?php
/* @var $this PAGOController */
/* @var $model PAGO */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PAGO', 'url'=>array('index')),
	array('label'=>'Create PAGO', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pago-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Pagos</h1>

<p>
Opciones de Ordenamiento (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) </p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pago-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'F_PAGO',
		'K_NUMCONSIGNACION',
		'V_PAGO',
		'K_CUENTA',
		'K_FPAGO',
		'K_ID_PLAN',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
