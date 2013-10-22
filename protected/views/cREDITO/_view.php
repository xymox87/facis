<?php
/* @var $this CREDITOController */
/* @var $data CREDITO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_ID_CREDITO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_ID_CREDITO), array('view', 'id'=>$data->K_ID_CREDITO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_APROBACION')); ?>:</b>
	<?php echo CHtml::encode($data->F_APROBACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_DESEMBOLSO')); ?>:</b>
	<?php echo CHtml::encode($data->F_DESEMBOLSO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_ULTIMO_PAGO')); ?>:</b>
	<?php echo CHtml::encode($data->F_ULTIMO_PAGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_ULTIMO_PAGO')); ?>:</b>
	<?php echo CHtml::encode($data->V_ULTIMO_PAGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_CREDITO')); ?>:</b>
	<?php echo CHtml::encode($data->V_CREDITO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_SALDO')); ?>:</b>
	<?php echo CHtml::encode($data->V_SALDO); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('I_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->I_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Q_CUOTAS')); ?>:</b>
	<?php echo CHtml::encode($data->Q_CUOTAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDENTIFICACION')); ?>:</b>
	<?php echo CHtml::encode($data->K_IDENTIFICACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Q_CUOTA')); ?>:</b>
	<?php echo CHtml::encode($data->Q_CUOTA); ?>
	<br />

	*/ ?>

</div>