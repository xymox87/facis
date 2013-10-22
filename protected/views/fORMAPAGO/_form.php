<?php
/* @var $this FORMAPAGOController */
/* @var $model FORMAPAGO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formapago-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'N_FPAGO'); ?>
		<?php echo $form->textField($model,'N_FPAGO',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'N_FPAGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->