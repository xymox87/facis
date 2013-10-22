<?php
/* @var $this CUENTAController */
/* @var $data CUENTA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_CUENTA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_CUENTA), array('view', 'id'=>$data->K_CUENTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_BANCO')); ?>:</b>
	<?php echo CHtml::encode($data->N_BANCO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_DESCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->N_DESCUENTA); ?>
	<br />


</div>