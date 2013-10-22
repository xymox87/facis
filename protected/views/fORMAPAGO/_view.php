<?php
/* @var $this FORMAPAGOController */
/* @var $data FORMAPAGO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_FPAGO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_FPAGO), array('view', 'id'=>$data->K_FPAGO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_FPAGO')); ?>:</b>
	<?php echo CHtml::encode($data->N_FPAGO); ?>
	<br />


</div>