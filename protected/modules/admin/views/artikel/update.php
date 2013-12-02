<?php
$this->breadcrumbs=array(
	'Artikels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Artikel', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Create Artikel', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Artikel', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Update Artikel <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>