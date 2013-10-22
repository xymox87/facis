<?php
/* @var $this RENDIMIENTOController */
/* @var $model RENDIMIENTO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'V_RENDIMIENTO'); ?>
		<?php echo $form->textField($model,'V_RENDIMIENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_FECHA_RENDIMIENTO'); ?>
		<?php echo $form->textField($model,'K_FECHA_RENDIMIENTO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->