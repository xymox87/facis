<?php
/* @var $this DESCRIPCIONAPORTEController */
/* @var $data DESCRIPCIONAPORTE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_DESCAPORTE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_DESCAPORTE), array('view', 'id'=>$data->K_DESCAPORTE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_MODIFICACION')); ?>:</b>
	<?php echo CHtml::encode($data->F_MODIFICACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Q_DIAS')); ?>:</b>
	<?php echo CHtml::encode($data->Q_DIAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_MAXAPORTE')); ?>:</b>
	<?php echo CHtml::encode($data->V_MAXAPORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_MINAPORTE')); ?>:</b>
	<?php echo CHtml::encode($data->V_MINAPORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_INTERES_MULTA')); ?>:</b>
	<?php echo CHtml::encode($data->V_INTERES_MULTA); ?>
	<br />


</div>