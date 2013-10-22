<?php
/* @var $this TIPOCREDITOController */
/* @var $data TIPOCREDITO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDENTIFICADOR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_IDENTIFICADOR), array('view', 'id'=>$data->K_IDENTIFICADOR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_TIPO')); ?>:</b>
	<?php echo CHtml::encode($data->I_TIPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->N_DESCRIPCION); ?>
	<br />


</div>