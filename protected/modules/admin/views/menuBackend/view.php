<?php
$this->breadcrumbs=array(
	'Menu Backends'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MenuBackend', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MenuBackend', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MenuBackend', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MenuBackend', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MenuBackend #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent',
		'name',
		'desc',
		'url',
		'action',
		'icon',
		'sort',
		'shortcut',
		'hidden',
		'active',
	),
)); ?>
