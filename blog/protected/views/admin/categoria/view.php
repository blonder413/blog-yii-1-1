<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Categoria', 'url'=>array('index')),
	array('label'=>'Create Categoria', 'url'=>array('create')),
	array('label'=>'Update Categoria', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categoria', 'url'=>array('admin')),
);
?>

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

<h1>View Categoria <?php echo $model->categoria; ?></h1>

<!--
<?php if (($msg = Yii::app()->user->getFlashes()) != null): ?>
	<?php foreach($msg as $key => $value): ?>
		<p><?php echo $value; ?></p>
	<?php endforeach; ?>
<?php endif; ?>
-->
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
//	'htmlOptions'	=> array('class' => 'table table-striped'),
	'attributes'=>array(
		'id',
		'categoria',
		'slug',
		'imagen',
		'descripcion',
//		'created_by',
		[
			'name'	=> 'created_by',
			'value'	=> $model->createdBy->name,
		],
		'created_at',
		//'updated_by',
		[
			'name'	=> 'updated_by',
			'value'	=> $model->updatedBy->name,
		],
		'updated_at',
	),
)); ?>
