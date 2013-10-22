<?php
/* @var $this GANANCIAController */
/* @var $data GANANCIA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_ID_GANANCIA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_ID_GANANCIA), array('view', 'id'=>$data->K_ID_GANANCIA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_GANANCIA')); ?>:</b>
	<?php echo CHtml::encode($data->V_GANANCIA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_CORTE')); ?>:</b>
	<?php echo CHtml::encode($data->F_CORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_PROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->O_PROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDENTIFICACION')); ?>:</b>
	<?php echo CHtml::encode($data->K_IDENTIFICACION); ?>
	<br />


</div>