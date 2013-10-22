<?php
/* @var $this FORMAPAGOController */
/* @var $model FORMAPAGO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_FPAGO'); ?>
		<?php echo $form->textField($model,'K_FPAGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_FPAGO'); ?>
		<?php echo $form->textField($model,'N_FPAGO',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->