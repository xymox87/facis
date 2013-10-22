<?php
/* @var $this RENDIMIENTOController */
/* @var $data RENDIMIENTO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_FECHA_RENDIMIENTO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_FECHA_RENDIMIENTO), array('view', 'id'=>$data->K_FECHA_RENDIMIENTO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('V_RENDIMIENTO')); ?>:</b>
	<?php echo CHtml::encode($data->V_RENDIMIENTO); ?>
	<br />


</div>