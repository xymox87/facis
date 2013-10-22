<?php
/* @var $this TIPOCREDITOController */
/* @var $model TIPOCREDITO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipocredito-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'I_TIPO'); ?>
		<?php echo $form->textField($model,'I_TIPO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'I_TIPO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_DESCRIPCION'); ?>
		<?php echo $form->textField($model,'N_DESCRIPCION',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'N_DESCRIPCION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->