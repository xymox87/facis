<?php
/* @var $this PLANPAGOSController */
/* @var $data PLANPAGOS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_ID_PLAN')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_ID_PLAN), array('view', 'id'=>$data->K_ID_PLAN)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Q_CUOTA')); ?>:</b>
	<?php echo CHtml::encode($data->Q_CUOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_XINTERES')); ?>:</b>
	<?php echo CHtml::encode($data->V_XINTERES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_XCAPITAL')); ?>:</b>
	<?php echo CHtml::encode($data->V_XCAPITAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_ACONSIGNAR')); ?>:</b>
	<?php echo CHtml::encode($data->F_ACONSIGNAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_ID_CREDITO')); ?>:</b>
	<?php echo CHtml::encode($data->K_ID_CREDITO); ?>
	<br />


</div>