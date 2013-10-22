<?php
/* @var $this DESCRIPCIONTIPOCREDITOController */
/* @var $data DESCRIPCIONTIPOCREDITO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_ID_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_ID_DESCRIPCION), array('view', 'id'=>$data->K_ID_DESCRIPCION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_ESTABLECIMIENTO')); ?>:</b>
	<?php echo CHtml::encode($data->F_ESTABLECIMIENTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_TASA_INTERES')); ?>:</b>
	<?php echo CHtml::encode($data->V_TASA_INTERES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_APORTE_MINIMO')); ?>:</b>
	<?php echo CHtml::encode($data->V_APORTE_MINIMO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Q_PLAZO_MAXIMO')); ?>:</b>
	<?php echo CHtml::encode($data->Q_PLAZO_MAXIMO); ?>
	<br />


</div>