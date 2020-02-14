<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Categoria', 'url'=>array('index')),
	array('label'=>'Create Categoria', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categoria-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php if (($msg = Yii::app()->user->getFlashes()) != null): ?>
	<?php foreach($msg as $key => $value): ?>
		<p><?php echo $value; ?></p>
	<?php endforeach; ?>
<?php endif; ?>

<?php
if (Yii::app()->user->hasFlash('success')):
?>
<h3 style="color: green"><?php echo Yii::app()->user->getFlash('success') ?></h3>
<?php
elseif (Yii::app()->user->hasFlash('danger')):
?>
<h3 style="color: red"><?php echo Yii::app()->user->getFlash('danger') ?></h3>
<?php
endif;
?>

<h1>Administrar Categorias</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categoria-grid',
//	'itemsCssClass'	=> 'table table-striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
//	'pager'	=> array('htmlOptions' => array('class' => 'pagination')),
	'columns'=>array(
		'id',
		'categoria',
		'slug',
		'imagen',
		'descripcion',
//		'created_by',
		array(
			'name'=>'created_by',
			'value'=>'$data->createdBy->name',
		),
		'created_at',
//		'updated_by',
//		'updated_at',		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
