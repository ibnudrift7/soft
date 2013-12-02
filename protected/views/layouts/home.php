<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<body class="pull_top">
	<div class="navbar transparent navbar-inverse navbar-fixed-top">
    	<?php echo $this->renderPartial('//layouts/_header'); ?>
    </div>
    	<?php echo $content; ?>
   <?php echo $this->renderPartial('//layouts/_footer'); ?>
</body>
<?php $this->endContent(); ?>