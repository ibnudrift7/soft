<?php
$this->breadcrumbs=array(
	'Icons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Icon', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Icon', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Icon', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Icon', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Icon #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'img',
	),
)); ?>
