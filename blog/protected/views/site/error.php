<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<?php
if ($code == 403) {
	$this->renderPartial('error403');
} elseif ($code == 404) {
	$this->renderPartial('error404');
}
?>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>