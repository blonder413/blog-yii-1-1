<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>

	<ul>
		<li>
			<?php echo CHtml::link('Artículo', array('/admin/articulo/admin')); ?>
		</li>
		<li>
			<?php echo CHtml::link('Categoría', array('/admin/categoria/admin')); ?>
		</li>
		<li>
			<?php echo CHtml::link('Comentario', array('/admin/comentario/admin')); ?>
		</li>
		<li>
			<?php echo CHtml::link('Curso', array('/admin/curso/admin')); ?>
		</li>
		<li>
			<?php echo CHtml::link('Directo', array('/admin/directo/admin')); ?>
		</li>
		<li>
			<?php echo CHtml::link('Usuario', array('/admin/user/admin')); ?>
		</li>
	</ul>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>