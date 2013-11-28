<?php
/* @var $this PLANPAGOSController */
/* @var $model PLANPAGOS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'planpagos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Q_CUOTA'); ?>
		<?php echo $form->textField($model,'Q_CUOTA'); ?>
		<?php echo $form->error($model,'Q_CUOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_XINTERES'); ?>
		<?php echo $form->textField($model,'V_XINTERES'); ?>
		<?php echo $form->error($model,'V_XINTERES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_XCAPITAL'); ?>
		<?php echo $form->textField($model,'V_XCAPITAL'); ?>
		<?php echo $form->error($model,'V_XCAPITAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_ACONSIGNAR'); ?>
		<?php echo $form->textField($model,'F_ACONSIGNAR'); ?>
		<?php echo $form->error($model,'F_ACONSIGNAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_ID_CREDITO'); ?>
		<?php echo $form->textField($model,'K_ID_CREDITO'); ?>
		<?php echo $form->error($model,'K_ID_CREDITO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->