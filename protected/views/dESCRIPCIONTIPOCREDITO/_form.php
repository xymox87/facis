<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $model DESCRIPCIONTIPOCREDITO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'descripciontipocredito-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'F_ESTABLECIMIENTO'); ?>
		<?php echo $form->textField($model,'F_ESTABLECIMIENTO'); ?>
		<?php echo $form->error($model,'F_ESTABLECIMIENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_TASA_INTERES'); ?>
		<?php echo $form->textField($model,'V_TASA_INTERES'); ?>
		<?php echo $form->error($model,'V_TASA_INTERES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_APORTE_MINIMO'); ?>
		<?php echo $form->textField($model,'V_APORTE_MINIMO'); ?>
		<?php echo $form->error($model,'V_APORTE_MINIMO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Q_PLAZO_MAXIMO'); ?>
		<?php echo $form->textField($model,'Q_PLAZO_MAXIMO'); ?>
		<?php echo $form->error($model,'Q_PLAZO_MAXIMO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->