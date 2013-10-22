<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $model DESCRIPCIONTIPOCREDITO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_ID_DESCRIPCION'); ?>
		<?php echo $form->textField($model,'K_ID_DESCRIPCION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_ESTABLECIMIENTO'); ?>
		<?php echo $form->textField($model,'F_ESTABLECIMIENTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_TASA_INTERES'); ?>
		<?php echo $form->textField($model,'V_TASA_INTERES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'V_APORTE_MINIMO'); ?>
		<?php echo $form->textField($model,'V_APORTE_MINIMO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Q_PLAZO_MAXIMO'); ?>
		<?php echo $form->textField($model,'Q_PLAZO_MAXIMO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->