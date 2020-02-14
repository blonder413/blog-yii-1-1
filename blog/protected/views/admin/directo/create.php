<?php
/* @var $this DirectoController */
/* @var $model Directo */

$this->breadcrumbs=array(
	'Directos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Directo', 'url'=>array('index')),
	array('label'=>'Manage Directo', 'url'=>array('admin')),
);
?>

<h1>Create Directo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>