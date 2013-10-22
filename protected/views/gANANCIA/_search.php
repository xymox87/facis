<?php
/* @var $this GANANCIAController */
/* @var $model GANANCIA */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_ID_GANANCIA'); ?>
		<?php echo $form->textField($model,'K_ID_GANANCIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_GANANCIA'); ?>
		<?php echo $form->textField($model,'V_GANANCIA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_CORTE'); ?>
		<?php echo $form->textField($model,'F_CORTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_PROCESO'); ?>
		<?php echo $form->textField($model,'O_PROCESO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->