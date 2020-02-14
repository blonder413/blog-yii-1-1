<?php
/* @var $this DirectoController */
/* @var $model Directo */

$this->breadcrumbs=array(
	'Directos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Directo', 'url'=>array('index')),
	array('label'=>'Create Directo', 'url'=>array('create')),
	array('label'=>'Update Directo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Directo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Directo', 'url'=>array('admin')),
);
?>

<h1>View Directo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'descripcion',
		'embebido',
		'inicio',
		'fin',
		'created_by',
		'created_at',
		'updated_by',
		'updated_at',
	),
)); ?>
