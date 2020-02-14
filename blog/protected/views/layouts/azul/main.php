<?php /* @var $this Controller */?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="language" content="es">

	<meta name='author' content='Jonathan Morales Salazar'>
    <meta name='copyright' content='www.blonder413.com'>
    <meta name='designer' content='www.blonder413.com'>
    <meta name='publisher' content='www.blonder413.com'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/azul/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/azul/estilos.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" rel="icon" type="image/vnd.microsoft.icon"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container">

	<!--
		<div id="header">
			<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		</div>
	-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><?php echo Yii::app()->name; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php $this->widget('zii.widgets.CMenu', array(
			'htmlOptions' => array('class' => 'navbar navbar-blue navbar-fixed-top'),
			'items' => array(
				array('itemOptions' => array('class'	=> 'nav-item'), 'linkOptions' => array('class' => 'nav-link'), 'class'	=> 'nav-item', 'label' => 'Inicio', 'url' => array('/site/index')),
				array('itemOptions' => array('class'	=> 'nav-item'), 'linkOptions' => array('class' => 'nav-link'), 'label' => 'Acerca', 'url' => array('/site/about')),
				array('itemOptions' => array('class'	=> 'nav-item'), 'linkOptions' => array('class' => 'nav-link'), 'label' => 'Contacto', 'url' => array('/site/contact')),
				array('itemOptions' => array('class'	=> 'nav-item'), 'linkOptions' => array('class' => 'nav-link'), 'label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
				array('itemOptions' => array('class'	=> 'nav-item'), 'linkOptions' => array('class' => 'nav-link'), 'label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
			),
			'htmlOptions' => array('class' => 'nav navbar-nav'),
		));?>
		</div>
		</nav><!-- mainmenu -->

		<?php if (isset($this->breadcrumbs)): ?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		));?><!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>
	</div>

	<div class="clear"></div>

	<footer>
		<?php echo Yii::powered(); ?><?php echo Yii::getVersion(); ?>. <br>
		Copyright &copy; <?php echo date('Y'); ?> by Blonder413.<br/>
		Todos los derechos reservados.<br/>

	</footer><!-- footer -->



</body>
</html>
