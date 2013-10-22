<?php
/* @var $this CUENTAController */
/* @var $model CUENTA */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'N_BANCO'); ?>
		<?php echo $form->textField($model,'N_BANCO',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'K_CUENTA'); ?>
		<?php echo $form->textField($model,'K_CUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_DESCUENTA'); ?>
		<?php echo $form->textField($model,'N_DESCUENTA',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->