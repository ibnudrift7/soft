<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<body>
	 <div class="navbar navbar-inverse navbar-static-top">
	 	<?php echo $this->renderPartial('//layouts/_header'); ?>
	 </div>
		<?php echo $content; ?>
	<?php echo $this->renderPartial('//layouts/_footer'); ?>
<body>
<?php $this->endContent(); ?>