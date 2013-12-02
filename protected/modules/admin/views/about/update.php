<?php
$this->breadcrumbs=array(
	'About Lists'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List About List', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
	array('label'=>'Add About List', 'icon'=>'plus-sign','url'=>array('create', 'parent'=>$_GET['parent'])),
	// array('label'=>'View About List', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit About List <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc,)); ?>