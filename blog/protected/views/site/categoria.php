<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<article>
	<?php foreach ($model as $key => $value): ?>
	<h2>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/categorias/<?php echo $value->categoria->imagen; ?>">
		<?php echo CHtml::link($value->titulo, array('/articulo/' . $value->slug)); ?>
	</h2>
	<div>
	Publicado por <?php echo $value->createdBy->name; ?> | Publicado el <?php echo $value->created_at; ?>
	| <?php echo $value->categoria->categoria; ?>
	</div>
	<div>
		<?php echo $value->resumen; ?>
	</div>
	<div>
		<?php echo CHtml::link('Ver más', array('/articulo/' . $value->slug)); ?>
		<?php echo CHtml::link('Comentarios', 'articulo/' . $value->slug . '#comentarios') ?>
	</div>
	<hr>
	<?php endforeach; ?>
</article>

<?php $this->widget('CLinkPager', array(
	'pages'	=> $pages,
)) ?>