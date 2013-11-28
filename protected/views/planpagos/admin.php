<?php
/* @var $this PLANPAGOSController */
/* @var $model PLANPAGOS */

$this->breadcrumbs=array(
	'Planpagoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PLANPAGOS', 'url'=>array('index')),
	array('label'=>'Create PLANPAGOS', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#planpagos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Planpagoses</h1>

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
	'id'=>'planpagos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'K_ID_PLAN',
		'Q_CUOTA',
		'V_XINTERES',
		'V_XCAPITAL',
		'F_ACONSIGNAR',
		'K_ID_CREDITO',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
