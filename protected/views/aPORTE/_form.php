<?php
/* @var $this APORTEController */
/* @var $model APORTE */
/* @var $form CActiveForm */
?>

<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aporte-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        
	<div class="row">
		<?php echo $form->labelEx($model,'K_NUMCONSIGNACION'); ?>
		<?php echo $form->textField($model,'K_NUMCONSIGNACION'); ?>
		<?php echo $form->error($model,'K_NUMCONSIGNACION'); ?>
	</div>
	
        <div class="row">
		<?php echo $form->labelEx($model,'V_APORTE'); ?>
		<?php echo $form->textField($model,'V_APORTE'); ?>
		<?php echo $form->error($model,'V_APORTE');?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'F_CONSIGNACION'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model' => $model,
                        'attribute' => 'F_CONSIGNACION',
                        'language' => 'es',
                        'options'=>array('dateFormat'=>'dd/mm/y'),
                        ));
                ?>
		<?php echo $form->error($model,'F_CONSIGNACION'); ?>
	</div>
	
        <div class="row">
		<?php echo $form->labelEx($model,'V_MULTA'); ?>
		<?php echo $form->textField($model,'V_MULTA'); ?>
		<?php echo $form->error($model,'V_MULTA'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->textField($model,'K_IDENTIFICACION'); ?>
		<?php echo $form->error($model,'K_IDENTIFICACION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_CUENTA'); ?>
		<?php echo CHtml::dropDownList('APORTE[K_CUENTA]',$model->K_CUENTA,CHtml::listData(CUENTA::model()->findAll(), "K_CUENTA", "K_CUENTA")); ?>
		<?php echo $form->error($model,'K_CUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'K_FPAGO'); ?>
		<?php echo CHtml::dropDownList('APORTE[K_FPAGO]',$model->K_FPAGO,CHtml::listData(FORMAPAGO::model()->findAll(),'K_FPAGO',"N_FPAGO")); ?>
		<?php echo $form->error($model,'K_FPAGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->