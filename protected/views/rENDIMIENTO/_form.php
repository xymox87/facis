<?php
/* @var $this RENDIMIENTOController */
/* @var $model RENDIMIENTO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rendimiento-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'V_RENDIMIENTO'); ?>
		<?php echo $form->textField($model,'V_RENDIMIENTO'); ?>
		<?php echo $form->error($model,'V_RENDIMIENTO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->