<?php
/* @var $this PLANPAGOSController */
/* @var $model PLANPAGOS */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_ID_PLAN'); ?>
		<?php echo $form->textField($model,'K_ID_PLAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Q_CUOTA'); ?>
		<?php echo $form->textField($model,'Q_CUOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_XINTERES'); ?>
		<?php echo $form->textField($model,'V_XINTERES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_XCAPITAL'); ?>
		<?php echo $form->textField($model,'V_XCAPITAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_ACONSIGNAR'); ?>
		<?php echo $form->textField($model,'F_ACONSIGNAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_ID_CREDITO'); ?>
		<?php echo $form->textField($model,'K_ID_CREDITO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->