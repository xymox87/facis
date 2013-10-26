<?php
/* @var $this SOCIOController */
/* @var $model SOCIO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'socio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'K_IDENTIFICACION'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'N_NOMBRE'); ?>
		<?php echo $form->textField($model,'N_NOMBRE',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'N_NOMBRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_APELLIDO'); ?>
		<?php echo $form->textField($model,'N_APELLIDO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'N_APELLIDO'); ?>
	</div>
                <?php
                    $listE["S"]="Soltero";
                    $listE["C"]="Casado";
                    $listE["D"]="Divorciado";                   
                    $listE["V"]="Viudo";                   
                    $listE["P"]="Separado";                   
                ?>

	<div class="row">
                
		<?php echo $form->labelEx($model,'I_ESTADO_CIVIL'); ?>
            	<?php echo CHtml::dropDownList('SOCIO[I_ESTADO_CIVIL]',$model->I_ESTADO_CIVIL,$listE);?>
		<?php echo $form->error($model,'I_ESTADO_CIVIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'N_OCUPACION'); ?>
		<?php echo $form->textField($model,'N_OCUPACION',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'N_OCUPACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_TARJETA_PROFESIONAL'); ?>
		<?php echo $form->textField($model,'O_TARJETA_PROFESIONAL',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'O_TARJETA_PROFESIONAL'); ?>
	</div>

	<div class="row">
                <?php 
                    $listG["m"]="Masculino";
                    $listG["f"]="Femenino";
                ?>
		<?php echo $form->labelEx($model,'I_GENERO'); ?>
                <?php //echo CHtml::dropDownList('SOCIO[I_ESTADO_CIVIL]',$model->I_ESTADO_CIVIL,$listE);?>
		<?php echo CHtml::dropDownList('SOCIO[I_GENERO]', $model->I_GENERO, $listG); ?>
                <?php //echo $form->textField($model,'I_GENERO',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'I_GENERO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_DIRECCION_DOMICILIO'); ?>
		<?php echo $form->textField($model,'O_DIRECCION_DOMICILIO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'O_DIRECCION_DOMICILIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_DIRECCION_TRABAJO'); ?>
		<?php echo $form->textField($model,'O_DIRECCION_TRABAJO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'O_DIRECCION_TRABAJO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_CORREO_ELECTRONICO'); ?>
		<?php echo $form->textField($model,'O_CORREO_ELECTRONICO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'O_CORREO_ELECTRONICO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_TELEFONO_DOMICILIO'); ?>
		<?php echo $form->textField($model,'O_TELEFONO_DOMICILIO',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'O_TELEFONO_DOMICILIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_TELEFONO_TRABAJO'); ?>
		<?php echo $form->textField($model,'O_TELEFONO_TRABAJO',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'O_TELEFONO_TRABAJO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_TELEFONO_CELULAR'); ?>
		<?php echo $form->textField($model,'O_TELEFONO_CELULAR',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'O_TELEFONO_CELULAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_INGRESO'); ?>
		<?php echo $form->textField($model,'F_INGRESO'); ?><p class="note">Formato DD/MM/AA</p>
		<?php //echo $this->renderPartial('application.views.partials.fecha', array('model'=>$model,'name'=>'F_INGRESO')); ?>
		<?php echo $form->error($model,'F_INGRESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_RETIRO'); ?>
		<?php echo $form->textField($model,'F_RETIRO'); ?><p class="note">Formato DD/MM/AA</p>
		<?php echo $form->error($model,'F_RETIRO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'O_CAUSAL_RETIRO'); ?>
		<?php echo $form->textField($model,'O_CAUSAL_RETIRO',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'O_CAUSAL_RETIRO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->