<?php
/* @var $this ArticuloController */
/* @var $data Articulo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />
-->
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('tema')); ?>:</b>
	<?php echo CHtml::encode($data->tema); ?>
	<br />
-->
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('resumen')); ?>:</b>
	<?php echo CHtml::encode($data->resumen); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descarga')); ?>:</b>
	<?php echo CHtml::encode($data->descarga); ?>
	<br />
	*/ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_id')); ?>:</b>
	<?php echo CHtml::encode($data->categoria->categoria); ?>
	<br />
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('etiquetas')); ?>:</b>
	<?php echo CHtml::encode($data->etiquetas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo $data->estado ? 'Activo' : 'Inactivo'; ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vistas')); ?>:</b>
	<?php echo CHtml::encode($data->vistas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descargas')); ?>:</b>
	<?php echo CHtml::encode($data->descargas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curso_id')); ?>:</b>
	<?php echo CHtml::encode($data->curso_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>