<?php
/* @var $this CUENTAController */
/* @var $model CUENTA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuenta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'N_BANCO'); ?>
		<?php echo $form->textField($model,'N_BANCO',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'N_BANCO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_DESCUENTA'); ?>
		<?php echo $form->textField($model,'N_DESCUENTA',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'N_DESCUENTA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->