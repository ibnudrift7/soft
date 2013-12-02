<?php
$this->breadcrumbs=array(
	'Services'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Service', 'icon'=>'th-list','url'=>array('index', 'parent'=>$_GET['parent'])),
	array('label'=>'Add Service', 'icon'=>'plus-sign','url'=>array('create', 'parent'=>$_GET['parent'])),
	// array('label'=>'View Service', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Service <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc,)); ?>