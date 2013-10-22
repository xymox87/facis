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
		<?php echo $form->labelEx($model,'Q_NUMCUOTA'); ?>
		<?php echo $form->textField($model,'Q_NUMCUOTA'); ?>
		<?php echo $form->error($model,'Q_NUMCUOTA'); ?>
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