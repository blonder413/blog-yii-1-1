<?php
/* @var $this DirectoController */
/* @var $model Directo */

$this->breadcrumbs=array(
	'Directos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Directo', 'url'=>array('index')),
	array('label'=>'Create Directo', 'url'=>array('create')),
	array('label'=>'View Directo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Directo', 'url'=>array('admin')),
);
?>

<h1>Update Directo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>