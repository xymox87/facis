<?php
/* @var $this APORTEController */
/* @var $model APORTE */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'V_APORTE'); ?>
		<?php echo $form->textField($model,'V_APORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_CONSIGNACION'); ?>
		<?php echo $form->textField($model,'F_CONSIGNACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_NUMCONSIGNACION'); ?>
		<?php echo $form->textField($model,'K_NUMCONSIGNACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_DESCAPORTE'); ?>
		<?php echo $form->textField($model,'K_DESCAPORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_CUENTA'); ?>
		<?php echo $form->textField($model,'K_CUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_FPAGO'); ?>
		<?php echo $form->textField($model,'K_FPAGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->