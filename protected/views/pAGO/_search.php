<?php
/* @var $this PAGOController */
/* @var $model PAGO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'F_PAGO'); ?>
		<?php echo $form->textField($model,'F_PAGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_NUMCONSIGNACION'); ?>
		<?php echo $form->textField($model,'K_NUMCONSIGNACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_PAGO'); ?>
		<?php echo $form->textField($model,'V_PAGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_CUENTA'); ?>
		<?php echo $form->textField($model,'K_CUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_FPAGO'); ?>
		<?php echo $form->textField($model,'K_FPAGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_ID_PLAN'); ?>
		<?php echo $form->textField($model,'K_ID_PLAN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->