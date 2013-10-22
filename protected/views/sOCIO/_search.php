<?php
/* @var $this SOCIOController */
/* @var $model SOCIO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_NOMBRE'); ?>
		<?php echo $form->textField($model,'N_NOMBRE',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_APELLIDO'); ?>
		<?php echo $form->textField($model,'N_APELLIDO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_ESTADO_CIVIL'); ?>
		<?php echo $form->textField($model,'I_ESTADO_CIVIL',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'N_OCUPACION'); ?>
		<?php echo $form->textField($model,'N_OCUPACION',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_TARJETA_PROFESIONAL'); ?>
		<?php echo $form->textField($model,'O_TARJETA_PROFESIONAL',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'I_GENERO'); ?>
		<?php echo $form->textField($model,'I_GENERO',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_DIRECCION_DOMICILIO'); ?>
		<?php echo $form->textField($model,'O_DIRECCION_DOMICILIO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_DIRECCION_TRABAJO'); ?>
		<?php echo $form->textField($model,'O_DIRECCION_TRABAJO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_CORREO_ELECTRONICO'); ?>
		<?php echo $form->textField($model,'O_CORREO_ELECTRONICO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_TELEFONO_DOMICILIO'); ?>
		<?php echo $form->textField($model,'O_TELEFONO_DOMICILIO',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_TELEFONO_TRABAJO'); ?>
		<?php echo $form->textField($model,'O_TELEFONO_TRABAJO',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_TELEFONO_CELULAR'); ?>
		<?php echo $form->textField($model,'O_TELEFONO_CELULAR',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_INGRESO'); ?>
		<?php echo $form->textField($model,'F_INGRESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'F_RETIRO'); ?>
		<?php echo $form->textField($model,'F_RETIRO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'O_CAUSAL_RETIRO'); ?>
		<?php echo $form->textField($model,'O_CAUSAL_RETIRO',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->