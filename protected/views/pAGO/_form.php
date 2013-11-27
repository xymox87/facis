<?php
/* @var $this PAGOController */
/* @var $model PAGO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pago-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'K_NUMCONSIGNACION'); ?>
		<?php echo $form->textField($model,'K_NUMCONSIGNACION'); ?>
		<?php echo $form->error($model,'K_NUMCONSIGNACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_PAGO'); ?>
		<?php echo $form->textField($model,'F_PAGO'); ?>
		<?php echo $form->error($model,'F_PAGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_PAGO'); ?>
		<?php echo $form->textField($model,'V_PAGO'); ?>
		<?php echo $form->error($model,'V_PAGO'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'K_ID_PLAN'); ?>
		<?php echo $form->textField($model,'K_ID_PLAN'); ?>
		<?php echo $form->error($model,'K_ID_PLAN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->