<?php
/* @var $this CREDITOController */
/* @var $model CREDITO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'credito-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <!--<div class="row">
		<?php echo $form->labelEx($model,'K_ID_CREDITO'); ?>
		<?php echo $form->textField($model,'K_ID_CREDITO'); ?>
		<?php echo $form->error($model,'K_ID_CREDITO'); ?>
	</div>-->
        
        <div class="row">
                <?php echo $form->labelEx($model,'K_IDENTIFICACION'); ?>
		<?php echo CHtml::dropDownList("CREDITO[K_IDENTIFICACION]",  SOCIO::model()->K_IDENTIFICACION ,CHtml::listData(SOCIO::model()->findAll(), "K_IDENTIFICACION", "K_IDENTIFICACION")); ?>
		<?php echo $form->error($model,'K_IDENTIFICACION'); ?>
        </div>
        <div class="row">
                <?php echo $form->labelEx($model,'Tipo de credito'); ?>
		<?php echo CHtml::dropDownList("CREDITO[K_IDENTIFICADOR]",  TIPOCREDITO::model()->K_IDENTIFICADOR ,CHtml::listData(TIPOCREDITO::model()->findAll(), "K_IDENTIFICADOR", "I_TIPO")); ?>
		<?php echo $form->error($model,'K_IDENTIFICADOR'); ?>
        </div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'F_APROBACION'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model' => $model,
                        'attribute' => 'F_APROBACION',
                        'language' => 'es',
                        'options'=>array('dateFormat'=>'dd/mm/y'),
                        ));
                ?>
		<?php echo $form->error($model,'F_APROBACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'F_DESEMBOLSO'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model' => $model,
                        'attribute' => 'F_DESEMBOLSO',
                        'language' => 'es',
                        'options'=>array('dateFormat'=>'dd/mm/y'),
                        ));
                ?>
		<?php echo $form->error($model,'F_DESEMBOLSO'); ?>
	</div>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'F_ULTIMO_PAGO'); ?>
		<?php //echo $form->textField($model,'F_ULTIMO_PAGO'); ?>
		<?php //echo $form->error($model,'F_ULTIMO_PAGO'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'V_ULTIMO_PAGO'); ?>
		<?php //echo $form->textField($model,'V_ULTIMO_PAGO'); ?>
		<?php //echo $form->error($model,'V_ULTIMO_PAGO'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'V_CREDITO'); ?>
		<?php echo $form->textField($model,'V_CREDITO'); ?>
		<?php echo $form->error($model,'V_CREDITO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'V_SALDO'); ?>
		<?php echo $form->textField($model,'V_SALDO'); ?>
		<?php echo $form->error($model,'V_SALDO'); ?>
	</div>
         
        <?php
          $listE["A"]="Aprobado";
          $listE["V"]="Vigente";
          $listE["C"]="Cancelado";                   
        ?>

	<div class="row">
		<?php echo $form->labelEx($model,'I_ESTADO'); ?>
                <?php echo CHtml::dropDownList('CREDITO[I_ESTADO]',$model->I_ESTADO,$listE);?>
                <?php echo $form->error($model,'I_ESTADO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Q_CUOTAS'); ?>
		<?php echo $form->textField($model,'Q_CUOTAS'); ?>
		<?php echo $form->error($model,'Q_CUOTAS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Q_CUOTA'); ?>
		<?php echo $form->textField($model,'Q_CUOTA'); ?>
		<?php echo $form->error($model,'Q_CUOTA'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'K_ID_DESCRIPCION'); ?>
		<?php echo $form->textField($model,'K_ID_DESCRIPCION'); ?>
		<?php echo $form->error($model,'K_ID_DESCRIPCION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
