<?php
/* @var $this ArticuloController */
/* @var $model Articulo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero'); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tema'); ?>
		<?php echo $form->textField($model,'tema',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php echo $form->textField($model,'resumen',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'resumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video'); ?>
		<?php echo $form->textField($model,'video',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descarga'); ?>
		<?php echo $form->textField($model,'descarga',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'descarga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria_id'); ?>
		<?php echo $form->dropDownList(
			$model,'categoria_id', 
			CHtml::listData(Categoria::model()->findAll(), 'id', 'categoria'),
			array('empty' => 'Seleccione...')
		); ?>
		<?php echo $form->error($model,'categoria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'etiquetas'); ?>
		<?php echo $form->textField($model,'etiquetas',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'etiquetas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'curso_id'); ?>
		<?php echo $form->dropDownList(
			$model,'curso_id', 
			CHtml::listData(Curso::model()->findAll(), 'id', 'curso'),
			array('empty' => 'Seleccione...')
		); ?>
		<?php echo $form->error($model,'curso_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->