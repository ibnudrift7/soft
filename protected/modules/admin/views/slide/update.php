<?php
$this->breadcrumbs=array(
	'Slides'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Slide', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Create Slide', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Slide', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Update Slide <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>