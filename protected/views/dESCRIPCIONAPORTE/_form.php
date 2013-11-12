<?php
/* @var $this DESCRIPCIONAPORTEController */
/* @var $model DESCRIPCIONAPORTE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'descripcionaporte-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'F_MODIFICACION'); ?>
		<?php echo $form->textField($model,'F_MODIFICACION'); ?>
		<?php echo $form->error($model,'F_MODIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Q_DIAS'); ?>
		<?php echo $form->textField($model,'Q_DIAS'); ?>
		<?php echo $form->error($model,'Q_DIAS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_MAXAPORTE'); ?>
		<?php echo $form->textField($model,'V_MAXAPORTE'); ?>
		<?php echo $form->error($model,'V_MAXAPORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_MINAPORTE'); ?>
		<?php echo $form->textField($model,'V_MINAPORTE'); ?>
		<?php echo $form->error($model,'V_MINAPORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_INTERES_MULTA'); ?>
		<?php echo $form->textField($model,'V_INTERES_MULTA'); ?>
		<?php echo $form->error($model,'V_INTERES_MULTA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->