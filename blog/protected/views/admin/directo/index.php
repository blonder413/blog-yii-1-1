<?php
/* @var $this DirectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Directos',
);

$this->menu=array(
	array('label'=>'Create Directo', 'url'=>array('create')),
	array('label'=>'Manage Directo', 'url'=>array('admin')),
);
?>

<h1>Directos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
//	'pager'	=> array('htmlOptions' => array('class' => 'pagination')),
)); ?>
