<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_ID_CREDITO'); ?>
		<?php echo $form->textField($model,'K_ID_CREDITO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_APROBACION'); ?>
		<?php echo $form->textField($model,'F_APROBACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_DESEMBOLSO'); ?>
		<?php echo $form->textField($model,'F_DESEMBOLSO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_ULTIMO_PAGO'); ?>
		<?php echo $form->textField($model,'F_ULTIMO_PAGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_ULTIMO_PAGO'); ?>
		<?php echo $form->textField($model,'V_ULTIMO_PAGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_CREDITO'); ?>
		<?php echo $form->textField($model,'V_CREDITO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_SALDO'); ?>
		<?php echo $form->textField($model,'V_SALDO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_ESTADO'); ?>
		<?php echo $form->textField($model,'I_ESTADO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Q_CUOTAS'); ?>
		<?php echo $form->textField($model,'Q_CUOTAS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Q_CUOTA'); ?>
		<?php echo $form->textField($model,'Q_CUOTA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->