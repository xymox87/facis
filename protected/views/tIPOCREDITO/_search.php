<?php
/* @var $this TIPOCREDITOController */
/* @var $model TIPOCREDITO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_IDENTIFICADOR'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICADOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_TIPO'); ?>
		<?php echo $form->textField($model,'I_TIPO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_DESCRIPCION'); ?>
		<?php echo $form->textField($model,'N_DESCRIPCION',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->