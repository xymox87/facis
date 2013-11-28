<?php
/* @var $this GANANCIAController */
/* @var $model GANANCIA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ganancia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'V_GANANCIA'); ?>
		<?php echo $form->textField($model,'V_GANANCIA'); ?>
		<?php echo $form->error($model,'V_GANANCIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_CORTE'); ?>
		<?php echo $form->textField($model,'F_CORTE'); ?>
		<?php echo $form->error($model,'F_CORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_PROCESO'); ?>
		<?php echo $form->textField($model,'O_PROCESO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'O_PROCESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->error($model,'K_IDENTIFICACION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->