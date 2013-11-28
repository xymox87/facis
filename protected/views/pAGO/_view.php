<?php
/* @var $this PAGOController */
/* @var $data PAGO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_NUMCONSIGNACION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_NUMCONSIGNACION), array('view', 'id'=>$data->K_NUMCONSIGNACION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_PAGO')); ?>:</b>
	<?php echo CHtml::encode($data->F_PAGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_PAGO')); ?>:</b>
	<?php echo CHtml::encode($data->V_PAGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->K_CUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_FPAGO')); ?>:</b>
	<?php echo CHtml::encode($data->K_FPAGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Q_NUMCUOTA')); ?>:</b>
	<?php echo CHtml::encode($data->Q_NUMCUOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_ID_CREDITO')); ?>:</b>
	<?php echo CHtml::encode($data->K_ID_CREDITO); ?>
	<br />


</div>