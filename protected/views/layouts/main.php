<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language ?>" />

	<meta name="keywords" content="<?php echo CHtml::encode($this->metaKey); ?>">
	<meta name="description" content="<?php echo CHtml::encode($this->metaDesc); ?>">

	<?php // Yii::app()->bootstrap->registerCoreCss(); ?>
	<?php // Yii::app()->bootstrap->registerCoreScripts(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/comon.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/styles.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
    'target'=>'',
    'config'=>array(),
    )
); ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<?php  
		$baseUrl = Yii::app()->baseUrl; 
		$cs = Yii::app()->getClientScript();

		//register all js
		$cs->registerScriptFile($baseUrl.'/asset/js/main/all.js');
		$cs->registerScriptFile($baseUrl.'/asset/js/main/bootstrap.min.js');
		$cs->registerScriptFile($baseUrl.'/asset/js/main/theme.js');

		$cs->registerScriptFile($baseUrl.'/asset/js/main/index-slider.js');
		$cs->registerScriptFile($baseUrl.'/asset/js/main/flexslider.js');
		
		// register all css
		// bootrap
		$cs->registerCssFile($baseUrl.'/asset/css/main/bootstrap.min.css');
		$cs->registerCssFile($baseUrl.'/asset/css/main/bootstrap-responsive.min.css');
		$cs->registerCssFile($baseUrl.'/asset/css/main/bootstrap-overrides.css');

		$cs->registerCssFile($baseUrl.'/asset/css/main/theme.css');
		$cs->registerCssFile($baseUrl.'/asset/css/main/index.css');	
		$cs->registerCssFile($baseUrl.'/asset/css/main/about.css');
		
		$cs->registerCssFile($baseUrl.'/asset/css/main/lib/animate.css');
		$cs->registerCssFile($baseUrl.'/asset/css/main/lib/flexslider.css');		
	?>
    <!--[if lt IE 9]>
  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<?php echo $content ?>
</html>
