<?php
/* @var $this SOCIOController */
/* @var $data SOCIO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('K_IDENTIFICACION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->K_IDENTIFICACION), array('view', 'id'=>$data->K_IDENTIFICACION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->N_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_APELLIDO')); ?>:</b>
	<?php echo CHtml::encode($data->N_APELLIDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_ESTADO_CIVIL')); ?>:</b>
	<?php echo CHtml::encode($data->I_ESTADO_CIVIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('N_OCUPACION')); ?>:</b>
	<?php echo CHtml::encode($data->N_OCUPACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_TARJETA_PROFESIONAL')); ?>:</b>
	<?php echo CHtml::encode($data->O_TARJETA_PROFESIONAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('I_GENERO')); ?>:</b>
	<?php echo CHtml::encode($data->I_GENERO); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('O_DIRECCION_DOMICILIO')); ?>:</b>
	<?php echo CHtml::encode($data->O_DIRECCION_DOMICILIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_DIRECCION_TRABAJO')); ?>:</b>
	<?php echo CHtml::encode($data->O_DIRECCION_TRABAJO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_CORREO_ELECTRONICO')); ?>:</b>
	<?php echo CHtml::encode($data->O_CORREO_ELECTRONICO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_TELEFONO_DOMICILIO')); ?>:</b>
	<?php echo CHtml::encode($data->O_TELEFONO_DOMICILIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_TELEFONO_TRABAJO')); ?>:</b>
	<?php echo CHtml::encode($data->O_TELEFONO_TRABAJO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_TELEFONO_CELULAR')); ?>:</b>
	<?php echo CHtml::encode($data->O_TELEFONO_CELULAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_INGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->F_INGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('F_RETIRO')); ?>:</b>
	<?php echo CHtml::encode($data->F_RETIRO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('O_CAUSAL_RETIRO')); ?>:</b>
	<?php echo CHtml::encode($data->O_CAUSAL_RETIRO); ?>
	<br />

	*/ ?>

</div>