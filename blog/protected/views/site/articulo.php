<?php
Yii::app()->clientScript->registerMetaTag(
    'Descripción del artículo',
    'description'
);

Yii::app()->clientScript->registerMetaTag(
    'Las etiquetas del artículo',
    'keywords'
);

$this->breadcrumbs = array('Artículo');
?>

<h2><?php echo $model->titulo; ?></h2>

<p>
<?php echo $model->createdBy->name; ?> | <?php echo $model->created_at; ?> |

<?php echo CHtml::link($model->categoria->categoria, array('/categoria/' . $model->categoria->slug)); ?>

| <?php echo $model->vistas; ?> visitas
</p>

<div>
<?php echo $model->detalle; ?>
</div>

<div>Etiquetas 
    <?php foreach($etiquetas as $key => $value): ?>
        <?php echo CHtml::link($value, array('/etiqueta/' . $value)); ?>
    <?php endforeach; ?>
</div>

<div>
<?php echo CHtml::link('Descargar', array('/articulo/descarga/' . $model->slug)); ?>
</div>

<h3>Comentarios</h3>

<?php foreach($model->comentarios as $key => $value): ?>
    <?php if ($value->estado): ?>
        <div>
            <div>
                <?php if($value->web): ?>
                    <a href="<?php echo $value->web; ?>" target="_blank"><?php echo ucwords($value->nombre); ?></a>
                <?php else: ?>
                    <?php echo ucwords($value->nombre); ?>
                <?php endif; ?>
                <?php echo $value->fecha; ?>
            </div>
            <div>
                <?php echo $value->comentario; ?>
            </div>
        <hr>
        </div>
    <?php endif; ?>
<?php endforeach; ?>