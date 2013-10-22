<?php
/* @var $this APORTEController */
/* @var $model APORTE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aporte-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'V_APORTE'); ?>
		<?php echo $form->textField($model,'V_APORTE'); ?>
		<?php echo $form->error($model,'V_APORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_CONSIGNACION'); ?>
		<?php echo $form->textField($model,'F_CONSIGNACION'); ?>
		<?php echo $form->error($model,'F_CONSIGNACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_DESCAPORTE'); ?>
		<?php echo $form->textField($model,'K_DESCAPORTE'); ?>
		<?php echo $form->error($model,'K_DESCAPORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->error($model,'K_IDENTIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_CUENTA'); ?>
		<?php echo $form->textField($model,'K_CUENTA'); ?>
		<?php echo $form->error($model,'K_CUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_FPAGO'); ?>
		<?php echo $form->textField($model,'K_FPAGO'); ?>
		<?php echo $form->error($model,'K_FPAGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->