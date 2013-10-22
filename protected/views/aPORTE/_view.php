<?php
/* @var $this APORTEController */
/* @var $data APORTE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_NUMCONSIGNACION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_NUMCONSIGNACION), array('view', 'id'=>$data->K_NUMCONSIGNACION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_APORTE')); ?>:</b>
	<?php echo CHtml::encode($data->V_APORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_CONSIGNACION')); ?>:</b>
	<?php echo CHtml::encode($data->F_CONSIGNACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_DESCAPORTE')); ?>:</b>
	<?php echo CHtml::encode($data->K_DESCAPORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDENTIFICACION')); ?>:</b>
	<?php echo CHtml::encode($data->K_IDENTIFICACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->K_CUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_FPAGO')); ?>:</b>
	<?php echo CHtml::encode($data->K_FPAGO); ?>
	<br />


</div>