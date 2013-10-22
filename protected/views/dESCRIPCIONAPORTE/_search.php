<?php
/* @var $this DESCRIPCIONAPORTEController */
/* @var $model DESCRIPCIONAPORTE */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'F_MODIFICACION'); ?>
		<?php echo $form->textField($model,'F_MODIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Q_DIAS'); ?>
		<?php echo $form->textField($model,'Q_DIAS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_MAXAPORTE'); ?>
		<?php echo $form->textField($model,'V_MAXAPORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_MINAPORTE'); ?>
		<?php echo $form->textField($model,'V_MINAPORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_INTERES_MULTA'); ?>
		<?php echo $form->textField($model,'V_INTERES_MULTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_DESCAPORTE'); ?>
		<?php echo $form->textField($model,'K_DESCAPORTE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->