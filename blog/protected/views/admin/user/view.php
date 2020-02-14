<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'username',
		'auth_key',
		'email',
		'photo',
		'status',
		'verification_token',
		'password_hash',
		'password_reset_token',
		'created_at',
		'updated_at',
	),
)); ?>

<h3>Roles y Operaciones asignadas</h3>
<ul>
<?php foreach (Yii::app()->authManager->getAuthItems() as $key => $value): ?>
	<?php if (Yii::app()->authManager->checkAccess($value->name, $model->id)): ?>
		<li><?php echo $value->name ?>: <?php echo $value->type; ?></li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>